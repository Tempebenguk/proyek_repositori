@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
    <div class="row">

        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'bendahara') 
            <!-- Data Kos -->
            @php($jumlahKos = \App\Models\Kos::count())

            <!-- Data Kamar -->
            @php($jumlahKamar = \App\Models\Kamar::count())

            <!-- Data Penyewa -->
            @php($jumlahPenyewa = \App\Models\Penyewa::count())

            <!-- Pendapatan -->
            @php($totalPendapatan = \App\Models\Tagihan::where('status', 'Lunas')->sum('tagihan'))
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary h-100 text-white bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Rumah Kos</div>
                                <div class="h5 mb-0 font-weight-bold white">{{ $jumlahKos }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-home fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 text-white bg-success">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Kamar Kos</div>
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $jumlahKamar }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bed fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 text-white bg-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Penyewa
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-white">{{ $jumlahPenyewa }}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 text-white bg-warning">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Pendapatan</div>
                                <div class="h5 mb-0 font-weight-bold text-white">
                                    {{ 'Rp ' . number_format($totalPendapatan, 0, ',', '.') }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (auth()->user()->level == 'user')
            @php(
    $jumlahLunas = \App\Models\Tagihan::where('status', 'Lunas')->where('nama', auth()->user()->nama)->count()
)

            <!-- Data Tagihan Belum Lunas -->
            @php(
    $jumlahBelumLunas = \App\Models\Tagihan::where('status', 'Belum Lunas')->where('nama', auth()->user()->nama)->count()
)
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 text-white bg-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Lunas
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-white">{{ $jumlahLunas }}</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 text-white bg-warning">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                                    Belum Lunas</div>
                                <div class="h5 mb-0 font-weight-bold white">{{ $jumlahBelumLunas }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>


@endsection
