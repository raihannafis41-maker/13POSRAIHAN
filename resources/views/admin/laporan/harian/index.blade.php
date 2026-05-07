@extends('layouts.appadmin')

@section('title', 'Laporan Harian')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Laporan Harian</h1>
            <small class="text-muted">Data transaksi penjualan harian</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- CARD --}}
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">
                        <i class="fas fa-calendar-day"></i> Data Laporan Harian
                    </h3>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Total Transaksi</th>
                                <th>Total Pendapatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                    <td>{{ $item->totaltransaksi }}</td>
                                    <td>Rp {{ number_format($item->totalpendapatan, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('laporan.harian.show', $item->id) }}"
                                           class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Tidak ada data laporan harian
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <div class="card-footer">
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </div>

        </div>
    </section>

</div>
@endsection