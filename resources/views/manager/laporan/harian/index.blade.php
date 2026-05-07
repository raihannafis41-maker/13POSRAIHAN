@extends('layouts.appmanager')

@section('title', 'Laporan Harian')

@section('content')
<div class="content-wrapper">

    <!-- HEADER -->
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Laporan Harian</h1>
            <small class="text-muted">Data laporan transaksi harian</small>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-times-circle"></i> {{ session('error') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-day"></i> Daftar Laporan Harian
                    </h3>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Tanggal</th>
                                <th>Total Transaksi</th>
                                <th>Total Pendapatan</th>
                                <th>Total Diskon</th>
                                <th>Total Pajak</th>
                                <th style="width: 140px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                    </td>

                                    <td>
                                        {{ $item->totaltransaksi }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($item->totalpendapatan, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($item->totaldiskon, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        Rp {{ number_format($item->totalpajak, 0, ',', '.') }}
                                    </td>

                                    <td>
                                        <a href="{{ route('laporan.harian.show', $item->id) }}"
                                           class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        <i class="fas fa-info-circle"></i>
                                        Belum ada laporan harian di database.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

                <div class="card-footer text-muted text-center">
                    CAFEPOS - Laporan Harian Manager
                </div>

            </div>

        </div>
    </section>

</div>
@endsection