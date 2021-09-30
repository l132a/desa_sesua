<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Home') &mdash; {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('stylesheet')
</head>

<style>
    @media print {
        .pagebreak {
            page-break-before: always;
        }

        * {
            -webkit-print-color-adjust: exact !important;
            color-adjust: exact !important;
        }

        .bg {
            background-image: linear-gradient(rgba(255, 255, 255, .9), rgba(255, 255, 255, .9)),
                url("{{ asset('images/logo.png') }}") !important;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 70%;
        }

        body {
            background-color: white;
        }

        .table-bordered,
        .table-bordered td,
        .table-bordered th {
            border: 1px solid #dee2e6;
            background-color: transparent !important;
        }

        .table-borderless,
        .table-borderless td,
        .table-borderless th {
            background-color: transparent !important;
        }

    }

    .logo {
        background-image: url("{{ asset('images/logo.png') }}");
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        background-position-x: 10%;
        z-index: 999999;
    }

    .title_span {
        font-weight: bold;
        text-decoration: underline;
        color: black;
    }

</style>

{{ App::setLocale('id') }}

<body class="hold-transition text-sm text-black"
    style="font-family: 'Times New Roman', Times, serif; color: #000; font-size: 12pt">
    {{-- PAGE 1 --}}
    <div class="row ml-3 mr-3 bg">
        <div class="col-12">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="text-center align-middle logo" width="100%">
                            {!! $header_ba !!}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height: 20px">
                            <hr
                                style="height:2px;border-width:0;color:black;background-color:black;margin-bottom:-13px; ">
                            <hr style="height:4px;border-width:0;color:black;background-color:black">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <span class="title_span">BERITA ACARA PENELITIAN / PENINJAUAN</span> <br>
                            <span class="title_span">TANAH/PERWATASAN</span><br>
                            <b style="font-size: 12pt;">Nomor :
                                {{ $param->no_berita_acara ?? '' }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p style="margin-top:20px;margin-bottom:20px;" class="text-justify">
                                Pada Hari ini
                                {{ \App\Http\Controllers\HelperController::hari($param->tanggal_berita_acara) }}
                                Tanggal
                                {{ ucwords(\Terbilang::date(date('Y-m-d', strtotime($param->tanggal_berita_acara)))) ?? '' }}
                                kami bersama-sama telah mengadakan Penelitian / Peninjauan Lokasi tanah Perwatas yang di
                                mohon / dikuasai oleh <b>{{ $param->sapaan ?? '' }}
                                    {{ $param->nama ?? '' }}</b>
                                yang
                                terletak di :
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-2">
                                    Jalan/RT
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-9">
                                    {{ $param->alamat ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    Desa
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-9">
                                    {{ ucfirst(strtolower($param->desa)) ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    Kecamatan
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-9">
                                    {{ ucfirst(strtolower($param->kecamatan)) ?? '' }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="text-justify mt-3">
                                Dari hasil Penelitian / Peninjauan di Lapangan oleh Aparat Desa/ Kecamatan dan para
                                pihak yang terkait, diketahui bahwa Tanah / Perwatasan tersebut tidak sengketa /
                                bermasalah dengan pihak manapun. Kami Aparat Desa / Kecamatan dan Para Pihak yang
                                meneliti / meninjau di lapangan:
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered" style="margin-top:-20px;">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Nama</th>
                    <th>Status/Jabatan</th>
                    <th>Tanda Tangan</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>{{ $param->aparat_desa ?? '' }}</td>
                    <td>{{ $param->jabatan_desa ?? '' }}</td>
                    <td class="text-left">1...................................</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>{{ $param->aparat_rt ?? '' }}</td>
                    <td>{{ $param->jabatan_rt ?? '' }} Desa
                        {{ ucfirst(strtolower($param->desa)) ?? '' }}</td>
                    <td class="text-right">2...................................</td>
                </tr>
            </table>
            <table class="table table-borderless">
                <tr>
                    <td colspan="2">
                        <div class="row">
                            <div class="col-2 mt-2">
                                Asal usul tanah
                            </div>
                            <div class="col-1 mt-2">
                                :
                            </div>
                            <div class="col-9 mt-2">
                                {{ $param->asal_usul ?? '' }}
                            </div>
                        </div>
                        <div style="font-size: 12pt;" class="row">
                            <div class="col-2 mt-3">
                                <b>Ukuran Tanah</b>
                            </div>
                            <div class="col-1 mt-3">
                                <b>:</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Panjang
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-9">
                                ± {{ $param->panjang ?? '' }} m
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Lebar
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-9">
                                ± {{ $param->lebar ?? '' }} m
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Luas
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-9">
                                ± {{ $param->luas ?? '' }} m²
                            </div>
                        </div>
                        <div style="font-size: 12pt;" class="row">
                            <div class="col-3 mt-2">
                                <b><i>Pengukuran Menggunakan</i></b>
                            </div>
                            <div class="col-1 mt-2">
                                <b>:</b>
                            </div>
                            <div class="col-8 mt-2">
                                <b><i>Menggunakan Meteran & GPS</i></b>
                            </div>
                        </div>
                        <div style="font-size: 12pt;" class="row">
                            <div class="col-2 mt-3">
                                <b>Batas Tanah</b>
                            </div>
                            <div class="col-1 mt-3">
                                <b>:</b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Utara
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-9">
                                {{ $param->batas_utara ?? '' }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Timur
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-9">
                                {{ $param->batas_timur ?? '' }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Selatan
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-9">
                                {{ $param->batas_selatan ?? '' }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                Barat
                            </div>
                            <div class="col-1">
                                :
                            </div>
                            <div class="col-9">
                                {{ $param->batas_barat ?? '' }}
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    {{-- PAGE 2 --}}
    <div class="pagebreak"> </div>
    <div class="row mr-3 ml-3 bg">
        <div class="col-12">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="text-center align-middle logo" style="font-size: 12pt; ">
                            {!! $header_sk !!}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height: 20px">
                            <hr
                                style="height:2px;border-width:0;color:black;background-color:black;margin-bottom:-13px; ">
                            <hr style="height:4px;border-width:0;color:black;background-color:black">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 12pt; margin-top:-10px;" colspan="2" class="text-center align-middle">
                            <b><u>SURAT KETERANGAN PENGUASAAN TANAH</u></b> <br>
                            <b><u>BANGUNAN/TANAMAN DIATAS TANAH NEGARA</u></b> <br>
                            <b style="font-size: 12pt;">Nomor :
                                {{ $param->no_surat_keterangan ?? '' }}</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 18px;" colspan="2">
                            <p style="margin-top:20px;" class="text-justify">
                                Pada hari ini
                                {{ \App\Http\Controllers\HelperController::hari($param->tanggal_surat_keterangan) }}
                                Tanggal
                                {{ ucwords(\Terbilang::date(date('Y-m-d', strtotime($param->tanggal_surat_keterangan)))) ?? '' }},
                                telah
                                menghadap dihadapan saya Kepala Desa Sesua Kecamatan Malinau Barat dengan dihadiri
                                saksi-saksi yang saya kenal atau dikenalkan kepada saya dan akan disebut dibagian akhir
                                surat keterangan ini, bahwa:
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-1">
                                    Nama
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-10">
                                    <b>{{ $param->nama ?? '' }}</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    Umur
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-10">
                                    {{ $param->age ?? '' }} Tahun
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    Pekerjaan
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-10">
                                    {{ $param->pekerjaan ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    Alamat
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-10">
                                    {{ $param->alamat_penduduk ?? '' }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="text-justify mt-2">
                                Menerangkan dan menyatakan dengan sebenarnya telah menguasai sebidang tanah Negara
                                tersebut sejak tahun {{ $param->tahun_penguasaan ?? '' }} yang dibuktikan dengan :
                                <br>
                                @foreach ($param->buktis as $item)
                                    <b>- {{ $item->bukti ?? ' ' }}</b><br>
                                @endforeach
                                <b>- Berita Acara Penelitian/Peninjauan Tanah Nomor :
                                    {{ $param->no_berita_acara ?? '' }}</b>
                            <p style="margin-top: -10px">
                                Berdasarkan penelitian lapangan yang dilakukan oleh petugas Kantor Desa Sesua dan
                                hasilnya dituangkan dalam gambar kasar/sket tanah terlampir. Keadaan, letak dan
                                batas-batas tanah dimaksud dijelaskan sebagai berikut :
                            </p>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="row">
                                <div class="col-1">
                                    A
                                </div>
                                <div class="col-2">
                                    Keadaan Tanah
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->keadaan_tanah ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    B
                                </div>
                                <div class="col-2">
                                    Luas
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    ± {{ $param->luas ?? '' }} m2
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    C
                                </div>
                                <div class="col-2">
                                    Letak Tanah
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Jalan/RT
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->alamat ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Desa
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ ucwords(strtolower($param->desa)) ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Kecamatan
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ ucwords(strtolower($param->kecamatan)) ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Kabupaten
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ ucwords(strtolower($param->kota)) ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    D
                                </div>
                                <div class="col-2">
                                    Batas-batas Tanah
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Utara
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->batas_utara ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Timur
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->batas_timur ?? '' }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Selatan
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->batas_selatan ?? '' }}
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Barat
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->batas_barat ?? '' }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            {!! $syarat !!}
                            <b><u>Saksi-Saksi :</u></b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @foreach ($param->saksis as $key => $item)
                                <div class="row">
                                    <div class="col-1">
                                        {{ $key + 1 }}
                                    </div>
                                    <div class="col-4">
                                        {{ $item->saksi }}
                                    </div>
                                    <div class="col-1 text-center">
                                        :
                                    </div>

                                    {{-- @if ($key % 2 !== 0)
                                        <div class="col-4 d-flex justify-content-end">
                                            ............................
                                        </div>
                                    @else --}}
                                    <div class="col-2">
                                        ............................
                                    </div>
                                    {{-- @endif --}}
                                </div>
                            @endforeach
                            <div class="row">
                                <div class="col-1">
                                    {{ count($param->saksis) + 1 }}.
                                </div>
                                <div class="col-4">
                                    {{ $param->jabatan_rt ?? '' }}
                                    ({{ $param->aparat_rt ?? '' }})
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    ............................
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    {{ count($param->saksis) + 2 }}.
                                </div>
                                <div class="col-4">
                                    Aparat Desa ( {{ $param->aparat_desa ?? '' }} )
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    ............................
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px; " class="row mt-2">
                                <div class="col-6 text-center align-middle">
                                    Pemilik <br><br><br><br>
                                    <b><u>{{ strtoupper($param->nama ?? '') }}</u></b>
                                </div>
                                <div class="col-6 text-center align-middle">
                                    {{ $param->jabatan_kepala_desa ?? '' }} Sesua <br><br><br><br>
                                    <b><u>{{ strtoupper($param->kepala_desa ?? '') }}</u></b>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{-- PAGE 3 --}}
    <div class="pagebreak"> </div>
    <div class="row mr-3 ml-3 mt-5 bg">
        <div class="col-12">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="text-center align-middle" style="font-size: 24px;">
                            <b>
                                <u>SURAT PERNYATAAN TIDAK SENGKETA</u>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row mt-3">
                                <div class="col-1">
                                    1.
                                </div>
                                <div class="col-2">
                                    Nama
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->nama ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    2.
                                </div>
                                <div class="col-2">
                                    Tempat/Tgl Lahir
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    {{ $param->tempat_lahir ?? '' }},
                                    {{ date('d-m-Y', strtotime($param->tanggal_lahir)) }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    3.
                                </div>
                                <div class="col-2">
                                    Warganegara
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ strtoupper($param->warga_negara) ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    4.
                                </div>
                                <div class="col-2">
                                    Pekerjaan
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->pekerjaan ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    5.
                                </div>
                                <div class="col-2">
                                    Alamat
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->alamat_penduduk ?? '' }} Kec.
                                    {{ ucwords(strtolower($param->kecamatan_penduduk)) ?? '' }}
                                    {{ ucwords(strtolower($param->kota_penduduk)) ?? '' }}
                                    Prov.
                                    {{ ucwords(strtolower($param->provinsi_penduduk)) ?? '' }}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 18px;" colspan="2">
                            <p style="margin-bottom:0px;" class="text-justify">
                                Dalam hal ini bertindak untuk dan atas nama diri sendiri dengan ini menerangkan yang
                                sebenarnya bahwa saya memang benar mempunyai sebidang tanah yang letak, ukuran dan batas
                                – batasnya sebagai berikut :
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Panjang
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    ± {{ $param->panjang ?? '' }} m
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Lebar
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    ± {{ $param->lebar ?? '' }} m
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Luas
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    ± {{ $param->luas ?? '' }} m²
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row mt-2">
                                <div class="col-12">
                                    <b>Batas-batas Tanah</b>

                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Utara
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->batas_utara ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Timur
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->batas_timur ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Selatan
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->batas_selatan ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Barat
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->batas_barat ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row mt-2">
                                <div class="col-12">
                                    <b>Letak Tanah</b>
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Desa
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ ucwords(strtolower($param->desa)) ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Jalan/RT
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ $param->alamat ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Kecamatan
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ ucwords(strtolower($param->kecamatan)) ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-2">
                                    Kabupaten
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    {{ ucwords(strtolower($param->kota)) ?? '' }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row mt-2">
                                <div class="col-3">
                                    <b>Bukti Kepemilikan</b>
                                </div>
                                <div class="col-1 text-center">
                                    <b>:</b>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @foreach ($param->buktis as $key => $item)
                                <div style="font-size: 18px;" class="row">
                                    <div class="col-1">
                                        -
                                    </div>
                                    <div class="col-11">
                                        <b>{{ $item->bukti }}</b>
                                    </div>
                                </div>
                            @endforeach
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    -
                                </div>
                                <div class="col-11">
                                    <b>Berita Acara Penelitian/Peninjauan Tanah Nomor :
                                        {{ $param->no_berita_acara ?? '' }}</b>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            {!! $pernyataan !!}
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 18px;" colspan="2">
                            <div style="font-size: 18px;" class="row mt-3 d-flex justify-content-end">
                                <div class="col-3 text-center">
                                    {{ ucwords(strtolower($param->desa)) ?? '' }},
                                    {{ date('d', strtotime($param->tanggal_surat_keterangan)) }}
                                    {{ ucwords(strtolower(\App\Http\Controllers\HelperController::bulan($param->tanggal_berita_acara))) }}
                                    {{ date('Y', strtotime($param->tanggal_surat_keterangan)) }}
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row d-flex justify-content-between">
                                <p style="margin-bottom:0px;" class="text-justify">
                                    <b><u>Saksi-Saksi :</u></b>
                                </p>
                                <div class="col-3 text-center">
                                    <b>Pembuat Pernyataan</b><br>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            @foreach ($param->saksis as $key => $item)
                                <div style="font-size: 18px;" class="row">
                                    <div class="col-1">
                                        {{ $key + 1 }}.
                                    </div>
                                    <div class="col-4">
                                        {{ $item->saksi }}
                                    </div>
                                    <div class="col-1 text-center">
                                        :
                                    </div>
                                    <div class="col-4">
                                        ............................
                                    </div>
                                </div>
                            @endforeach
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    {{ count($param->saksis) + 1 }}.
                                </div>
                                <div class="col-4">
                                    {{ $param->aparat_rt ?? '' }} (
                                    {{ $param->jabatan_rt ?? '' }} )
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-6">
                                    ............................
                                </div>
                            </div>
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    {{ count($param->saksis) + 2 }}.
                                </div>
                                <div class="col-4">
                                    {{ $param->aparat_desa ?? '' }} ( Aparat Desa )
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-3">
                                    ............................
                                </div>
                                <div class="col-3 text-center">
                                    <b><u>{{ $param->nama ?? '' }}</u></b>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row mt-3">
                                <div class="col-12 text-center align-middle">
                                    <b><u>Diketahui oleh</u></b>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row">
                                <div class="col-6 text-center align-middle">
                                    <b>{{ $param->jabatan_kepala_desa ?? '' }} Sesua</b>
                                    <br><br><br><br>
                                    <b><u>{{ $param->kepala_desa ?? '' }}</u></b>
                                </div>
                                <div class="col-6 text-center align-middle">
                                    <b>{{ $param->jabatan_rt ?? '' }} Desa Sesua</b>
                                    <br><br><br><br>
                                    <b><u>{{ $param->aparat_rt ?? '' }}</u></b>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    {{-- PAGE 4 --}}
    <div class="pagebreak"> </div>
    <div class="row mr-3 ml-3 mt-5">
        <div class="col-12">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td class="text-center align-middle" style="font-size: 24px;">
                            <b>
                                <u>GAMBAR KASAR SKET LOKASI</u>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row mt-5">
                                <div class="col-8">

                                </div>
                                <div class="col-4 text-right">
                                    <b>Peta Lokasi Tanah</b> <br>
                                    <p>{{ $param->sapaan ?? '' }} :
                                        {{ $param->nama ?? '' }}</p>
                                    <p>Luas : {{ $param->luas ?? '' }} m2</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <img class="border border-dark" width="100%"
                                        src="{{ $param->file_denah ? asset('attachments/' . $param->file_denah) : asset('images/bg.jpg') }}"
                                        alt="">
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </td>
                    </tr>
                    <td colspan="2">
                        <div style="font-size: 18px;" class="row mt-4">
                            <div class="col-6">

                            </div>
                            <div class="col-6 text-center align-bottom">
                                {{ ucwords(strtolower($param->desa)) ?? '' }},
                                {{ date('d', strtotime($param->created_at)) ?? '' }}
                                {{ ucwords(strtolower(\App\Http\Controllers\HelperController::bulan($param->created_at))) ?? '' }}
                                {{ date('Y', strtotime($param->created_at)) ?? '' }}
                            </div>
                        </div>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row">
                                <div class="col-6 text-center align-middle">
                                    <b>Pemilik</b> <br><br><br>
                                    <b><u>{{ strtoupper($param->nama) ?? '' }}</u></b>
                                </div>
                                <div class="col-6 text-center align-middle">
                                    <b>Petugas Kantor Desa</b> <br><br><br>
                                    <b><u>{{ strtoupper($param->operator) ?? '' }}</u></b>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 20px;" colspan="2">
                            {!! $patok !!}
                        </td>
                    </tr>
                    @foreach ($param->saksis as $key => $item)
                        <tr>
                            <td colspan="2">
                                <div style="font-size: 18px;" class="row">
                                    <div class="col-1">
                                        {{ $key + 1 ?? '' }}.
                                    </div>
                                    <div class="col-3">
                                        {{ $item->saksi ?? '' }}
                                    </div>
                                    <div class="col-1 text-center">
                                        :
                                    </div>
                                    <div class="col-7">
                                        ............................
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    {{ count($param->saksis) + 1 }}.
                                </div>
                                <div class="col-3">
                                    {{ $param->jabatan_desa ?? '' }} <br>
                                    {{ $param->aparat_desa ?? '' }}
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    ............................
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div style="font-size: 18px;" class="row">
                                <div class="col-1">
                                    {{ count($param->saksis) + 2 }}.
                                </div>
                                <div class="col-3">
                                    {{ $param->jabatan_rt ?? '' }} <br>
                                    {{ $param->aparat_rt ?? '' }}
                                </div>
                                <div class="col-1 text-center">
                                    :
                                </div>
                                <div class="col-7">
                                    ............................
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            javascript: window.print();
        });
    </script>
</body>

</html>
