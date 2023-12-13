@extends('admin.layouts.app')

@section('contents')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Edit Dosen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Dosen</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            Form Edit Dosen
        </div>
        <div class="card-body">
            <form action="{{ route('admin.dosen.update', ['id' => $dosen->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" class="form-control" value="{{ $dosen->name }}" required>
                </div>

                <div class="form-group">
                    <label for="nidn">NIDN:</label>
                    <input type="text" name="nidn" class="form-control" value="{{ $dosen->nidn }}" required>
                </div>

                {{-- Password Field --}}
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>

                {{-- Foto Field --}}
                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" name="foto" class="form-control-file">
                    <img src="{{ asset('storage/' . $dosen->foto) }}" alt="Foto Dosen"
                        style="max-width: 100px; max-height: 100px; margin-top: 10px;">
                </div>

                {{-- Jabatan Field --}}
                <div class="form-group">
                    <label for="jabatan">Jabatan:</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $dosen->jabatan }}" required>
                </div>

                {{-- Bidang Keahlian Field --}}
                <div class="form-group">
                    <label for="bidang_keahlian">Bidang Keahlian:</label>
                    <input type="text" name="bidang_keahlian" class="form-control" value="{{ $dosen->bidang_keahlian }}" required>
                </div>

                <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
