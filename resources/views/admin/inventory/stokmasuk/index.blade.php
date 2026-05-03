@extends('layouts.appadmin')

@section('title', 'Data Stok Masuk')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Data Stok Masuk</h3>
        <a href="{{ url('/inventory/stokmasuk/create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bahan Baku</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                    <th>Keterangan</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $no => $row)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $row->bahanbaku->namabahan ?? '-' }}</td>
                    <td>{{ $row->jumlah }}</td>
                    <td>{{ $row->tanggalmasuk }}</td>
                    <td>{{ $row->keterangan }}</td>
                    <td>
                        <a href="{{ url('/inventory/stokmasuk/show/'.$row->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ url('/inventory/stokmasuk/edit/'.$row->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ url('/inventory/stokmasuk/delete/'.$row->id) }}"
                           onclick="return confirm('Yakin hapus data ini?')"
                           class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data stok masuk kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection