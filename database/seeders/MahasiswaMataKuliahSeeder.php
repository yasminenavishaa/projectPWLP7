<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaMataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'mahasiswa_id' => '2141720047',
                'matakuliah_id' => 1,
                'nilai' => '97'
            ],
            [
                'mahasiswa_id' => '2141720047',
                'matakuliah_id' => 2,
                'nilai' => '98'
            ],
            [
                'mahasiswa_nim' => '2141720047',
                'matakuliah_id' => 3,
                'nilai' => '99'
            ],
            [
                'mahasiswa_nim' => '2141720047',
                'matakuliah_id' => 4,
                'nilai' => '96'
            ],
        ];
        DB::table('mahasiswa_matakuliah')->insert($data);
    }
}
