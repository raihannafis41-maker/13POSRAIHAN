@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4>Edit Produk</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('master.produk.update', $data->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Kategori</label>

                    <select name="kategoriid" class="form-control">
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}"
                                {{ $data->kategoriid == $item->id ? 'selected' : '' }}>
                                {{ $item->namakategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Kode Produk</label>

                    <input type="text"
                           name="kodeproduk"
                           value="{{ $data->kodeproduk }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Nama Produk</label>

                    <input type="text"
                           name="namaproduk"
                           value="{{ $data->namaproduk }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Harga Jual</label>

                    <input type="number"
                           name="hargajual"
                           value="{{ $data->hargajual }}"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label>Satuan</label>

                    <input type="text"
                           name="satuan"
                           value="{{ $data->satuan }}"
                           class="form-control">
                </div>

                <!-- FOTO (FIELD DATABASE) -->
                <div class="mb-3">
                    <label>Foto Produk</label>
                    <input type="file" name="foto" class="form-control">

                    @if($data->foto)
                        <div class="mt-3">
                            <p class="mb-1 text-muted">Foto Saat Ini:</p>
                            <img src="{{ asset('storage/' . $data->foto) }}"
                                 style="width:150px; height:150px; object-fit:cover; border-radius:10px;"
                                 alt="Foto Produk">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label>Status</label>

                    <select name="status" class="form-control">
                        <option value="aktif" {{ $data->status == 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="nonaktif" {{ $data->status == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>
                </div>

                <button class="btn btn-primary">
                    Update
                </button>

                <a href="{{ route('master.produk.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

@endsection