<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Models\kelas;


class Mahasiswa extends Model
{
    protected $table="mahasiswas"; //Eloquent akan membuat model mahasiswa record di tabel mahasiswa
    protected $primaryKey = 'nim'; //Memanggil isi DB dengan primaryKey
    public $timestamps = false;

    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
        'no_handphone',
        'email',
        'tanggal_lahir',
    ];

    public  function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah(){
        return $this->belongsToMany(MataKuliah::class);
    }
};
