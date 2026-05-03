@extends('layouts.appadmin')

@section('title', 'Data Kategori')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kategori</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no => $row)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $row->namakategori }}</td>
                    <td>{{ $row->deskripsi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection