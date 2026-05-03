@extends('layouts.appkasir')

@section('title', 'Sukses')

@section('content')
<div class="container-fluid">

    <div class="card card-success">
        <div class="card-body text-center">
            <h3 class="text-success">Pembayaran Berhasil!</h3>
            <p>Invoice: <b>{{ $penjualan->kodeinvoice }}</b></p>
            <p>Total: <b>Rp {{ number_format($penjualan->total) }}</b></p>

            <a href="{{ route('kasir.struk', $penjualan->id) }}" class="btn btn-primary">
                Cetak Struk
            </a>

            <a href="{{ route('kasir.pos') }}" class="btn btn-success">
                Transaksi Baru
            </a>
        </div>
    </div>

</div>
@endsection