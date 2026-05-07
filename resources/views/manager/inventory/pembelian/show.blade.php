@extends('layouts.appmanager')

@section('title', 'Detail Pembelian')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Detail Pembelian</h1>
            <small class="text-muted">Detail transaksi pembelian</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">
                        <i class="fas fa-eye"></i> Detail Pembelian
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Kode Pembelian</th>
                            <td>{{ $data->kodepembelian ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td>{{ $data->supplier->namasupplier ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td>{{ $data->user->name ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>Rp {{ number_format($data->total,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Pembelian</th>
                            <td>{{ $data->tanggalpembelian }}</td>
                        </tr>
                    </table>

                    <a href="{{ url('inventory/pembelian') }}" class="btn btn-secondary mt-3">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </div>

        </div>
    </section>

</div>
@endsection