@extends('layouts.appmanager')

@section('title', 'Monitoring Pembelian')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Monitoring Pembelian</h1>
            <small class="text-muted">Pantau data pembelian bahan baku</small>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h3 class="card-title">
                        <i class="fas fa-shopping-cart"></i> Data Pembelian
                    </h3>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th width="50">No</th>
                                <th>Kode Pembelian</th>
                                <th>Supplier</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kodepembelian ?? '-' }}</td>
                                    <td>{{ $row->supplier->namasupplier ?? '-' }}</td>
                                    <td>{{ $row->user->name ?? '-' }}</td>
                                    <td>Rp {{ number_format($row->total,0,',','.') }}</td>
                                    <td>{{ $row->tanggalpembelian }}</td>
                                    <td>
                                        <a href="{{ url('inventory/pembelian/show/'.$row->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">
                                        Tidak ada data pembelian
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