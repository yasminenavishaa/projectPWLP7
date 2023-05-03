<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas; 
use App\Models\MahasiswaMataKuliah;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Ramsey\Collection\Map\AssociativeArrayMap;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $mahasiswas = Mahasiswa::all();
        $user = Auth::user();
        $mahasiswas = Mahasiswa::paginate(5);
        return view('mahasiswas.index', compact('mahasiswas','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswas.create',['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        $mahasiswas = new Mahasiswa;
        $mahasiswas->nim=$request->get('nim');
        $mahasiswas->nama=$request->get('nama');
        $mahasiswas->jurusan=$request->get('jurusan');
        $mahasiswas->no_handphone=$request->get('no_handphone');
        $mahasiswas->email=$request->get('email');
        $mahasiswas->tanggal_lahir=$request->get('tanggal_lahir');

        //fungsi eloquent untuk menambah data dengan relasi belongs to
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function show($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswas.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function edit($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);
        $kelas = Kelas::all();
        return view('mahasiswas.edit', compact('Mahasiswa','kelas'));
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        $mahasiswas = Mahasiswa::find($nim);
        $mahasiswas->nim=$request->get('nim');
        $mahasiswas->nama=$request->get('nama');
        $mahasiswas->jurusan=$request->get('jurusan');
        $mahasiswas->no_handphone=$request->get('no_handphone');
        $mahasiswas->email=$request->get('email');
        $mahasiswas->tanggal_lahir=$request->get('tanggal_lahir');

        //fungsi eloquent untuk menambah data dengan relasi belongs to
        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswas->kelas()->associate($kelas);
        $mahasiswas->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswas.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        Mahasiswa::find($nim)->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mahasiswas = Mahasiswa::where('nama', 'like', "%" . $keyword . "%")->paginate(5);
        return view('mahasiswas.index', compact('mahasiswas'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    public function nilai($nim)
    {
        $Mahasiswa = Mahasiswa::find($nim);
        $Matakuliah = Matakuliah::all();
        $MahasiswaMataKuliah = MahasiswaMataKuliah::where('mahasiswa_id','=',$nim)->get();
        return view('mahasiswas.nilai',['Mahasiswa' => $Mahasiswa],['MahasiswaMataKuliah' => $MahasiswaMataKuliah], compact('MahasiswaMataKuliah'));
    }
}
