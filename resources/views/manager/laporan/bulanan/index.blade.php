@extends('layouts.appmanager')

@section('title', 'Laporan Bulanan')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Laporan Bulanan (Manager)</h1>
            <small class="text-muted">Monitoring laporan bulanan</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-calendar-alt"></i> Data Laporan Bulanan
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Total Transaksi</th>
                                <th>Total Pendapatan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->bulan }}</td>
                                <td>{{ $item->tahun }}</td>
                                <td>{{ $item->totaltransaksi }}</td>
                                <td>Rp {{ number_format($item->totalpendapatan, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('laporan.bulanan.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Belum ada data laporan bulanan.
                                </td>
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