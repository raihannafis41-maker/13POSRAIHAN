@extends('layouts.appkasir')

@section('title', 'Tutup Shift')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header bg-danger text-white">
            <h3 class="card-title">
                <i class="fas fa-door-closed"></i> Tutup Shift Kasir
            </h3>
        </div>

        <div class="card-body">

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <div class="alert alert-warning">
                Pastikan semua transaksi sudah selesai sebelum menutup shift.
            </div>

            {{-- ✅ INFORMASI REALTIME SHIFT --}}
            <div class="alert alert-info">
                <b>Shift Mulai:</b> {{ $shiftAktif->shiftmulai }} <br>
                <b>Total Transaksi:</b> {{ $totalTransaksi }} <br>
                <b>Total Pendapatan:</b> Rp {{ number_format($totalPendapatan, 0, ',', '.') }} <br>
                <b>Saldo Awal:</b> Rp {{ number_format($shiftAktif->saldoawal, 0, ',', '.') }} <br>
                <hr>
                <b>Saldo Akhir Otomatis:</b>
                <span class="text-success fw-bold">
                    Rp {{ number_format($saldoAkhirOtomatis, 0, ',', '.') }}
                </span>
            </div>

            {{-- ✅ FIX ROUTE ACTION FORM --}}
            <form action="{{ route('kasir.shift.tutup.proses') }}" method="POST">
                @csrf

                <div class="mt-3">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times"></i> Tutup Shift Sekarang
                    </button>

                    <a href="{{ route('kasir.shift.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection