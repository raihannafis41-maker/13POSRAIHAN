@extends('layouts.appkasir')

@section('title', 'Dashboard Kasir')

@section('content')
<div class="content-wrapper">

    <!-- Header -->
    <section class="content-header pb-2">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div>
                    <h3 class="mb-0 fw-bold">Dashboard Kasir</h3>
                    <small class="text-muted">
                        Selamat datang, <b>{{ Auth::user()->name ?? 'Kasir' }}</b> 👋
                    </small>
                </div>

                <div class="mt-2 mt-sm-0">
                    <span class="badge badge-success px-3 py-2">
                        Role: {{ Auth::user()->role ?? '-' }}
                    </span>
                    <span class="badge badge-info px-3 py-2">
                        {{ date('d M Y') }}
                    </span>
                </div>
            </div>
        </div>
    </section>


    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <!-- BOX MENU -->
            <div class="row">

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="small-box bg-primary shadow-sm">
                        <div class="inner">
                            <h3 class="mb-0">POS</h3>
                            <p class="mb-0">Mulai Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cash-register"></i>
                        </div>
                        <a href="{{ route('kasir.pos') }}" class="small-box-footer">
                            Buka POS <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="small-box bg-warning shadow-sm">
                        <div class="inner text-dark">
                            <h3 class="mb-0">Bayar</h3>
                            <p class="mb-0">Pembayaran</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <a href="{{ route('kasir.pembayaran') }}" class="small-box-footer text-dark">
                            Pembayaran <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="small-box bg-success shadow-sm">
                        <div class="inner">
                            <h3 class="mb-0">Shift</h3>
                            <p class="mb-0">Kelola Shift</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <a href="{{ route('kasir.shift.index') }}" class="small-box-footer">
                            Kelola Shift <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>


            <!-- CARD INFO + PROFILE -->
            <div class="row">

                <div class="col-md-8">
                    <div class="card card-outline card-primary shadow-sm h-100">
                        <div class="card-header">
                            <h3 class="card-title fw-bold">
                                <i class="fas fa-info-circle"></i> Informasi Sistem
                            </h3>
                        </div>

                        <div class="card-body">
                            <p class="mb-3 text-muted">
                                CAFEPOS membantu kamu mengelola transaksi dengan cepat, aman, dan profesional.
                            </p>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <i class="fas fa-check text-success"></i>
                                    POS cepat & mudah digunakan
                                </div>

                                <div class="col-md-6 mb-2">
                                    <i class="fas fa-check text-success"></i>
                                    Pembayaran cash / noncash
                                </div>

                                <div class="col-md-6 mb-2">
                                    <i class="fas fa-check text-success"></i>
                                    Cetak struk otomatis
                                </div>

                                <div class="col-md-6 mb-2">
                                    <i class="fas fa-check text-success"></i>
                                    Shift kasir terkontrol
                                </div>
                            </div>

                            <hr>

                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('kasir.pos') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-cash-register"></i> Mulai POS
                                </a>

                                <a href="{{ route('kasir.pembayaran') }}" class="btn btn-warning btn-sm text-white">
                                    <i class="fas fa-money-bill-wave"></i> Pembayaran
                                </a>

                                <a href="{{ route('kasir.shift.index') }}" class="btn btn-success btn-sm">
                                    <i class="fas fa-user-clock"></i> Shift
                                </a>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card card-outline card-success shadow-sm h-100">
                        <div class="card-header">
                            <h3 class="card-title fw-bold">
                                <i class="fas fa-user"></i> Profil Kasir
                            </h3>
                        </div>

                        <div class="card-body text-center">

                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}"
                                 class="img-circle elevation-2 mb-3"
                                 style="width: 85px; height: 85px;"
                                 alt="User Image">

                            <h5 class="fw-bold mb-1">{{ Auth::user()->name ?? 'Kasir' }}</h5>
                            <small class="text-muted d-block mb-2">
                                {{ Auth::user()->username ?? '-' }}
                            </small>

                            <span class="badge badge-success px-3 py-2">
                                {{ Auth::user()->role ?? '-' }}
                            </span>

                            <hr>

                            <div class="text-muted">
                                <small>Login Hari Ini</small>
                                <h6 class="fw-bold mt-1 mb-0">{{ date('H:i') }} WIB</h6>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


            <!-- QUICK ACTION -->
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title fw-bold">
                                <i class="fas fa-bolt"></i> Quick Action
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="row text-center">

                                <div class="col-md-4 col-12 mb-2">
                                    <a href="{{ route('kasir.pos') }}" class="btn btn-primary btn-block btn-lg">
                                        <i class="fas fa-cash-register"></i> POS
                                    </a>
                                </div>

                                <div class="col-md-4 col-12 mb-2">
                                    <a href="{{ route('kasir.pembayaran') }}" class="btn btn-warning btn-block btn-lg text-white">
                                        <i class="fas fa-money-bill-wave"></i> Pembayaran
                                    </a>
                                </div>

                                <div class="col-md-4 col-12 mb-2">
                                    <a href="{{ route('kasir.shift.index') }}" class="btn btn-success btn-block btn-lg">
                                        <i class="fas fa-user-clock"></i> Shift
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection