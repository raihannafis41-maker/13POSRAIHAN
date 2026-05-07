@extends('layouts.appmanager')

@section('title', 'Monitoring Stok')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Monitoring Stok</h1>
            <small class="text-muted">Pantau stok bahan baku yang tersedia</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-times-circle"></i> {{ session('error') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">
                        <i class="fas fa-boxes"></i> Data Stok
                    </h3>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Bahan</th>
                                <th>Stok Tersedia</th>
                                <th>Stok Minimal</th>
                                <th>Status</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->bahanbaku->namabahan ?? '-' }}</td>
                                    <td>{{ $row->stoktersedia }}</td>
                                    <td>{{ $row->stokminimal }}</td>
                                    <td>
                                        @if($row->status == 'aman')
                                            <span class="badge badge-success">AMAN</span>
                                        @elseif($row->status == 'menipis')
                                            <span class="badge badge-warning">MENIPIS</span>
                                        @else
                                            <span class="badge badge-danger">HABIS</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('inventory/stok/show/'.$row->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        Tidak ada data stok
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
            </div>

        </div>
    </section>

</div>
@endsection