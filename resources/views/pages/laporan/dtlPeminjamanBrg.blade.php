@extends('master')
@section('title', 'Detail Peminjaman Barang')
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
                <p class="h5 pt-4 pb-4 pl-4 text-dark font-weight-bold text-start">Detail Peminjaman Barang
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary mr-3"></i>
                <p class="text-dark mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary ml-2 mt-2 mr-4">Detail Peminjamanan</p>
            </div>
        </div>
        <div class="row mb-3 mx-3">
            <div class="col-md-12">
                <div class="card">
                    <a class="text-black ml-4 my-4" href="{{ route('peminjaman.index') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        back
                    </a>
                    <div class="border rounded border-black border-2 mx-4 mb-4">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="17%">Nama</td>
                                    <td width="3%">:</td>
                                    <td>{{ $response->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>:</td>
                                    <td>{{ $response->nama_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Barang</td>
                                    <td>:</td>
                                    <td>{{ $response->jumlah_barang }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pinjam</td>
                                    <td>:</td>
                                    <td>{{ date('d-m-Y', strtotime($response->tanggal_pinjam)) }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{ $response->keterangan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3 mr-2">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="col-md-12 d-flex justify-content-end">
                                @if ($response->status != 'Diterima' && $response->status != 'Ditolak')
                                    <a href="{{ route('laporan.persetujuan_peminjaman', ['id_persetujuan_peminjaman' => $response->id_pinjam_barang, 'status' => 'Diterima']) }}"
                                        class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 mr-2 rounded" id="terima"
                                        onclick="myAlert()">Terima</a>
                                    <a href="{{ route('laporan.persetujuan_peminjaman', ['id_persetujuan_peminjaman' => $response->id_pinjam_barang, 'status' => 'Ditolak']) }}"
                                        class="bg-danger text-light pt-2 pb-2 pr-2 pl-2 ml-2 rounded" id="tolak"
                                        onclick="myReject()">Tolak</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function myAlert() {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Diterima",
                showConfirmButton: false,
                timer: 1500
            });
        }

        function myReject() {
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Ditolak",
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endpush
