<?php

namespace App\Imports;

use App\Models\LinkunganHidup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LingkunganImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new LinkunganHidup([
            'nama' => $row['nama'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'deskripsi' => $row['deskripsi'],
            'kabupaten' => $row['kabupaten'],
            'ibukota_kabupaten' => $row['ibukota_kabupaten'],
            'luas_total_daerah' => $row['luas_total_daerah'],
        ]);
    }
}
