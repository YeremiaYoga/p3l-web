<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Menu;
class MenuController extends Controller
{
    public function index(){
        $menu = Menu::all(); // mengambil semua data

        if(count($menu) > 0){
            return response([
                'message' => 'Berhasil',
                'data' => $menu
            ],200);
        }

        return response([
            'message' => 'tidak ada',
            'data' => null
        ],404); // menu kosong
    }

    public function show($id){
        $menu = Menu::find($id); // mencari data

        if(!is_null($menu)){
            return response([
                'message' => "Berhasil",
                'data' => $menu
            ],200);
        } //retunr data yang di temukan dalam bentuk json

        return response([
            'message' => 'Menu tidak ada',
            'data' => null
        ],404);
    }

    public function input(Request $request){
        $inputdata = $request->all(); // mengambil data
        $validate = Validator::make($inputdata, [
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'gambar' => '',

        ]);

        if($validate->fails()){
            return response(['message' => $validate->errors()],400);
        }

        $menu = Menu::create($inputdata);
        return response([
            'message' => 'Berhasil',
            'data' => $menu
        ],200); // return message menu kosong
    }

    public function hapus($id){
        $menu = Menu::find($id);

        if(is_null($menu)){
            return response([
                'message' => 'Menu tidak ada',
                'data' => null
            ],404);
        }

        if($menu->delete()){
            return response([
                'message' => 'Berhasil dihapus',
                'data' => $menu,
            ],200);
        }

        return response([
            'message' => 'Gagal',
            'data' => null,
        ],400);// return gagal hapus
    }

    public function update(Request $request, $id){
        $menu = Menu::find($id);//cari data
        
        if(is_null($menu)){
            return response([
                'message' => 'Tidak ada',
                'data' => null
            ],404);
        }

        $updatedata = $request->all();//mengambil input dari klien
        $validate = Validator::make($updatedata, [
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            //'gambar' => null,
        ]);

        if($validate->fails()){
            return response(['message' => $validate->errors()],400);
        }

        $menu->nama_menu = $updatedata['nama_menu'];
        $menu->deskripsi_menu = $updatedata['deskripsi_menu'];
        $menu->kategori = $updatedata['kategori'];
        $menu->harga = $updatedata['harga'];
        //$menu->gambar = $updatedata['gambar'];

        if($menu->save()){
            return response([
                'message' => 'Update berhasil',
                'data' => $menu,
            ],200);
        }

        return reponse([
            'message' => 'Update gagal',
            'data' => null,
        ],400);
    }
}
