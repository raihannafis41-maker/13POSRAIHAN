@extends('layouts.appadmin')

@section('title', 'Data Meja')

@section('content')

<div class="row">
    @foreach($data as $row)
    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h4>{{ $row->nomormeja }}</h4>
                <p>Kapasitas: {{ $row->kapasitas }}</p>
                <span class="badge badge-info">{{ $row->status }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection