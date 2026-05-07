@extends('layouts.appadmin')

@section('title', 'Detail Laporan Shift')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Detail Laporan Shift</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title mb-0"><i class="fas fa-eye"></i> Detail Shift</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr><th width="30%">Shift ID</th><td>{{ $data->shiftid }}</td></tr>
                        <tr><th>Total Transaksi</th><td>{{ $data->totaltransaksi }}</td></tr>
                        <tr><th>Total Pendapatan</th><td>Rp {{ number_format($data->totalpendapatan, 0, ',', '.') }}</td></tr>
                    </table>

                    <a href="{{ route('laporan.shift.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </div>

        </div>
    </section>
</div>
@endsection