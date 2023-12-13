@extends('admin.layouts.app')

@section('contents')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Tambah Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Mahasiswa</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            Form Tambah Mahasiswa
        </div>
        <div class="card-body">
            <form action="{{ route('admin.mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tahun_masuk">Tahun Masuk:</label>
                    <input type="text" name="tahun_masuk" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="foto">Foto:</label>
                    <input type="file" name="foto" class="form-control-file" required>
                </div>

                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
