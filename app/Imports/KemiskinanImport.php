<?php

namespace App\Imports;

use App\Models\Kemiskinan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KemiskinanImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kemiskinan([

            'nama' => $row['nama'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'deskripsi' => $row['deskripsi'],
            'kabupaten' => $row['kabupaten'],
            'rasio' => $row['rasio'],
        ]);
    }
}
