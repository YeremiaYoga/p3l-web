<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator; //import library untuk validasi
use App\Models\Meja; //import modal Karyawan
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class MejaController extends Controller
{
        //method untuk menampilkan semua data karyawan (read)
        public function index()
        {
            $meja = Meja::all();//mengambil semua data karyawan
            
            if(count($meja) > 0){
                return response([
                    'message' => 'Berhasil',
                    'data' => $meja
                ],200);
            }//return data semua karyawan dalam bentuk json
            
            return response([
                'message' => 'Kosong',
                'data' => null
            ],404);//return message data karyawan kosong
        }
    
        //method untuk menampilkan 1 data Karyawan (search)
        public function show($id){
            $meja =Meja::find($id);//mencari data Karyawan berdasarkan id
    
            if(!is_null($meja)){
                return response([
                    'message' => 'berhasil',
                    'data' => $meja
                ],200);
            }//return data semua Karyawan dalam bentuk json
    
            return response([
                'message' => 'Meja tidak ditemukan',
                'data' => null
            ],404);//return message saat data Karyawan tidak ditemukan
            
        }
    
        //method untuk menambah 1 data Karyawan baru(create)
        public function input(Request $request){
            $inputdata = $request->all();//mengambil semua input dari api client
    
            $meja = Meja::create($inputdata);//menambah data Karyawan baru
            return response([
                'message' => 'Tambah Meja Berhasil',
                'data' => $meja,
            ],200);//return data Karyawan baru dalam bentuk json
        }
    
        //method untuk menghapus 1 data karyawan (delete)
        public function hapus($id){
            $meja = Meja::find($id);//mencari data karyawan berdasarkan id
            
            if(is_null($meja)){
                return response([
                    'message' => 'Meja tidak ditemukan',
                    'data' => null
                ],404);
            }//return message saat data karyawan tidak ditemukan
    
            $meja->hapus = 0;//edit nama_karyawan
            if($meja->save()){
                return response([
                    'message' => 'Hapus Meja Berhasil',
                    'data' => $meja,
                ],200);
           };
    
            //return message saat berhasil menghapus data karyawan
        }
        
}
