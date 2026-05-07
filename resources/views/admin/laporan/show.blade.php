@extends('layouts.appadmin')

@section('title', 'Detail Laporan')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Detail Laporan</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">
                        <i class="fas fa-eye"></i> Detail Data Laporan
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Jenis Laporan</th>
                            <td>{{ $data->jenislaporan }}</td>
                        </tr>
                        <tr>
                            <th>Periode Awal</th>
                            <td>{{ $data->periodeawal ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Periode Akhir</th>
                            <td>{{ $data->periodeakhir ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Total Data</th>
                            <td>{{ $data->totaldata }}</td>
                        </tr>
                    </table>

                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </div>

        </div>
    </section>

</div>
@endsection