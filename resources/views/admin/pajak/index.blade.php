@extends('layouts.appadmin')

@section('title', 'Data Pajak')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Pajak</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-dark card-outline">
                <div class="card-header">
                    <h3 class="card-title">List Pajak</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-dark btn-sm">
                            <i class="fas fa-plus"></i> Tambah Pajak
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th width="50">#</th>
                                <th>Nama Pajak</th>
                                <th>Persen</th>
                                <th>Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->namapajak }}</td>
                                    <td>{{ $row->persen }}%</td>
                                    <td>
                                        @if($row->status == 'aktif')
                                            <span class="badge badge-success">AKTIF</span>
                                        @else
                                            <span class="badge badge-danger">NONAKTIF</span>
                                        @endif
                                    </td>
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
                                        Data pajak masih kosong.
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