<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPesanan;
use Illuminate\Support\Facades\DB;

class DetailpesananController extends Controller
{
    //method untuk menampilkan semua data detailpesanan (read)
    public function index()
    {
        $detailpesanan = DB::table('detailpesanans')
        ->join('menus', 'detailpesanans.id_menu', '=', 'menus.id')//mengambil semua data detailpesanan
        ->get();
        if(count($detailpesanan) > 0){
            return response([
                'message' => 'Berhasil',
                'data' => $detailpesanan
            ],200);
        }//return data semua detailpesanan dalam bentuk json
        
        return response([
            'message' => 'Kosong',
            'data' => null
        ],404);//return message data detailpesanan kosong
    }

    //method untuk menampilkan 1 data detailpesanan (search)
    public function show($id){
        $detailpesanan = Detailpesanan::find($id);//mencari data detailpesanan berdasarkan id

        if(!is_null($detailpesanan)){
            return response([
                'message' => 'berhasil',
                'data' => $detailpesanan
            ],200);
        }//return data semua detailpesanan dalam bentuk json

        return response([
            'message' => 'detailpesanan tidak ditemukan',
            'data' => null
        ],404);//return message saat data detailpesanan tidak ditemukan
        
    }

    //method untuk menambah 1 data detailpesanan baru(create)
    public function input(Request $request){
        $inputdata = $request->all();//mengambil semua input dari api client
        $validate = Validator::make($inputdata, [
            'nama_detailpesanan' => 'required',
            'no_detailpesanan' => 'required',
            'email_detailpesanan' => 'required'

        ]);//membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()],400);//return error invalid input

        $detailpesanan = detailpesanan::create($inputdata);//menambah data detailpesanan baru
        return response([
            'message' => 'detailpesanan Berhasil ditambahkan',
            'data' => $detailpesanan,
        ],200);//return data detailpesanan baru dalam bentuk json
    }

    //method untuk menghapus 1 data detailpesanan (delete)
    public function hapus($id){
        $detailpesanan = DetailPesanan::find($id);//mencari data karyawan berdasarkan id
        
        if(is_null($detailpesanan)){
            return response([
                'message' => 'Pesanan tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data karyawan tidak ditemukan
        if($detailpesanan->hapus ==1){
            $detailpesanan->hapus = 0;
        }else{
            $detailpesanan->hapus = 1;
        }
        //edit nama_karyawan
        if($detailpesanan->save()){
            return response([
                'message' => 'Hapus pesanan Berhasil',
                'data' => $detailpesanan,
            ],200);
       }
    }

    //method untuk mengubah 1 data detailpesanan (update)
    public function update(Request $request, $id){
        $detailpesanan = detailpesanan::find($id);//mencari data detailpesanan berdasarkan id
        if(is_null($detailpesanan)){
            return response([
                'message' => 'detailpesanan tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data detailpesanan tidak ditemukan

        $updatedata = $request->all();
        $validate = Validator::make($updatedata, [
            'nama_detailpesanan' => [Rule::unique('detailpesanan')->ignore($detailpesanan)],
            'no_detailpesanan' => [Rule::unique('detailpesanan')->ignore($detailpesanan)],
            'email_detailpesanan' => [Rule::unique('detailpesanan')->ignore($detailpesanan)]
        ]);//membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()],400);//return error invalid input

        $detailpesanan->nama_detailpesanan = $updatedata['nama_detailpesanan'];//edit nama_detailpesanan
        $detailpesanan->no_detailpesanan = $updatedata['no_detailpesanan'];//edit no_telepon
        $detailpesanan->email_detailpesanan = $updatedata['email_detailpesanan'];//edit email_detailpesanan

        if($detailpesanan->save()){
            return response([
                'message' => 'Update detailpesanan Berhasil',
                'data' => $detailpesanan,
            ],200);
        }//return data detailpesanan yang telah diedit dalam bentuk json
        
        return response([
            'message' => 'Update detailpesanan Gagal',
            'data' => null
        ],400);//return message saat detailpesanan gagal diedit
    }
}
