<?php

namespace App\Imports;

use App\Models\Kependudukan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KependudukanImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kependudukan([
            'nama' => $row['nama'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'deskripsi' => $row['deskripsi'],
            'kelompok_umur' => $row['kelompok_umur'],
            'pria' => $row['pria'],
            'wanita' => $row['wanita'],
            'total' => $row['total'],
        ]);
    }
}
