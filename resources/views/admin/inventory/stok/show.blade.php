@extends('layouts.appadmin')

@section('title', 'Detail Stok')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Stok</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Bahan Baku</th>
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
                <td>{{ $data->status }}</td>
            </tr>
        </table>

        <a href="{{ url('/inventory/stok') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection