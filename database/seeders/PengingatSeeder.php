<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengingatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengingats')->insert([
            'waktu' => now(),
            'tenggat_waktu' => now(),
            'user_id' => 1,
            'topik' => 'Kemiskinan',
            'frekuensi' => '2024',
            'status' => 'Remind',
        ]);
    }
}
