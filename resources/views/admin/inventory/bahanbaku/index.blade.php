@extends('layouts.appadmin')

@section('title', 'Data Bahan Baku')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Data Bahan Baku</h3>
        <a href="{{ url('/inventory/bahanbaku/create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Bahan</th>
                    <th>Stok</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $no => $row)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $row->kodebahan }}</td>
                    <td>{{ $row->namabahan }}</td>
                    <td>{{ $row->stok }}</td>
                    <td>{{ $row->satuan }}</td>
                    <td>Rp {{ number_format($row->hargabeli,0,',','.') }}</td>
                    <td>
                        <a href="{{ url('/inventory/bahanbaku/show/'.$row->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ url('/inventory/bahanbaku/edit/'.$row->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ url('/inventory/bahanbaku/delete/'.$row->id) }}"
                           onclick="return confirm('Yakin hapus data ini?')"
                           class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Data belum tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection