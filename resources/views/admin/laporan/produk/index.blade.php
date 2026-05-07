@extends('layouts.appadmin')

@section('title', 'Laporan Produk')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Laporan Produk (Owner)</h1>
            <small class="text-muted">Data laporan produk terlaris</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-box"></i> Data Laporan Produk
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%">No</th>
                                <th>Produk</th>
                                <th>Total Terjual</th>
                                <th>Total Pendapatan</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->produk->namaproduk ?? '-' }}</td>
                                <td>{{ $item->totalterjual }}</td>
                                <td>Rp {{ number_format($item->totalpendapatan, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('laporan.produk.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada data laporan produk.
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