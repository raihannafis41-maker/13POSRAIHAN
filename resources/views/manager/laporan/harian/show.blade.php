@extends('layouts.appmanager')

@section('title', 'Detail Laporan Harian')

@section('content')
<div class="content-wrapper">

    <!-- HEADER -->
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Detail Laporan Harian</h1>
            <small class="text-muted">Detail data laporan transaksi harian</small>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">
                        <i class="fas fa-file-alt"></i> Detail Laporan Harian
                    </h3>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 250px;">Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                        </tr>

                        <tr>
                            <th>Total Transaksi</th>
                            <td>{{ $row->totaltransaksi }}</td>
                        </tr>

                        <tr>
                            <th>Total Pendapatan</th>
                            <td>Rp {{ number_format($row->totalpendapatan, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <th>Total Diskon</th>
                            <td>Rp {{ number_format($row->totaldiskon, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <th>Total Pajak</th>
                            <td>Rp {{ number_format($row->totalpajak, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <th>Dibuat Pada</th>
                            <td>{{ $row->created_at }}</td>
                        </tr>

                        <tr>
                            <th>Diupdate Pada</th>
                            <td>{{ $row->updated_at }}</td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="{{ route('laporan.harian.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>

                </div>

                <div class="card-footer text-muted text-center">
                    CAFEPOS - Detail Laporan Harian Manager
                </div>
            </div>

        </div>
    </section>

</div>
@endsection