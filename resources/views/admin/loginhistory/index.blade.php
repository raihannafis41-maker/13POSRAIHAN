@extends('layouts.appadmin')

@section('title', 'Login History')

@section('content')
<div class="content-wrapper">

    <!-- HEADER -->
    <section class="content-header">
        <div class="container-fluid">
            <h1 class="fw-bold">Login History</h1>
            <small class="text-muted">Riwayat login user yang masuk ke sistem</small>
        </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="content">
        <div class="container-fluid">

            {{-- ALERT SUCCESS --}}
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            {{-- ALERT ERROR --}}
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-times-circle"></i> {{ session('error') }}
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">
                        <i class="fas fa-history"></i> Data Login History
                    </h3>
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-striped table-hover text-nowrap">
                        <thead class="bg-light">
                            <tr class="text-center">
                                <th width="50">No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>IP Address</th>
                                <th>User Agent</th>
                                <th>Login At</th>
                                <th>Logout At</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name ?? '-' }}</td>
                                    <td>{{ $item->username ?? '-' }}</td>
                                    <td>{{ $item->ipaddress ?? '-' }}</td>

                                    <td style="max-width: 300px; white-space: normal;">
                                        {{ $item->useragent ?? '-' }}
                                    </td>

                                    <td class="text-center">
                                        {{ $item->loginat ? date('d-m-Y H:i:s', strtotime($item->loginat)) : '-' }}
                                    </td>

                                    <td class="text-center">
                                        {{ $item->logoutat ? date('d-m-Y H:i:s', strtotime($item->logoutat)) : '-' }}
                                    </td>

                                    <td class="text-center">
                                        @if($item->status == 'success')
                                            <span class="badge badge-success px-3 py-2">
                                                SUCCESS
                                            </span>
                                        @else
                                            <span class="badge badge-danger px-3 py-2">
                                                FAILED
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">
                                        <i class="fas fa-info-circle"></i> Data login history belum tersedia.
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