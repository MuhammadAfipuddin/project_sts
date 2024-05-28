@extends('master')
@section('title', 'Detail Kas Masuk')
@section('content')
    <div class="container-fluid" style="margin: 0; padding: 0;">
        <div class="row d-flex justify-content-between align-itemms-center shadow">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle ml-3">
                    <i class="fa fa-bars"></i>
                </button>
                <p class="h4 pt-4 pb-4 pl-4 text-primary font-weight-bold text-start mr-3">KPP (Kas Operasional Perusahaan,
                    Pengadaan
                    Barang, Pengajuan Cuti & Izin)</p>
                    <a data-toggle="modal" data-target="#exampleModal" href="">
                        <i class="h2 bi bi-bell-fill pr-4 text-primary"></i>
                    </a>
                </div>
            </div>

        <div class="row d-flex align-items-center">
            <div class="col-6">
                <p class="h5 pt-4 pb-3 pl-4 text-dark font-weight-bold text-start">Detail Kas Pemasukan
                </p>
            </div>
            <div class="col-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary mr-3"></i>
                <p class="text-dark mt-2">/ Kas Keuangan /</p>
                <p class="text-primary ml-2 mt-2 mr-4">Detail Pemasukan</p>
            </div>
        </div>
        <div class="row mt-3 mb-3 mr-3 ml-3">
            <div class="col-12">
                <div class="card">
                    <a class="text-black ml-4 mt-4 mb-4" href="{{ route('laporan.laporanKas') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        back
                    </a>
                    <div class="border border-2 rounded border-primary mx-4 mb-4">
                        <p class="h5 card-title font-weight-bold my-4 ml-2 text-primary">Pemasukan Kas Operasional</p>
                        <hr class="border border-2 border-secondary my-2 mx-2">
                        <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="15%">Pic Pengirim</td>
                                    <td width="5%">:</td>
                                    <td>{{ $response->nama_pengirim }}</td>
                                </tr>
                                <tr>
                                    <td>Pic Penerima</td>
                                    <td>:</td>
                                    <td>{{ $response->nama_penerima }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Masuk</td>
                                    <td>:</td>
                                    <td>{{ $response->tanggal_waktu }}</td>
                                </tr>
                                <tr>
                                    <td>Nominal</td>
                                    <td>:</td>
                                    <td>{{ $response->nominal_dikirim }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{ $response->keterangan }}</td>
                                </tr>
                                <tr>
                                    <td>Bukti</td>
                                    <td>:</td>
                                    <td><img src="{{ 'https://spaniel-vast-pheasant.ngrok-free.app/pemasukan' . $response->bukti_transaksi }}"
                                            alt="{{ $response->bukti_transaksi }}"
                                            width="30%" style="border-radius: 10px;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
