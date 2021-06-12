<?php

namespace App\Imports;

use App\Imports;
use App\Models\Pasien;
use Illmuinate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class PasienImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pasien([
            'nama'    => $row[1], 
            'alamat'    => $row[2], 
        ]);
    }
}
