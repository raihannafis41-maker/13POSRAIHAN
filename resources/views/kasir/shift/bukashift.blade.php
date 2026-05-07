@extends('layouts.appkasir')

@section('title', 'Buka Shift')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header bg-success text-white">
            <h3 class="card-title">
                <i class="fas fa-door-open"></i> Buka Shift Kasir
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

            @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- FIX ROUTE --}}
            <form action="{{ route('kasir.shift.buka.proses') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Saldo Awal</label>
                    <input type="number" name="saldoawal" class="form-control"
                        placeholder="Masukkan saldo awal..." required min="0">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-check"></i> Buka Shift
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