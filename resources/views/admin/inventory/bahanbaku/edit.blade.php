@extends('layouts.appadmin')

@section('title', 'Edit Bahan Baku')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Bahan Baku</h3>
    </div>

    <div class="card-body">
        <form action="{{ url('/inventory/bahanbaku/update/'.$data->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Kode Bahan</label>
                <input type="text" name="kodebahan" class="form-control" value="{{ $data->kodebahan }}" required>
            </div>

            <div class="form-group">
                <label>Nama Bahan</label>
                <input type="text" name="namabahan" class="form-control" value="{{ $data->namabahan }}" required>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" step="0.01" name="stok" class="form-control" value="{{ $data->stok }}" required>
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $data->satuan }}">
            </div>

            <div class="form-group">
                <label>Harga Beli</label>
                <input type="number" step="0.01" name="hargabeli" class="form-control" value="{{ $data->hargabeli }}" required>
            </div>

            <button class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            <a href="{{ url('/inventory/bahanbaku') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection