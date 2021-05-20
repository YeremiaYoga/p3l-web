<?php

namespace App\Http\Controllers;

use Validator; //import library untuk validasi
use App\Models\Reservasi; //import modal Pelanggan
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ReservasiController extends Controller
{
    public function index()
     {
         $reservasi = DB::table ('reservasis')
         ->join('pelanggans', 'reservasis.id_pelanggan', '=', 'pelanggans.id')
         ->select('reservasis.*', 'pelanggans.nama_pelanggan','pelanggans.no_pelanggan', 'pelanggans.email_pelanggan')
         ->where('reservasis.hapus', '=',1)
         ->get();//mengambil semua data reservasi
         if(count($reservasi) > 0){
             return response([
                 'message' => 'Berhasil',
                 'data' => $reservasi
             ],200);
         }//return data semua reservasi dalam bentuk json
         
         return response([
             'message' => 'Kosong',
             'data' => null
         ],404);//return message data reservasi kosong
     }
 
     //method untuk menampilkan 1 data reservasi (search)
     public function show($id){
         $reservasi = Reservasi::find($id);//mencari data reservasi berdasarkan id
 
         if(!is_null($reservasi)){
             return response([
                 'message' => 'berhasil',
                 'data' => $reservasi
             ],200);
         }//return data semua reservasi dalam bentuk json
 
         return response([
             'message' => 'reservasi tidak ditemukan',
             'data' => null
         ],404);//return message saat data reservasi tidak ditemukan
         
     }
 
     //method untuk menambah 1 data reservasi baru(create)
     public function input(Request $request){
         $inputdata = $request->all();//mengambil semua input dari api client
         $validate = Validator::make($inputdata, [
             'id_pelanggan' => 'required',
             'id_karyawan' => 'required',
             'id_meja' => 'required',
             'sesi' => 'required',
             'tanggal' => 'required'
 
         ]);//membuat rule validasi input
 
         if($validate->fails())
             return response(['message' => $validate->errors()],400);//return error invalid input
 
         $reservasi = Reservasi::create($inputdata);//menambah data reservasi baru
         return response([
             'message' => 'reservasi Berhasil ditambahkan',
             'data' => $reservasi,
         ],200);//return data reservasi baru dalam bentuk json
     }
 
     //method untuk menghapus 1 data reservasi (delete)
     public function hapus($id){
        $reservasi = Reservasi::find($id);//mencari data karyawan berdasarkan id
        
        if(is_null($reservasi)){
            return response([
                'message' => 'reservasi tidak ditemukan',
                'data' => null
            ],404);
        }//return message saat data karyawan tidak ditemukan

        $reservasi->hapus = 0;//edit nama_karyawan
        if($reservasi->save()){
            return response([
                'message' => 'Hapus reservasi Berhasil',
                'data' => $reservasi,
            ],200);
       };

        //return message saat berhasil menghapus data karyawan
    }
 
     //method untuk mengubah 1 data reservasi (update)
     public function update(Request $request, $id){
         $reservasi = Reservasi::find($id);//mencari data reservasi berdasarkan id
         if(is_null($reservasi)){
             return response([
                 'message' => 'reservasi tidak ditemukan',
                 'data' => null
             ],404);
         }//return message saat data reservasi tidak ditemukan
 
         $updatedata = $request->all();
         $validate = Validator::make($updatedata, [
             'id_meja' => 'required',
             'sesi' => 'required',
             'tanggal' => 'required'
         ]);//membuat rule validasi input
 
         if($validate->fails())
             return response(['message' => $validate->errors()],400);//return error invalid input
 
         $reservasi->id_meja = $updatedata['id_meja'];//edit nama_reservasi
         $reservasi->sesi = $updatedata['sesi'];//edit no_telepon
         $reservasi->tanggal = $updatedata['tanggal'];//edit email_reservasi
 
         if($reservasi->save()){
             return response([
                 'message' => 'Update reservasi Berhasil',
                 'data' => $reservasi,
             ],200);
         }//return data reservasi yang telah diedit dalam bentuk json
         
         return response([
             'message' => 'Update reservasi Gagal',
             'data' => null
         ],400);//return message
    }
}
