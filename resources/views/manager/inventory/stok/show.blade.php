@extends('layouts.appmanager')

@section('title', 'Detail Stok')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Detail Stok</h1>
            <small class="text-muted">Informasi stok bahan baku</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">
                        <i class="fas fa-eye"></i> Detail Stok
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Nama Bahan</th>
                            <td>{{ $data->bahanbaku->namabahan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Stok Tersedia</th>
                            <td>{{ $data->stoktersedia }}</td>
                        </tr>
                        <tr>
                            <th>Stok Minimal</th>
                            <td>{{ $data->stokminimal }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($data->status == 'aman')
                                    <span class="badge badge-success">AMAN</span>
                                @elseif($data->status == 'menipis')
                                    <span class="badge badge-warning">MENIPIS</span>
                                @else
                                    <span class="badge badge-danger">HABIS</span>
                                @endif
                            </td>
                        </tr>
                    </table>

                    <a href="{{ url('inventory/stok') }}" class="btn btn-secondary mt-3">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </div>

        </div>
    </section>

</div>
@endsection