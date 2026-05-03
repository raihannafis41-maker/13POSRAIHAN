@extends('layouts.appkasir')

@section('title', 'Struk')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-body">

            <h3 class="text-center">CAFEPOS</h3>
            <p class="text-center">Struk Pembayaran</p>
            <hr>

            <p>Invoice: {{ $penjualan->kodeinvoice }}</p>
            <p>Tanggal: {{ $penjualan->tanggalpenjualan }}</p>
            <p>Kasir: {{ $penjualan->userid }}</p>

            <hr>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detail as $d)
                    <tr>
                        <td>{{ $d->produkid }}</td>
                        <td>{{ $d->qty }}</td>
                        <td>Rp {{ number_format($d->subtotal) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <h4>Total: Rp {{ number_format($penjualan->total) }}</h4>
            <p>Bayar: Rp {{ number_format($pembayaran->jumlahbayar) }}</p>
            <p>Kembalian: Rp {{ number_format($pembayaran->kembalian) }}</p>

            <hr>
            <p class="text-center">Terima kasih sudah berbelanja!</p>

        </div>
    </div>

</div>
@endsection