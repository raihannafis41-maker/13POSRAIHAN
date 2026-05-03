@extends('layouts.appadmin')

@section('title', 'Metode Pembayaran')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Status</th>
            </tr>

            @foreach($data as $row)
            <tr>
                <td>{{ $row->namametode }}</td>
                <td>{{ $row->jenis }}</td>
                <td>{{ $row->status }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection