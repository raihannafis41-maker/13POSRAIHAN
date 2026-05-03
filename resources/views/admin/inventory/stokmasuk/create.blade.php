@extends('layouts.appadmin')

@section('title', 'Tambah Stok Masuk')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Stok Masuk</h3>
    </div>

    <div class="card-body">
        <form action="{{ url('/inventory/stokmasuk/store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Bahan Baku</label>
                <select name="bahanbakuid" class="form-control" required>
                    <option value="">-- Pilih Bahan Baku --</option>
                    @foreach($bahanbaku as $row)
                        <option value="{{ $row->id }}">{{ $row->namabahan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" step="0.01" name="jumlah" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" name="tanggalmasuk" class="form-control">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>

            <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="{{ url('/inventory/stokmasuk') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection