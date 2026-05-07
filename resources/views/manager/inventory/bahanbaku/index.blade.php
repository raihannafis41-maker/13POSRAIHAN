@extends('layouts.appmanager')

@section('title', 'Data Bahan Baku')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <h1 class="fw-bold">Data Bahan Baku</h1>
        <small class="text-muted">Monitoring bahan baku</small>
    </div>
</section>

<section class="content">
    <div class="container-fluid">

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="card-title">
                    <i class="fas fa-seedling"></i> Data Bahan Baku
                </h3>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead class="bg-light">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Harga Beli</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kodebahan }}</td>
                            <td>{{ $item->namabahan }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>Rp {{ number_format($item->hargabeli,0,',','.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</section>
@endsection