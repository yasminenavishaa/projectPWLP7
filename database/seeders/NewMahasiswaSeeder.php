<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewMahasiswaSeeder extends Seeder
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
                'nim' => 2141720030,
                'nama' => 'Quina Shafa Andhani',
                'kelas' => 'TI -2F',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '081234567896',
                'email' => 'cipruttgemes@gmail.com',
                'tanggal_lahir' => '30 September 2013'
            ],
            [
                'nim' => 2141720123,
                'nama' => 'Cathrine Olivia Andhani',
                'kelas' => 'TI -2F',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '081987654321',
                'email' => 'pecintaleejenow@gmail.com',
                'tanggal_lahir' => '30 Juni 2001'
            ],
            [
                'nim' => 2141720016,
                'nama' => 'Lee Haechan',
                'kelas' => 'TI -2F',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '081223160103',
                'email' => 'idolkmygplggsetia@gmail.com',
                'tanggal_lahir' => '6 Juni 2000'
            ],
            [
                'nim' => 2141720045,
                'nama' => 'Ronaldo Messi',
                'kelas' => 'TI -2F',
                'jurusan' => 'Teknologi Informasi',
                'no_handphone' => '081246809753',
                'email' => 'artinyaapabangmessi@gmail.com',
                'tanggal_lahir' => '5 Februari 1985'
            ],
        ];
        DB::table('mahasiswas')->insert($data);
    }
}
