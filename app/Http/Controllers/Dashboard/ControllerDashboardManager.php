@extends('layouts.appadmin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1>Dashboard Admin</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <small class="text-muted">CAFEPOS - Sistem Kasir Cafe</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Info Box -->
            <div class="row">

                <!-- Total Produk -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $totalProduk ?? 0 }}</h3>
                            <p>Total Produk</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Lihat Produk <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Total Kategori -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalKategori ?? 0 }}</h3>
                            <p>Total Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Lihat Kategori <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Total Meja -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalMeja ?? 0 }}</h3>
                            <p>Total Meja</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chair"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Lihat Meja <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Total User -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $totalUser ?? 0 }}</h3>
                            <p>Total User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Lihat User <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Ringkasan -->
            <div class="row">

                <!-- Penjualan Hari Ini -->
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-line"></i> Ringkasan Penjualan Hari Ini
                            </h3>
                        </div>
                        <div class="card-body">
                            <p><b>Total Transaksi:</b> {{ $transaksiHariIni ?? 0 }}</p>
                            <p><b>Total Pendapatan:</b> Rp {{ number_format($pendapatanHariIni ?? 0, 0, ',', '.') }}</p>
                            <p><b>Total Diskon:</b> Rp {{ number_format($diskonHariIni ?? 0, 0, ',', '.') }}</p>
                            <p><b>Total Pajak:</b> Rp {{ number_format($pajakHariIni ?? 0, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Shift Aktif -->
                <div class="col-md-6">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-clock"></i> Shift Aktif
                            </h3>
                        </div>
                        <div class="card-body">
                            @if(isset($shiftAktif) && $shiftAktif)
                                <p>
                                    <b>Kasir:</b>
                                    {{ $shiftAktif->user->name ?? 'Kasir Tidak Diketahui' }}
                                </p>

                                <p>
                                    <b>Shift Mulai:</b>
                                    {{ $shiftAktif->shiftmulai ? \Carbon\Carbon::parse($shiftAktif->shiftmulai)->format('d-m-Y H:i') : '-' }}
                                </p>

                                <p>
                                    <b>Saldo Awal:</b>
                                    Rp {{ number_format($shiftAktif->saldoawal ?? 0, 0, ',', '.') }}
                                </p>

                                <p>
                                    <b>Status:</b>
                                    <span class="badge badge-success">OPEN</span>
                                </p>
                            @else
                                <p class="text-muted">Tidak ada shift yang sedang aktif.</p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <!-- Quick Menu -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-cogs"></i> Quick Access
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">

                                <div class="col-md-2 col-6 mb-3">
                                    <a href="#" class="btn btn-app bg-info">
                                        <i class="fas fa-coffee"></i> Produk
                                    </a>
                                </div>

                                <div class="col-md-2 col-6 mb-3">
                                    <a href="#" class="btn btn-app bg-success">
                                        <i class="fas fa-list"></i> Kategori
                                    </a>
                                </div>

                                <div class="col-md-2 col-6 mb-3">
                                    <a href="#" class="btn btn-app bg-warning">
                                        <i class="fas fa-chair"></i> Meja
                                    </a>
                                </div>

                                <div class="col-md-2 col-6 mb-3">
                                    <a href="#" class="btn btn-app bg-danger">
                                        <i class="fas fa-users"></i> User
                                    </a>
                                </div>

                                <div class="col-md-2 col-6 mb-3">
                                    <a href="#" class="btn btn-app bg-primary">
                                        <i class="fas fa-file-alt"></i> Laporan
                                    </a>
                                </div>

                                <!-- FIX ROUTE LOGIN HISTORY -->
                                <div class="col-md-2 col-6 mb-3">
                                    <a href="{{ route('owner.loginhistory') }}" class="btn btn-app bg-secondary">
                                        <i class="fas fa-history"></i> Login History
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection