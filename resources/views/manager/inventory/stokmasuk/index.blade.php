@extends('layouts.appmanager')

@section('title', 'Monitoring Stok Masuk')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Monitoring Stok Masuk</h1>
            <small class="text-muted">Riwayat stok masuk bahan baku</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title">
                        <i class="fas fa-arrow-down"></i> Data Stok Masuk
                    </h3>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Bahan</th>
                                <th>Jumlah</th>
                                <th>Tanggal Masuk</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->bahanbaku->namabahan ?? '-' }}</td>
                                    <td>{{ $row->jumlah }}</td>
                                    <td>{{ $row->tanggalmasuk }}</td>
                                    <td>{{ $row->keterangan ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Tidak ada data stok masuk
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