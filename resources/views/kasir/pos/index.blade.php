@extends('layouts.appkasir')

@section('title', 'POS Kasir')

@section('content')
<div class="container-fluid">

    <div class="row">

        <!-- LIST PRODUK -->
        <div class="col-md-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Daftar Produk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($produk as $p)
                        <div class="col-md-4 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <h6>{{ $p->namaproduk }}</h6>
                                    <p class="text-success fw-bold">Rp {{ number_format($p->hargajual) }}</p>

                                    <form action="{{ route('kasir.pos.tambah') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="produkid" value="{{ $p->id }}">
                                        <button class="btn btn-sm btn-primary w-100">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- KERANJANG -->
        <div class="col-md-5">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Keranjang</h3>
                </div>
                <div class="card-body">

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($cart as $item)
                            <tr>
                                <td>{{ $item['namaproduk'] }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>Rp {{ number_format($item['subtotal']) }}</td>
                                <td>
                                    <form action="{{ route('kasir.pos.hapus') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="produkid" value="{{ $item['produkid'] }}">
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada produk</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <hr>
                    <h4>Total: <span class="text-success">Rp {{ number_format($subtotal) }}</span></h4>

                    <div class="d-flex justify-content-between mt-3">
                        <form action="{{ route('kasir.pos.reset') }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">Reset</button>
                        </form>

                        <a href="{{ route('kasir.pembayaran') }}" class="btn btn-success">
                            Bayar
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection