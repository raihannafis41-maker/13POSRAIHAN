@extends('layouts.appadmin')

@section('title', 'Data Produk')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Produk</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{ $row->kodeproduk }}</td>
                    <td>{{ $row->namaproduk }}</td>
                    <td>{{ $row->kategori->namakategori ?? '-' }}</td>
                    <td>Rp {{ number_format($row->hargajual) }}</td>
                    <td>
                        <span class="badge badge-success">{{ $row->status }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection