<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
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
                'nim' => 2141720047,
                'nama' => 'Yasmine Navisha Andhani',
                'kelas' => 'TI -2F',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '081233672068'
            ],
            [
                'nim' => 2141720241,
                'nama' => 'Yuliyana Rahmawati',
                'kelas' => 'TI -2F',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '0895391933533'
            ],
            [
                'nim' => 2141720023,
                'nama' => 'Huang Renjun',
                'kelas' => 'TI -2F',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '081230300016'
            ],
        ];
        DB::table('mahasiswas')->insert($data);
    }
}
