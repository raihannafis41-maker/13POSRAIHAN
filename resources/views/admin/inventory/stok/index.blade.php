@extends('layouts.appadmin')

@section('title', 'Data Stok')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Data Stok</h3>
        <a href="{{ url('/inventory/stok/create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bahan Baku</th>
                    <th>Stok Tersedia</th>
                    <th>Stok Minimal</th>
                    <th>Status</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $no => $row)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $row->bahanbaku->namabahan ?? '-' }}</td>
                    <td>{{ $row->stoktersedia }}</td>
                    <td>{{ $row->stokminimal }}</td>
                    <td>
                        <span class="badge badge-{{ $row->status == 'aman' ? 'success' : 'danger' }}">
                            {{ $row->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ url('/inventory/stok/show/'.$row->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ url('/inventory/stok/edit/'.$row->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ url('/inventory/stok/delete/'.$row->id) }}"
                           onclick="return confirm('Yakin hapus data ini?')"
                           class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data stok belum ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection