@extends('layouts.appadmin')

@section('title', 'Data Pembelian')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Pembelian</h3>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Supplier ID</th>
                    <th>User ID</th>
                    <th>Total</th>
                    <th>Tanggal Pembelian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $no => $row)
                <tr>
                    <td>{{ $no+1 }}</td>
                    <td>{{ $row->supplierid }}</td>
                    <td>{{ $row->userid }}</td>
                    <td>{{ $row->total }}</td>
                    <td>{{ $row->tanggalpembelian }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection