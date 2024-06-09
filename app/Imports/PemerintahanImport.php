<?php

namespace App\Imports;

use App\Models\Pemerintahan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PemerintahanImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pemerintahan([
            'nama' => $row['nama'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'deskripsi' => $row['deskripsi'],
            'partai_politik' => $row['partai_politik'],
            'pria' => $row['pria'],
            'wanita' => $row['wanita'],
            'total' => $row['total'],
        ]);
    }
}
