@extends('layouts.appadmin')

@section('title', 'Edit Stok')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Stok</h3>
    </div>

    <div class="card-body">
        <form action="{{ url('/inventory/stok/update/'.$data->id) }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Bahan Baku</label>
                <select name="bahanbakuid" class="form-control" required>
                    @foreach($bahanbaku as $row)
                        <option value="{{ $row->id }}" {{ $data->bahanbakuid == $row->id ? 'selected' : '' }}>
                            {{ $row->namabahan }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Stok Tersedia</label>
                <input type="number" step="0.01" name="stoktersedia" class="form-control" value="{{ $data->stoktersedia }}" required>
            </div>

            <div class="form-group">
                <label>Stok Minimal</label>
                <input type="number" step="0.01" name="stokminimal" class="form-control" value="{{ $data->stokminimal }}" required>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="aman" {{ $data->status == 'aman' ? 'selected' : '' }}>Aman</option>
                    <option value="habis" {{ $data->status == 'habis' ? 'selected' : '' }}>Habis</option>
                </select>
            </div>

            <button class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            <a href="{{ url('/inventory/stok') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection