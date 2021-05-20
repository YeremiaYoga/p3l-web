<?php

namespace App\Http\Controllers;

use Validator; //import library untuk validasi
use App\Models\Pelanggan; //import modal Pelanggan
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PelangganController extends Controller
{
     //method untuk menampilkan semua data pelanggan (read)
     public function index()
     {
         $pelanggan = Pelanggan::all();//mengambil semua data pelanggan
         
         if(count($pelanggan) > 0){
             return response([
                 'message' => 'Berhasil',
                 'data' => $pelanggan
             ],200);
         }//return data semua pelanggan dalam bentuk json
         
         return response([
             'message' => 'Kosong',
             'data' => null
         ],404);//return message data pelanggan kosong
     }
 
     //method untuk menampilkan 1 data pelanggan (search)
     public function show($id){
         $pelanggan = Pelanggan::find($id);//mencari data pelanggan berdasarkan id
 
         if(!is_null($pelanggan)){
             return response([
                 'message' => 'berhasil',
                 'data' => $pelanggan
             ],200);
         }//return data semua pelanggan dalam bentuk json
 
         return response([
             'message' => 'Pelanggan tidak ditemukan',
             'data' => null
         ],404);//return message saat data pelanggan tidak ditemukan
         
     }
 
     //method untuk menambah 1 data pelanggan baru(create)
     public function input(Request $request){
         $inputdata = $request->all();//mengambil semua input dari api client
         $validate = Validator::make($inputdata, [
             'nama_pelanggan' => 'required',
             'no_pelanggan' => 'required',
             'email_pelanggan' => 'required'
 
         ]);//membuat rule validasi input
 
         if($validate->fails())
             return response(['message' => $validate->errors()],400);//return error invalid input
 
         $pelanggan = Pelanggan::create($inputdata);//menambah data pelanggan baru
         return response([
             'message' => 'Pelanggan Berhasil ditambahkan',
             'data' => $pelanggan,
         ],200);//return data pelanggan baru dalam bentuk json
     }
 
     //method untuk menghapus 1 data pelanggan (delete)
     public function hapus($id){
         $pelanggan = Pelanggan::find($id);//mencari data pelanggan berdasarkan id
         
         if(is_null($pelanggan)){
             return response([
                 'message' => 'Pelanggan tidak ditemukan',
                 'data' => null
             ],404);
         }//return message saat data pelanggan tidak ditemukan
 
         if($pelanggan->delete()){
             return response([
                 'message' => 'Pelanggan berhasil dihapus',
                 'data' => $pelanggan,
             ],200);
         }//return message saat berhasil menghapus data pelanggan
         return response([
             'message' => 'Pelanggan Gagal dihapus',
             'data' => null
         ],400);//return message saat gagal menghapus data pelanggan
     }
 
     //method untuk mengubah 1 data pelanggan (update)
     public function update(Request $request, $id){
         $pelanggan = Pelanggan::find($id);//mencari data pelanggan berdasarkan id
         if(is_null($pelanggan)){
             return response([
                 'message' => 'Pelanggan tidak ditemukan',
                 'data' => null
             ],404);
         }//return message saat data pelanggan tidak ditemukan
 
         $updatedata = $request->all();
         $validate = Validator::make($updatedata, [
             'nama_pelanggan' => [Rule::unique('pelanggan')->ignore($pelanggan)],
             'no_pelanggan' => [Rule::unique('pelanggan')->ignore($pelanggan)],
             'email_pelanggan' => [Rule::unique('pelanggan')->ignore($pelanggan)]
         ]);//membuat rule validasi input
 
         if($validate->fails())
             return response(['message' => $validate->errors()],400);//return error invalid input
 
         $pelanggan->nama_pelanggan = $updatedata['nama_pelanggan'];//edit nama_pelanggan
         $pelanggan->no_pelanggan = $updatedata['no_pelanggan'];//edit no_telepon
         $pelanggan->email_pelanggan = $updatedata['email_pelanggan'];//edit email_pelanggan
 
         if($pelanggan->save()){
             return response([
                 'message' => 'Update Pelanggan Berhasil',
                 'data' => $pelanggan,
             ],200);
         }//return data pelanggan yang telah diedit dalam bentuk json
         
         return response([
             'message' => 'Update Pelanggan Gagal',
             'data' => null
         ],400);//return message saat pelanggan gagal diedit
     }
}
