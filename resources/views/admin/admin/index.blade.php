@extends('admin.layouts.app')

@section('contents')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <form action="{{ route('admin.admin.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari...">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </form>

    <!-- Tabel untuk menampilkan data mahasiswa dari AdminLTE -->
    <div class="card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
            @endif
            <div>
                <a href="{{ route('admin.admin.tambah') }}" class="btn btn-primary" style="margin-bottom: 10px;">Tambah
                    Data</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $adm)
                        <tr>
                            <td>{{ $adm->nip }}</td>
                            <td>{{ $adm->name }}</td>
                            <td>{{ $adm->password }}</td>
                            <td>
                                <a href="{{ route('admin.admin.edit', $adm->id) }}">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                <a href="{{ route('admin.admin.hapus', $adm->id) }}"
                                    onclick="return confirm('Anda yakin ingin menghapus data admin ini?');">
                                    <button class="btn btn-danger">Hapus</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
