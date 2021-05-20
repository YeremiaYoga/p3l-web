<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator; //import library untuk validasi
use App\Models\Karyawan; //import modal Karyawan
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    //method untuk menampilkan semua data karyawan (read)
    public function index()
    {
        $karyawan = Karyawan::all();//mengambil semua data karyawan
        
        if(count($karyawan) > 0){
            return response([
                'message' => 'Berhasil',
                'data' => $karyawan
            ],200);
        }//return data semua karyawan dalam bentuk json
        
        return response([
            'message' => 'Kosong',
            'data' => null
        ],404);//return message data karyawan kosong
    }

    //method untuk menampilkan 1 data Karyawan (search)
    public function show($id){
        $karyawan =Karyawan::find($id);//mencari data Karyawan berdasarkan id

        if(!is_null($karyawan)){
            return response([
                'message' => 'berhasil',
                'data' => $karyawan
            ],200);
        }//return data semua Karyawan dalam bentuk json

        return response([
            'message' => 'Karyawan tidak ditemukan',
            'data' => null
        ],404);//return message saat data Karyawan tidak ditemukan
        
    }

    //method untuk menambah 1 data Karyawan baru(create)
    public function input(Request $request){
        $inputdata = $request->all();//mengambil semua input dari api client
        $validate = Validator::make($inputdata, [

            'nama_karyawan' => 'required',
            'no_telepon' => 'required',
            'email_karyawan' => 'required',
            'jabatan' => 'required',
            'password' => ''

        ]);//membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()],400);//return error invalid input

        $inputdata['password'] = bcrypt($inputdata['password']);
        $karyawan = Karyawan::create($inputdata);//menambah data Karyawan baru
        return response([
            'message' => 'Tambah Karyawan Berhasil',
            'data' => $karyawan,
        ],200);//return data Karyawan baru dalam bentuk json
    }

    //method untuk menghapus 1 data karyawan (delete)
    public function hapus($id){
        $karyawan = Karyawan::find($id);//mencari data karyawan berdasarkan id
        
        if(is_null($karyawan)){
            return response([
                'message' => 'Karyawan tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data karyawan tidak ditemukan

        $karyawan->hapus = 0;//edit nama_karyawan
        if($karyawan->save()){
            return response([
                'message' => 'Hapus Karyawan Berhasil',
                'data' => $karyawan,
            ],200);
       };

        //return message saat berhasil menghapus data karyawan
    }
    public function aktif($id){
        $karyawan = Karyawan::find($id);//mencari data karyawan berdasarkan id
        
        if(is_null($karyawan)){
            return response([
                'message' => 'Karyawan tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data karyawan tidak ditemukan

        $karyawan->hapus = 1;//edit nama_karyawan
        if($karyawan->save()){
            return response([
                'message' => 'Hapus Karyawan Berhasil',
                'data' => $karyawan,
            ],200);
       };
    }
    //method untuk mengubah 1 data karyawan (update)
    public function update(Request $request, $id){
        $karyawan = Karyawan::find($id);//mencari data karyawan berdasarkan id
        if(is_null($karyawan)){
            return response([
                'message' => 'Karyawan tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data karyawan tidak ditemukan

        $updatedata = $request->all();
        $validate = Validator::make($updatedata, [
            'nama_karyawan' => [Rule::unique('karyawan')->ignore($karyawan)],
            'no_telepon' => [Rule::unique('karyawan')->ignore($karyawan)],
            'email_karyawan' => [Rule::unique('karyawan')->ignore($karyawan)],
            'jabatan' => '',
        ]);//membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()],400);//return error invalid input

        $karyawan->nama_karyawan = $updatedata['nama_karyawan'];//edit nama_karyawan
        $karyawan->no_telepon = $updatedata['no_telepon'];//edit no_telepon
        $karyawan->email_karyawan = $updatedata['email_karyawan'];//edit email_karyawan
        $karyawan->jabatan = $updatedata['jabatan'];//edit jabatan

        if($karyawan->save()){
            return response([
                'message' => 'Update Karyawan Berhasil',
                'data' => $karyawan,
            ],200);
        }//return data karyawan yang telah diedit dalam bentuk json
        
        return response([
            'message' => 'Update Karyawan Gagal',
            'data' => null
        ],400);//return message saat karyawan gagal diedit
    }
    
}
