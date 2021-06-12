<?php

namespace App\Imports;

use App\Imports;
use App\Models\Dokter;
use Illmuinate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class DokterImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dokter([
            'nama'    => $row[1], 
            'jabatan'    => $row[2], 
        ]);
    }
}
