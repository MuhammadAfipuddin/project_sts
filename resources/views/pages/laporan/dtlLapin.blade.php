@extends('master')
@section('title', 'Detail Laporan Inventory')
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
            <a data-toggle="modal" data-target="#exampleModal" href=""><i
                    class="h2 bi bi-bell-fill pr-4 text-primary"></i></a>
        </div>
    </div>

    <div class="row d-flex align-items-center">
        <div class="col-md-6">
            <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Detail Laporan Inventory
            </p>
        </div>
        <div class="col-md-6 d-flex align-items-center justify-content-end">
            <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
            <p class="text-dark pt-3 mt-2">/ Pengadaan Barang /</p>
            <p class="text-primary pt-3 ml-2 mt-2 mr-4">Detail Laporan Inventory</p>
        </div>
    </div>
        <div class="row mt-3 mr-5 ml-5 mb-5">
            <div class="col-md-12">
                <div class="card">
                    <a class="text-black ml-4 mt-4 mb-4" href="{{ route('pengajuanBarang.index') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        back
                    </a>
                    <div class="border rounded border-primary border-2 ml-4 mr-4 mb-4">
                        <p class="h5 card-title font-weight-bold mb-4 mt-4 ml-4 text-primary">Laporan Inventory</p>
                        <hr class="border border-2 border-secondary my-4 mx-4">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="18%">Pic Pengirim</td>
                                    <td width="3%">:</td>
                                    <td>Zahra</td>
                                </tr>
                                <tr>
                                    <td>Pic Penerima</td>
                                    <td>:</td>
                                    <td>Laptop Lenovo Thinkpad</td>
                                </tr>
                                <tr>
                                    <td>Tgl Pinjam</td>
                                    <td>:</td>
                                    <td>12/03/2023</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Barang</td>
                                    <td>:</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td>Untuk penunjang kerja, karena laptop pribadi rusak</td>
                                </tr>
                                <tr>
                                    <td>Bukti</td>
                                    <td>:</td>
                                    <td>User123.pdf</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3 mr-2">
                        <div class="col-md-12 d-flex justify-content-end">
                            <a href="" class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 mr-2 rounded">Terima</a>
                            <a href="" class="bg-danger text-light pt-2 pb-2 pr-2 pl-2 ml-2 rounded">Tolak</a>
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
