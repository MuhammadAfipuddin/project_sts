@extends('master')
@section('title', 'Detail Kas Keluar')
@section('content')
    <div class="container-fluid" style="margin: 0; padding: 0;">
        <div class="row d-flex justify-content-between align-itemms-center shadow">
            <div class="col-lg-12 col-md-12 d-flex align-items-center justify-content-between">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle ml-3">
                    <i class="fa fa-bars"></i>
                </button>
                <p class="h4 py-4 pl-4 text-primary font-weight-bold text-start mr-3">KPP (Kas Operasional Perusahaan,
                    Pengadaan
                    Barang, Pengajuan Cuti & Izin)</p>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <p class="h5 pt-4 pb-3 pl-4 text-dark font-weight-bold text-start">Detail Kas Pengeluaran
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary mr-3"></i>
                <p class="text-dark mt-2">/ Kas Keuangan /</p>
                <p class="text-primary ml-2 mt-2 mr-4">Detail Pengeluaran</p>
            </div>
        </div>
        <div class="row mt-3 ,b-3 mr-3 ml-3">
            <div class="col-md-12">
                <div class="card">
                    <a class="text-black ml-4 mt-4 mb-4" href="{{ route('laporan.laporanKas') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        back
                    </a>
                    <div class="border rounded border-primary border-2 ml-4 mr-4 mb-4">
                        <p class="h5 card-title font-weight-bold my-4 ml-2 text-primary">Pengeluaran Kas Operasional
                        </p>
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
                                        <td>Tanggal Keluar</td>
                                        <td>:</td>
                                        <td>{{ $response->tanggal_waktu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nominal</td>
                                        <td>:</td>
                                        <td>{{ $response->nominal_dikeluarkan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $response->keterangan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bukti</td>
                                        <td>:</td>
                                        <td><img src="{{ 'https://composed-included-bug.ngrok-free.app/pengeluaran' . $response->bukti_transaksi }}"
                                                alt="{{ $response->bukti_transaksi }}" width="30%"
                                                style="border-radius: 10px;"></td>
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
