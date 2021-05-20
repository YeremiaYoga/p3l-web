<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    //method untuk menampilkan semua data pembayaran (read)
    public function index()
    {
        $pembayaran = pembayaran::all();//mengambil semua data pembayaran
        
        if(count($pembayaran) > 0){
            return response([
                'message' => 'Berhasil',
                'data' => $pembayaran
            ],200);
        }//return data semua pembayaran dalam bentuk json
        
        return response([
            'message' => 'Kosong',
            'data' => null
        ],404);//return message data pembayaran kosong
    }

    //method untuk menampilkan 1 data pembayaran (search)
    public function show($id){
        $pembayaran = pembayaran::find($id);//mencari data pembayaran berdasarkan id

        if(!is_null($pembayaran)){
            return response([
                'message' => 'berhasil',
                'data' => $pembayaran
            ],200);
        }//return data semua pembayaran dalam bentuk json

        return response([
            'message' => 'pembayaran tidak ditemukan',
            'data' => null
        ],404);//return message saat data pembayaran tidak ditemukan
        
    }

    //method untuk menambah 1 data pembayaran baru(create)
    public function input(Request $request){
        $inputdata = $request->all();//mengambil semua input dari api client
        $validate = Validator::make($inputdata, [
            'nama_pembayaran' => 'required',
            'no_pembayaran' => 'required',
            'email_pembayaran' => 'required'

        ]);//membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()],400);//return error invalid input

        $pembayaran = pembayaran::create($inputdata);//menambah data pembayaran baru
        return response([
            'message' => 'pembayaran Berhasil ditambahkan',
            'data' => $pembayaran,
        ],200);//return data pembayaran baru dalam bentuk json
    }

    //method untuk menghapus 1 data pembayaran (delete)
    public function hapus($id){
        $pembayaran = pembayaran::find($id);//mencari data pembayaran berdasarkan id
        
        if(is_null($pembayaran)){
            return response([
                'message' => 'pembayaran tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data pembayaran tidak ditemukan

        if($pembayaran->delete()){
            return response([
                'message' => 'pembayaran berhasil dihapus',
                'data' => $pembayaran,
            ],200);
        }//return message saat berhasil menghapus data pembayaran
        return response([
            'message' => 'pembayaran Gagal dihapus',
            'data' => null
        ],400);//return message saat gagal menghapus data pembayaran
    }

    //method untuk mengubah 1 data pembayaran (update)
    public function update(Request $request, $id){
        $pembayaran = pembayaran::find($id);//mencari data pembayaran berdasarkan id
        if(is_null($pembayaran)){
            return response([
                'message' => 'pembayaran tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data pembayaran tidak ditemukan

        $updatedata = $request->all();
        $validate = Validator::make($updatedata, [
            'nama_pembayaran' => [Rule::unique('pembayaran')->ignore($pembayaran)],
            'no_pembayaran' => [Rule::unique('pembayaran')->ignore($pembayaran)],
            'email_pembayaran' => [Rule::unique('pembayaran')->ignore($pembayaran)]
        ]);//membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()],400);//return error invalid input

        $pembayaran->nama_pembayaran = $updatedata['nama_pembayaran'];//edit nama_pembayaran
        $pembayaran->no_pembayaran = $updatedata['no_pembayaran'];//edit no_telepon
        $pembayaran->email_pembayaran = $updatedata['email_pembayaran'];//edit email_pembayaran

        if($pembayaran->save()){
            return response([
                'message' => 'Update pembayaran Berhasil',
                'data' => $pembayaran,
            ],200);
        }//return data pembayaran yang telah diedit dalam bentuk json
        
        return response([
            'message' => 'Update pembayaran Gagal',
            'data' => null
        ],400);//return message saat pembayaran gagal diedit
    }
}
