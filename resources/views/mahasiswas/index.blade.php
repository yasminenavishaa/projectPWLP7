@extends('mahasiswas.layout')

@section('content')
 <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>

        <form class="form-left my-2" method="get" action="{{ route('search') }}">
                <div class="form-group w-80 mb-3">
                    <label for="search" class="d-block mr-2">Pencarian</label>
                    <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Nama">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    <a class="btn btn-success right" href="{{ route('mahasiswas.create') }}">Input Mahasiswa</a>
                </div>
            </form>
    </div>
 </div>
 
 @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
 @endif
 
 <table class="table table-bordered">
    <tr>
        <th>nim</th>
        <th>nama</th>
        <th>kelas</th>
        <th>jurusan</th>
        <th>no_handphone</th>
        <th>email</th>
        <th>tanggal_lahir</th>
        <th width="280px">Action</th>
    </tr>
 @foreach ($mahasiswas as $Mahasiswa)
 <tr>
 
        <td>{{ $Mahasiswa->nim }}</td>
        <td>{{ $Mahasiswa->nama }}</td>
        <td>{{ $Mahasiswa->kelas }}</td>
        <td>{{ $Mahasiswa->jurusan }}</td>
        <td>{{ $Mahasiswa->no_handphone }}</td>
        <td>{{ $Mahasiswa->email }}</td>
        <td>{{ $Mahasiswa->tanggal_lahir }}</td>
        <td>

            <form action="{{ route('mahasiswas.destroy',$Mahasiswa->nim) }}" method="POST">
 
                <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->nim) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
 </table>
 {!! $mahasiswas->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection