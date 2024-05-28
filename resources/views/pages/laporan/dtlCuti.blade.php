@extends('master')
@section('title', 'Detail Cuti')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Detail Cuti & Izin
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengajuan /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Detail Cuti & Izin</p>
            </div>
        </div>
        <div class="row mt-2 mb-5 mr-5 ml-5">
            <div class="col-md-12">
                <div class="card mb-3 mt-2">
                    <a class="text-black ml-4 mt-4 mb-4" href="{{ route('datapengajuancuti.index') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        Kembali
                    </a>
                    <div class="border rounded border-primary border-2 ml-4 mr-4 mb-4">
                        <p class="h5 card-title font-weight-bold mb-4 mt-4 ml-4 text-primary">Pengajuan Cuti</p>
                        <hr class="border border-2 border-secondary my-4 mx-4">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="17%">Kategori</td>
                                        <td width="3%">:</td>
                                        <td>{{ $response->kategori }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $response->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Mulai</td>
                                        <td>:</td>
                                        <td>{{ $response->tanggal_mulai }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Berakhir</td>
                                        <td>:</td>
                                        <td>{{ $response->tanggal_selesai }}</td>
                                    </tr>
                                    <tr>
                                        <td>Bukti</td>
                                        <td>:</td>
                                        <td><img src="{{ 'https://spaniel-vast-pheasant.ngrok-free.app/cuti' . $response->upload_bukti_cuti }}"
                                                alt="{{ $response->upload_bukti_cuti }}" width="30%"
                                                style="border-radius: 10px;"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mb-3 mr-2">
                        <div class="col-md-12 d-flex justify-content-end">
                            @if ($response->status != 'Diterima' && $response->status != 'Ditolak')
                                <button type="button" class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 mr-2 rounded"
                                    onclick="openModal('Diterima')">Terima</button>
                                <button type="button" class="bg-danger text-light pt-2 pb-2 pr-2 pl-2 ml-2 rounded"
                                    onclick="openModal('Ditolak')">Tolak</button>
                            @endif
                        </div>
                    </div>
                    <div class="modal fade" id="catatanModal" tabindex="-1" role="dialog"
                        aria-labelledby="catatanModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="catatanModalLabel">Catatan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form
                                    action="{{ route('laporan.catatan', ['id_catatan' => $response->id_pengajuan_cuti, 'menu' => 'pengajuanCuti']) }}"
                                    method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="status" id="status" />
                                        <textarea class="form-control" name="catatan" id="catatan" cols="100" rows="10" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" onclick="myAlert()">Submit</button>
                                    </div>
                                </form>
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
            if ($('#catatan').val() != '') {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Catatan Berhasil Disubmit",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }

        function openModal(status) {
            $('#status').val(status)
            $('#catatanModal').modal('show');
        }

    </script>
@endpush
