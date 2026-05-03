@extends('layouts.appadmin')

@section('title', 'Data Promo')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Promo</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-danger card-outline">
                <div class="card-header">
                    <h3 class="card-title">List Promo</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-danger btn-sm">
                            <i class="fas fa-plus"></i> Tambah Promo
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-light">
                            <tr>
                                <th width="50">#</th>
                                <th>Nama Promo</th>
                                <th>Jenis</th>
                                <th>Nilai Diskon</th>
                                <th>Minimal Belanja</th>
                                <th>Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->namapromo }}</td>
                                    <td>{{ strtoupper($row->jenis) }}</td>
                                    <td>{{ $row->nilaidiskon }}</td>
                                    <td>Rp {{ number_format($row->minimalbelanja ?? 0, 0, ',', '.') }}</td>
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
                                    <td colspan="7" class="text-center text-muted">
                                        Data promo masih kosong.
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