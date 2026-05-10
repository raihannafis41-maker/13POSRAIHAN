@extends('layouts.appguest')

@section('title', 'Promo')

@section('content')
<section class="py-5" style="margin-top:90px;">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Promo Spesial</h2>
            <p class="text-white-50">
                Nikmati promo menarik setiap hari untuk menu favorit kamu.
            </p>
        </div>

        <!-- Search Promo -->
        <div class="row justify-content-center mb-4" data-aos="fade-up">
            <div class="col-md-8">
                <div class="glass-card">
                    <form action="{{ route('landing.promo') }}" method="GET">
                        <div class="input-group">
                            <input type="text"
                                   name="q"
                                   value="{{ request('q') }}"
                                   class="form-control bg-dark text-white border-0"
                                   placeholder="Cari promo... (contoh: diskon, weekend, paket)">

                            <button class="btn btn-gradient px-4" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i> Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- List Promo -->
        <div class="row g-4">

            @forelse($promo as $row)
                <div class="col-md-4" data-aos="zoom-in">
                    <div class="glass-card">

                        <h4 class="fw-bold text-warning">
                            <i class="fa-solid fa-tags"></i> {{ $row->namapromo }}
                        </h4>

                        <p class="text-white-50 mb-2">
                            Jenis Promo:
                            <b class="text-white">{{ strtoupper($row->jenis) }}</b>
                        </p>

                        <p class="text-white-50 mb-2">
                            Diskon:
                            @if($row->jenis == 'persen')
                                <b class="text-warning">{{ $row->nilaidiskon }}%</b>
                            @else
                                <b class="text-warning">Rp {{ number_format($row->nilaidiskon, 0, ',', '.') }}</b>
                            @endif
                        </p>

                        <p class="text-white-50 mb-2">
                            Minimal Belanja:
                            <b class="text-white">Rp {{ number_format($row->minimalbelanja, 0, ',', '.') }}</b>
                        </p>

                        <p class="fw-bold mb-0">Periode:</p>
                        <p class="text-white-50">
                            {{ date('d M Y', strtotime($row->tanggalmulai)) }}
                            -
                            {{ date('d M Y', strtotime($row->tanggalselesai)) }}
                        </p>

                        <a href="{{ route('landing.menu') }}" class="btn btn-gradient rounded-pill w-100">
                            Lihat Menu
                        </a>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="glass-card">
                        <h5 class="fw-bold">Belum ada promo aktif</h5>
                        <p class="text-white-50 mb-0">
                            Silakan cek kembali nanti.
                        </p>
                    </div>
                </div>
            @endforelse

        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <h5 class="fw-bold">Jangan Lewatkan Promo Terbaru!</h5>
            <p class="text-white-50">
                Promo dapat berubah sewaktu-waktu sesuai kebijakan cafe.
            </p>
        </div>

    </div>
</section>
@endsection