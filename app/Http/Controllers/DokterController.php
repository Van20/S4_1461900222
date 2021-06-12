<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function dokter()
    {
        $list_dokter = Dokter::all();

        return view('/dokter/dokter_0222', ['list_dokter' => $list_dokter]);
    }

    public function create_dokter()
    {
        $list_dokter = Dokter::all();
        return view('/dokter/create_dokter_0222', ['list_dokter' => $list_dokter]); //memanggil view form add pasien
        
    }

     // method untuk insert data ke table dokter
     public function store(Request $request)
     {
         // insert data ke table dokter
         DB::table('dokter')->insert([
             'nama' => $request->nama,
             'jabatan' => $request->jabatan]
         );
 
         // alihkan halaman ke halaman /
         return redirect('/dokter');
     }

    // method untuk edit data dokter
    public function edit($id)
    { 
        // mengambil data pasien berdasarkan id yang dipilih
        $edit_dokter = DB::table('dokter')->where('id',$id)->get(); 
        
        // passing data buku yang didapat ke view edit.blade.php 
        return view('/dokter/edit_dokter_0222',['dokter' => $edit_dokter]);
        
    }

    // update data dokter
    public function update(Request $request)
    {
        // update data buku
        DB::table('dokter')->where('id',$request->id)->update([

            'nama' => $request->nama,
            'jabatan' => $request->jabatan
        ]);

        // alihkan halaman ke halaman /
        return redirect('/dokter');
    }

    public function destroy($id)
    {
        // menghapus data buku berdasarkan id yang dipilih
        DB::table('dokter')->where('id',$id)->delete();
        
        // alihkan halaman ke halaman buku
        return redirect('/dokter');
    }

}
