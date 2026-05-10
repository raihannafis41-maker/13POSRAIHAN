@extends('layouts.appkasir')

@section('title', 'Detail Struk')

@section('content')

<style>
    /* KERTAS STRUK (PREVIEW) */
    .struk-box {
        width: 80mm;
        max-width: 80mm;
        margin: auto;
        border: 1px dashed #000;
        padding: 6mm;
        background: #fff;
        /* biar bersih seperti struk asli */
        font-family: 'Courier New', monospace;
        font-size: 13px;
        /* dibesarkan sedikit */
        color: #000;
        /* HITAM PEKAT */
        box-sizing: border-box;
        line-height: 1.4;
    }

    /* semua teks lebih tegas */
    .struk-box * {
        color: #000 !important;
    }

    /* header dibuat lebih bold */
    .struk-header h5 {
        margin: 0;
        font-weight: 700;
        font-size: 16px;
        letter-spacing: 1px;
    }

    .struk-header small {
        display: block;
        font-size: 12px;
        font-weight: 500;
    }

    /* garis lebih jelas */
    .struk-line {
        border-top: 1px dashed #000;
        margin: 10px 0;
    }

    /* tabel lebih rapi */
    .struk-table td {
        padding: 3px 0;
        vertical-align: top;
        word-break: break-word;
        font-size: 13px;
    }

    /* total lebih tegas */
    .struk-table b {
        font-weight: 700;
    }

    .text-right {
        text-align: right;
        white-space: nowrap;
    }

    .text-center {
        text-align: center;
    }

    .no-print {
        display: block;
    }

    /* MODE PRINT */
    @media print {

        @page {
            size: 80mm auto;
            /* ubah jadi 58mm auto jika printer 58mm */
            margin: 3mm;
        }

        body {
            background: white !important;
        }

        body * {
            visibility: hidden;
        }

        #areaPrint,
        #areaPrint * {
            visibility: visible;
        }

        #areaPrint {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }

        .struk-box {
            border: none !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 80mm !important;
            max-width: 80mm !important;
        }

        .no-print {
            display: none !important;
        }
    }
</style>

<div class="container-fluid px-4 mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3 no-print">
        <div>
            <h4 class="mb-0">Detail Struk</h4>
            <small class="text-muted">Preview sebelum dicetak</small>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('kasir.cetakstruk.index') }}" class="btn btn-secondary btn-sm">
                ⬅ Kembali
            </a>

            <a href="{{ route('kasir.cetakstruk.print', $penjualan->id) }}" class="btn btn-primary btn-sm">
                🖨 Print Struk
            </a>
        </div>
    </div>

    <div id="areaPrint">
        <div class="struk-box">

            <div class="struk-header">
                <h5>CAFEPOS</h5>
                <small>Jl. Contoh Alamat Cafe</small>
                <small>Telp: 08xx-xxxx-xxxx</small>
            </div>

            <div class="struk-line"></div>

            <table class="struk-table">
                <tr>
                    <td>ID Transaksi</td>
                    <td class="text-right">#{{ $penjualan->id }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td class="text-right">
                        {{ $penjualan->created_at ? $penjualan->created_at->format('d-m-Y H:i') : '-' }}
                    </td>
                </tr>
            </table>

            <div class="struk-line"></div>

            {{-- DETAIL ITEM --}}
            <table class="struk-table">
                @foreach($detail as $d)
                <tr>
                    <td colspan="2">
                        <b>{{ $d->produk->namaproduk ?? 'Produk' }}</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        {{ $d->qty ?? 0 }} x Rp {{ number_format($d->harga ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="text-right">
                        Rp {{ number_format($d->subtotal ?? (($d->qty ?? 0) * ($d->harga ?? 0)), 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </table>

            <div class="struk-line"></div>

            {{-- TOTAL --}}
            <table class="struk-table">
                <tr>
                    <td><b>TOTAL</b></td>
                    <td class="text-right">
                        <b>Rp {{ number_format($penjualan->total ?? 0, 0, ',', '.') }}</b>
                    </td>
                </tr>
                <tr>
                    <td>Bayar</td>
                    <td class="text-right">
                        Rp {{ number_format($pembayaran->bayar ?? 0, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td>Kembalian</td>
                    <td class="text-right">
                        Rp {{ number_format($pembayaran->kembalian ?? 0, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td>Metode</td>
                    <td class="text-right">
                        {{ $pembayaran->metode->namametode ?? '-' }}
                    </td>
                </tr>
            </table>

            <div class="struk-line"></div>

            <div class="text-center">
                <small>Terima kasih telah berbelanja</small><br>
                <small>Semoga hari Anda menyenangkan 😊</small>
            </div>

        </div>
    </div>

</div>

@endsection