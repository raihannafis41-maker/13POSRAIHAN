@extends('layouts.appadmin')

@section('title', 'Detail Stok Masuk')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Stok Masuk</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Bahan Baku</th>
                <td>{{ $data->bahanbaku->namabahan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $data->jumlah }}</td>
            </tr>
            <tr>
                <th>Tanggal Masuk</th>
                <td>{{ $data->tanggalmasuk }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $data->keterangan }}</td>
            </tr>
        </table>

        <a href="{{ url('/inventory/stokmasuk') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection