@extends('master')
@section('title', 'Detail Reimbursement')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Detail Pengajuan Reimbursement
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Kas Keuangan /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Reimburst</p>
            </div>
        </div>
        <div class="row mt-2 mb-5 mr-5 ml-5">
            <div class="col-md-12">
                <div class="card mb-3 mt-2">
                    <a class="text-black ml-4 mt-4 mb-4" href="{{ route('reimbursement.index') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        Kembali
                    </a>
                    <div class="border rounded border-primary border-2 ml-4 mr-4 mb-4">
                        <p class="h5 card-title font-weight-bold mb-4 mt-4 ml-4 text-primary">Pengajuan Reimbursement</p>
                        <hr class="border border-2 border-secondary my-4 mx-4">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="17%">Nama</td>
                                    <td width="3%">:</td>
                                    <td>{{ $response->nama }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>{{ $response->tanggal_waktu }}</td>
                                </tr>
                                <tr>
                                    <td>Nominal</td>
                                    <td>:</td>
                                    <td>Rp. {{ number_format($response->nominal_uang, 2, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td>:</td>
                                    <td>{{ $response->kategori }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{ $response->keterangan }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <td>{{ $response->nama_bank }}</td>
                                </tr>
                                <tr>
                                    <td>No. Rekening</td>
                                    <td>:</td>
                                    <td>{{ $response->nomor_rekening }}</td>
                                </tr>
                                <tr>
                                    <td>Bukti</td>
                                    <td>:</td>
                                    <td><img src="{{ 'https://spaniel-vast-pheasant.ngrok-free.app/reimburst' . $response->bukti_transaksi }}"
                                            alt="{{ $response->bukti_transaksi }}" width="10%"
                                            style="border-radius: 10px;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mb-3 mr-2">
                        <div class="col-md-12 d-flex justify-content-end">
                            @if ($response->status != 'Diterima' && $response->status != 'Ditolak')
                                <a href="{{ route('laporan.persetujuan', ['id_persetujuan' => $response->id_reimbursment, 'status' => 'Diterima']) }}"
                                    class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 mr-2 rounded" onclick="myAlert()">Terima</a>
                                <a href="{{ route('laporan.persetujuan', ['id_persetujuan' => $response->id_reimbursment, 'status' => 'Ditolak']) }}"
                                    class="bg-danger text-light pt-2 pb-2 pr-2 pl-2 ml-2 rounded" onclick="myReject()">Tolak</a>
                            @endif
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
