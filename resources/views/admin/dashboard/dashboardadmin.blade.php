@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <!-- HEADER -->
    <div class="row mb-3">
        <div class="col-sm-6">
            <h1 class="m-0 font-weight-bold">Dashboard Admin</h1>
        </div>
    </div>

    <!-- INFO BOX -->
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalProduk ?? 0 }}</h3>
                    <p>Total Produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ url('/master/produk') }}" class="small-box-footer">
                    Lihat Produk <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalKategori ?? 0 }}</h3>
                    <p>Total Kategori</p>
                </div>
                <div class="icon">
                    <i class="fas fa-list"></i>
                </div>
                <a href="{{ url('/master/kategori') }}" class="small-box-footer">
                    Lihat Kategori <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalMeja ?? 0 }}</h3>
                    <p>Total Meja</p>
                </div>
                <div class="icon">
                    <i class="fas fa-chair"></i>
                </div>
                <a href="{{ url('/master/meja') }}" class="small-box-footer">
                    Lihat Meja <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalUser ?? 0 }}</h3>
                    <p>Total User</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ url('/master/user') }}" class="small-box-footer">
                    Lihat User <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>

    <!-- RINGKASAN -->
    <div class="row">

        <!-- RINGKASAN PENJUALAN -->
        <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-chart-line mr-1"></i>
                        Ringkasan Penjualan Hari Ini
                    </h3>
                </div>
                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th>Total Transaksi</th>
                            <td>{{ $totalTransaksi ?? 0 }}</td>
                        </tr>
                        <tr>
                            <th>Total Pendapatan</th>
                            <td>Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Diskon</th>
                            <td>Rp {{ number_format($totalDiskon ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Pajak</th>
                            <td>Rp {{ number_format($totalPajak ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <!-- SHIFT AKTIF -->
        <div class="col-md-6">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-user-clock mr-1"></i>
                        Shift Aktif
                    </h3>
                </div>
                <div class="card-body">

                    @if(isset($shiftAktif) && $shiftAktif)
                        <p><b>Kasir:</b> {{ $shiftAktif->user->name ?? '-' }}</p>
                        <p><b>Mulai:</b> {{ $shiftAktif->shiftmulai ?? '-' }}</p>
                        <p><b>Saldo Awal:</b> Rp {{ number_format($shiftAktif->saldoawal ?? 0, 0, ',', '.') }}</p>
                        <span class="badge badge-success">OPEN</span>
                    @else
                        <p class="text-muted">Tidak ada shift aktif.</p>
                    @endif

                </div>
            </div>
        </div>

    </div>

    <!-- QUICK ACCESS -->
    <div class="row">
        <div class="col-12">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-link mr-1"></i>
                        Quick Access
                    </h3>
                </div>

                <div class="card-body">
                    <div class="row text-center">

                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ url('/master/produk') }}" class="btn btn-info btn-block">
                                <i class="fas fa-box"></i><br>Produk
                            </a>
                        </div>

                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ url('/master/kategori') }}" class="btn btn-success btn-block">
                                <i class="fas fa-list"></i><br>Kategori
                            </a>
                        </div>

                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ url('/master/meja') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-chair"></i><br>Meja
                            </a>
                        </div>

                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ url('/master/user') }}" class="btn btn-danger btn-block">
                                <i class="fas fa-users"></i><br>User
                            </a>
                        </div>

                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ url('/laporan') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-file-alt"></i><br>Laporan
                            </a>
                        </div>

                        <div class="col-md-2 col-6 mb-3">
                            <a href="{{ url('/loginhistory') }}" class="btn btn-secondary btn-block">
                                <i class="fas fa-history"></i><br>History
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection