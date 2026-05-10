@extends('layouts.appguest')

@section('title', 'Kontak')

@section('content')
<section class="py-5" style="margin-top:90px;">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="section-title">Kontak Kami</h2>
            <p class="text-white-50">
                Hubungi kami untuk pertanyaan, kerja sama, atau informasi lebih lanjut.
            </p>
        </div>

        <div class="row g-4">
            <!-- Form Kontak -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="glass-card">
                    <h4 class="fw-bold text-warning mb-4">
                        <i class="fa-solid fa-envelope"></i> Kirim Pesan
                    </h4>

                    <form action="{{ route('landing.kontak.store') }}" method="POST">
                        @csrf

                        {{-- ALERT --}}
                        @if(session('success'))
                        <div class="alert alert-success">
                            <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger">
                            <i class="fa-solid fa-circle-xmark"></i> Data belum valid!
                        </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama"
                                value="{{ old('nama') }}"
                                class="form-control bg-dark text-white border-0 @error('nama') is-invalid @enderror"
                                placeholder="Masukkan nama anda" required>
                            @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                value="{{ old('email') }}"
                                class="form-control bg-dark text-white border-0 @error('email') is-invalid @enderror"
                                placeholder="Masukkan email anda" required>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subjek</label>
                            <input type="text" name="subjek"
                                value="{{ old('subjek') }}"
                                class="form-control bg-dark text-white border-0 @error('subjek') is-invalid @enderror"
                                placeholder="Masukkan subjek" required>
                            @error('subjek')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pesan</label>
                            <textarea name="pesan" rows="5"
                                class="form-control bg-dark text-white border-0 @error('pesan') is-invalid @enderror"
                                placeholder="Tulis pesan anda..." required>{{ old('pesan') }}</textarea>
                            @error('pesan')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-gradient px-4 py-2 rounded-pill">
                            <i class="fa-solid fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Info Kontak -->
            <div class="col-lg-5" data-aos="fade-left">
                <div class="glass-card">
                    <h4 class="fw-bold text-warning mb-4">
                        <i class="fa-solid fa-location-dot"></i> Informasi Kontak
                    </h4>

                    <p class="text-white-50 mb-2">
                        <i class="fa-solid fa-map"></i> Indonesia
                    </p>

                    <p class="text-white-50 mb-2">
                        <i class="fa-solid fa-phone"></i> +62 83878969362
                    </p>

                    <p class="text-white-50 mb-2">
                        <i class="fa-solid fa-envelope"></i> cafepos@gmail.com
                    </p>

                    <hr class="border-secondary">

                    <h5 class="fw-bold">Jam Operasional</h5>
                    <p class="text-white-50 mb-0">Senin - Minggu</p>
                    <p class="text-white-50">08:00 - 23:00</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="https://www.instagram.com/hanzdikz?igsh=MXJhMG5nOTZuNjB2YQ==" class="text-white fs-4"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://www.tiktok.com/@hanzdikz?_r=1&_t=ZS-968M1sMcUKL" class="text-white fs-4"><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>

                <div class="glass-card mt-4 text-center" data-aos="zoom-in">
                    <h5 class="fw-bold">Butuh Demo Aplikasi?</h5>
                    <p class="text-white-50">
                        Silakan login sebagai kasir untuk melihat tampilan dashboard.
                    </p>
                    <a href="{{ url('/login') }}" class="btn btn-gradient rounded-pill w-100">
                        <i class="fa-solid fa-right-to-bracket"></i> Login Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection