<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Kamar;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $search = $request->cari;
            $rumah_sakit = DB::table('kamar')
                ->join('dokter', 'id_dokter', '=', 'dokter.id')
                ->join('pasien', 'id_pasien', '=', 'pasien.id')
                ->where('pasien.nama', 'like', '%' . $search . '%')
                ->select('kamar.id as id', 'id_pasien', 'id_dokter', 'pasien.nama as nama_pasien', 'alamat', 'dokter.nama as nama_dokter', 'jabatan')
                ->get();
        } else {
            $rumah_sakit = DB::table('kamar')
                ->join('dokter', 'id_dokter', '=', 'dokter.id')
                ->join('pasien', 'id_pasien', '=', 'pasien.id')
                ->select('kamar.id as id', 'id_pasien', 'id_dokter', 'pasien.nama as nama_pasien', 'alamat', 'dokter.nama as nama_dokter', 'jabatan')
                ->get();
        }
        return view('/kamar/kamar_0222', ['rumah_sakit' => $rumah_sakit]);
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $dokter_pasien = Pasien::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('/kamar/kamar_0222', compact('dokter_pasien'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
