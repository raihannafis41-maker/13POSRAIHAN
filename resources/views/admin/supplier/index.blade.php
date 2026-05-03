@extends('layouts.appadmin')

@section('title', 'Data Supplier')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Supplier</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">List Supplier</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-info btn-sm">
                            <i class="fas fa-plus"></i> Tambah Supplier
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th width="50">#</th>
                                <th>Nama Supplier</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->namasupplier }}</td>
                                    <td>{{ $row->nohp ?? '-' }}</td>
                                    <td>{{ $row->alamat ?? '-' }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Data supplier masih kosong.
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