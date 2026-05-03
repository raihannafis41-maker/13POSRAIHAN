@extends('layouts.appkasir')

@section('title', 'Pembayaran')

@section('content')
<div class="container-fluid">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Pembayaran</h3>
        </div>

        <div class="card-body">

            <h4>Total: <span class="text-success">Rp {{ number_format($subtotal) }}</span></h4>
            <hr>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('kasir.pembayaran.proses') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="metodepembayaranid" class="form-control" required>
                        @foreach($metode as $m)
                            <option value="{{ $m->id }}">{{ $m->namametode }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label>Jumlah Bayar</label>
                    <input type="number" name="jumlahbayar" class="form-control" required>
                </div>

                <button class="btn btn-success mt-3 w-100">
                    Proses Pembayaran
                </button>
            </form>

        </div>
    </div>

</div>
@endsection