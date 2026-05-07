@extends('layouts.appmanager')

@section('title', 'Laporan Keuntungan')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Laporan Keuntungan (Manager)</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-chart-line"></i> Data Laporan Keuntungan</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Tanggal</th>
                                <th>Total Pemasukan</th>
                                <th>Total Pengeluaran</th>
                                <th>Keuntungan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>Rp {{ number_format($item->totalpemasukan, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->totalpengeluaran, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->keuntungan, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('laporan.keuntungan.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data laporan keuntungan.</td>
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