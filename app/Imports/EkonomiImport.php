<?php

namespace App\Imports;

use App\Models\Ekonomi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EkonomiImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Ekonomi([
            'nama' => $row['nama'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'deskripsi' => $row['deskripsi'],
            'tanggal' => $row['tanggal'],
            'bulan' => $row['bulan'],
            'indeks_harga_diterima' => $row['indeks_harga_diterima'],
            'indeks_harga_dibayar' => $row['indeks_harga_dibayar'],
            'ntp' => $row['ntp'],
        ]);
    }
}
