@extends('layouts.appadmin')

@section('title', 'Data Stok Keluar')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Stok Keluar</h3>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bahan Baku ID</th>
                    <th>Jumlah</th>
                    <th>Tanggal Keluar</th>
                    <th>Alasan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no => $row)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $row->bahanbakuid }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->tanggalkeluar }}</td>
                    <td>{{ $row->alasan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection