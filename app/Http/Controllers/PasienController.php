<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function pasien()
    {
        $list_pasien = Pasien::all();

        return view('/pasien/pasien_0222', ['list_pasien' => $list_pasien]);
    }

    public function create_pasien()
    {
        $list_pasien = Pasien::all();
        return view('/pasien/create_pasien_0222'); //memanggil view form add pasien
    }

    // method untuk insert data ke table pasien
    public function store(Request $request)
    {
        // insert data ke table pasien
        DB::table('pasien')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat]
        );

        // alihkan halaman ke halaman /
        return redirect('/pasien');
    }

    // method untuk edit data pasien
    public function edit($id)
    { 
        // mengambil data pasien berdasarkan id yang dipilih
        $edit_pasien = DB::table('pasien')->where('id',$id)->get(); 
        
        // passing data buku yang didapat ke view edit.blade.php 
        return view('/pasien/edit_pasien_0222',['pasien' => $edit_pasien]);
    }

    // update data pasien
    public function update(Request $request)
    {
        // update data pasien
        DB::table('pasien')->where('id',$request->id)->update([

            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);

        // alihkan halaman ke halaman /
        return redirect('/pasien');
    }

    public function destroy($id)
    {
        // menghapus data buku berdasarkan id yang dipilih
        DB::table('pasien')->where('id',$id)->delete();
        
        // alihkan halaman ke halaman buku
        return redirect('/pasien');
    }
}
