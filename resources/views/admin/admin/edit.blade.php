@extends('admin.layouts.app')

@section('contents')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Edit Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            Form Edit Admin
        </div>
        <div class="card-body">
            <form action="{{ route('admin.admin.update', ['id' => $admin->id]) }}" method="POST" >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
                </div>
                
                <div class="form-group">
                    <label for="nip">NIP:</label>
                    <input type="text" name="nip" class="form-control" value="{{ $admin->nip }}" required>
                </div>

                {{-- Password Field --}}
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>


                <a href="{{ route('admin.admin.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
