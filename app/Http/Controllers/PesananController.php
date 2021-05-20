<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    //method untuk menampilkan semua data pesanan (read)
    public function index()
    {
        $pesanan = Pesanan::all();//mengambil semua data pesanan
        
        if(count($pesanan) > 0){
            return response([
                'message' => 'Berhasil',
                'data' => $pesanan
            ],200);
        }//return data semua pesanan dalam bentuk json
        
        return response([
            'message' => 'Kosong',
            'data' => null
        ],404);//return message data pesanan kosong
    }

    //method untuk menampilkan 1 data pesanan (search)
    public function show($id){
        $pesanan = Pesanan::find($id);//mencari data pesanan berdasarkan id

        if(!is_null($pesanan)){
            return response([
                'message' => 'berhasil',
                'data' => $pesanan
            ],200);
        }//return data semua pesanan dalam bentuk json

        return response([
            'message' => 'pesanan tidak ditemukan',
            'data' => null
        ],404);//return message saat data pesanan tidak ditemukan
        
    }

    //method untuk menambah 1 data pesanan baru(create)
    public function input(Request $request){
        $inputdata = $request->all();//mengambil semua input dari api client 
        $pesanan = Pesanan::create($inputdata);//menambah data pesanan baru
        return response([
            'message' => 'pesanan Berhasil ditambahkan',
            'data' => $pesanan,
        ],200);//return data pesanan baru dalam bentuk json
    }

    //method untuk menghapus 1 data pesanan (delete)
    public function hapus($id){
        $pesanan = Pesanan::find($id);//mencari data karyawan berdasarkan id
        
        if(is_null($pesanan)){
            return response([
                'message' => 'Pesanan tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data karyawan tidak ditemukan

        $pesanan-> hapus = 0;//edit nama_karyawan
        if($pesanan->save()){
            return response([
                'message' => 'Hapus Karyawan Berhasil',
                'data' => $pesanan,
            ],200);
       }
    }
    //method untuk mengubah 1 data pesanan (update)
    public function update(Request $request, $id){
        $pesanan = Pesanan::find($id);//mencari data pesanan berdasarkan id
        if(is_null($pesanan)){
            return response([
                'message' => 'pesanan tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data pesanan tidak ditemukan

        $updatedata = $request->all();
        $validate = Validator::make($updatedata, [
            'total_jumlah' => [Rule::unique('pesanan')->ignore($pesanan)],
            'total_pesanan' => [Rule::unique('pesanan')->ignore($pesanan)]
        ]);//membuat rule validasi input

        if($validate->fails())
            return response(['message' => $validate->errors()],400);//return error invalid input

        $pesanan->total_jumlah = $updatedata['total_jumlah'];//edit nama_pesanan
        $pesanan->total_pesanan = $updatedata['total_pesanan'];//edit no_telepon

        if($pesanan->save()){
            return response([
                'message' => 'Update pesanan Berhasil',
                'data' => $pesanan,
            ],200);
        }//return data pesanan yang telah diedit dalam bentuk json
        
        return response([
            'message' => 'Update pesanan Gagal',
            'data' => null
        ],400);//return message saat pesanan gagal diedit
    }
}

