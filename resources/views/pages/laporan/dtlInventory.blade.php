@extends('master')
@section('title', 'Detail Inventory')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Detail Barang
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Detail Barang</p>
            </div>
        </div>
        <div class="row mt-2 mb-5 mr-5 ml-5">
            <div class="col-md-12">
                <div class="card mb-3 mt-2">
                    <a class="text-black ml-4 mt-4 mb-3" href="{{ route('inventory.index') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        back
                    </a>
                    <div class="rounded ml-4 mr-4 mb-4">
                        <hr class="border border-2 border-secondary my-2 mx-2">
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img class="ml-4 mb-4 shadow"
                                src="{{ 'https://spaniel-vast-pheasant.ngrok-free.app/barang' . $response->gambar_pinjam_barang }}"
                                alt="{{ $response->gambar_pinjam_barang }}" width="50%" style="border-radius: 10px;">
                        </div>
                        <div class="col-md-9">
                            <form action="" class="mr-3">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td class="font-weight-bold text-primary">Spesifikasi</td>
                                            <td>{{ $response->detail }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-primary">Jumlah Barang Tersedia</td>
                                            <td>{{ $response->jumlah_barang }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-primary">Jumlah Barang Diservice</td>
                                            <td>{{ $response->total_diservice }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-primary">Jumlah Barang Dipinjam</td>
                                            <td>{{ $response->total_dipinjam }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-danger"><b>Total Seluruh Barang</b></td>
                                            <td class="font-weight-bold text-danger">
                                                <b>{{ $response->total_seluruhnya }}</b></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold text-primary">Status</td>
                                            <td>{{ $response->status }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="d-flex justify-content-end"><a
                                                    href="{{ route('page_update_stok', $response->id_barang) }}"
                                                    class="btn btn-primary">Update</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
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
