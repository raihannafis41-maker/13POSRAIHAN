@extends('layouts.appmanager')
@section('title', 'Dashboard Manager')

@section('content')
<div class="content-wrapper">

    <!-- HEADER -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3 align-items-center">
                <div class="col-sm-6">
                    <h1 class="fw-bold">Dashboard Manager</h1>
                    <small class="text-muted">
                        Monitoring operasional cafe hari ini
                    </small>
                </div>
                <div class="col-sm-6 text-right">
                    <span class="badge badge-info p-2">
                        {{ date('d M Y') }}
                    </span>
                    <span class="badge badge-success p-2">
                        Shift Aktif: {{ $shiftAktif }}
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN -->
    <section class="content">
        <div class="container-fluid">

            <!-- STAT BOX -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $totalProduk }}</h3>
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
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalKategori }}</h3>
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
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $pendapatanHariIni > 0 ? 'Rp '.number_format($pendapatanHariIni) : 'Rp 0' }}</h3>
                            <p>Pendapatan Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <a href="{{ url('/laporan') }}" class="small-box-footer">
                            Detail Laporan <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $penjualanHariIni }}</h3>
                            <p>Transaksi Hari Ini</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-receipt"></i>
                        </div>
                        <a href="{{ url('/laporan') }}" class="small-box-footer">
                            Lihat Transaksi <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>


            <!-- ROW 2 -->
            <div class="row">

                <!-- PRODUK TERLARIS -->
                <div class="col-md-7">
                    <div class="card card-outline card-primary shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title fw-bold">
                                <i class="fas fa-fire text-danger"></i> Produk Terlaris
                            </h3>
                        </div>

                        <div class="card-body">
                            @if($produkTerlaris->count() > 0)
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Total Terjual</th>
                                            <th>Total Pendapatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produkTerlaris as $p)
                                        <tr>
                                            <td>{{ $p->namaproduk }}</td>
                                            <td>{{ $p->total_qty }}</td>
                                            <td>Rp {{ number_format($p->total_pendapatan) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted mb-0">Belum ada transaksi hari ini.</p>
                            @endif
                        </div>
                    </div>
                </div>


                <!-- INFO SINGKAT -->
                <div class="col-md-5">
                    <div class="card card-outline card-success shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title fw-bold">
                                <i class="fas fa-chart-line"></i> Ringkasan Bulan Ini
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-success elevation-1">
                                    <i class="fas fa-coins"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pendapatan Bulan Ini</span>
                                    <span class="info-box-number">
                                        Rp {{ number_format($pendapatanBulanIni) }}
                                    </span>
                                </div>
                            </div>

                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-primary elevation-1">
                                    <i class="fas fa-chair"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Meja</span>
                                    <span class="info-box-number">
                                        {{ $totalMeja }}
                                    </span>
                                </div>
                            </div>

                            <div class="info-box bg-light">
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-users"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Kasir</span>
                                    <span class="info-box-number">
                                        {{ $totalKasir }}
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <!-- STOK MENIPIS -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-danger shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title fw-bold">
                                <i class="fas fa-exclamation-triangle"></i> Stok Menipis
                            </h3>
                        </div>

                        <div class="card-body">
                            @if($stokMenipis->count() > 0)
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Bahan Baku</th>
                                            <th>Stok Tersedia</th>
                                            <th>Stok Minimal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stokMenipis as $s)
                                        <tr>
                                            <td>{{ $s->namabahan }}</td>
                                            <td>{{ $s->stoktersedia }}</td>
                                            <td>{{ $s->stokminimal }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p class="text-muted mb-0">Semua stok masih aman.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

</div>
@endsection