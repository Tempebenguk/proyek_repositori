<!-- tambah.blade.php -->

@extends('admin.layouts.app')

@section('contents')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Tambah Dosen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Dosen</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-header">
            Form Tambah Dosen
        </div>
        <div class="card-body">
            <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nidn">NIDN:</label>
                    <input type="text" name="nidn" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" name="foto" class="form-control-file" required>
                </div>

                <div class="form-group">
                    <label for="jabatan">Jabatan:</label>
                    <input type="text" name="jabatan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="bidang_keahlian">Bidang Keahlian:</label>
                    <input type="text" name="bidang_keahlian" class="form-control" required>
                </div>

                <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
