@extends('layouts.appadmin')

@section('title', 'Laporan Kasir')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Laporan Kasir (Owner)</h1>
            <small class="text-muted">Laporan performa kasir</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-user"></i> Data Laporan Kasir</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Kasir</th>
                                <th>Total Transaksi</th>
                                <th>Total Pendapatan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->kasir->name ?? '-' }}</td>
                                <td>{{ $item->totaltransaksi }}</td>
                                <td>Rp {{ number_format($item->totalpendapatan, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('laporan.kasir.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">Belum ada data laporan kasir.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection