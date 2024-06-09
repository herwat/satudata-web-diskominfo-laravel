<?php

namespace App\Imports;

use App\Models\Sosial;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SosialImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Sosial([
            'nama' => $row['nama'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'deskripsi' => $row['deskripsi'],
            'kabupaten' => $row['kabupaten'],
            'jumlah_keluarga_penerima_manfaat' => $row['jumlah_keluarga_penerima_manfaat'],
            'rencana_pkm' => $row['rencana_pkm'],
            'realisasi_pkm' => $row['realisasi_pkm'],
            'jumlah_anggaran' => $row['jumlah_anggaran'],
            'rencana_anggaran' => $row['rencana_anggaran'],
            'realisasi_anggaran' => $row['realisasi_anggaran'],
        ]);
    }
}
