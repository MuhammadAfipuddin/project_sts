@extends('master')
@section('title', 'Pengajuan Barang')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Pengajuan & Serah/Terima Barang
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Pengajuan & Serah/Terima</p>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-md-12">
                <ul class="nav nav-pills mb-3 justify-content-evenly" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-pengajuan-barang-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-pengajuan-barang" type="button" role="tab"
                            aria-controls="pills-pengajuan-barang" aria-selected="true">Pengajuan Barang</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-serah-terima-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-serah-terima" type="button" role="tab"
                            aria-controls="pills-serah-terima" aria-selected="false">Serah/Terima Barang</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-pengajuan-barang" role="tabpanel"
                        aria-labelledby="pills-pengajuan-barang-tab">
                        <div class="row mt-3 mr-5 ml-5 mb-5">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="text-center table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Timestamp</th>
                                                        <th>Nama Barang</th>
                                                        <th>Nama Pengirim</th>
                                                        <th>Status</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pengajuan_response as $pengajuan)
                                                        <tr>
                                                            <td>{{ $pengajuan->created_at }}</td>
                                                            <td>{{ $pengajuan->nama_barang }}</td>
                                                            <td>{{ $pengajuan->nama }}</td>
                                                            <td><span
                                                                    class="badge badge-{{ $pengajuan->status == 'Diterima' ? 'success' : ($pengajuan->status == 'Diproses' ? 'primary' : 'danger') }}">{{ $pengajuan->status }}
                                                                </span></td>
                                                            <td><a class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 rounded"
                                                                    href="{{ route('laporan.dtlPengajuanBarang', $pengajuan->id_ajukan_barang) }}">Detail</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-serah-terima" role="tabpanel"
                        aria-labelledby="pills-serah-terima-tab">
                        <div class="row mt-3 mr-5 ml-5 mb-5">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="text-center table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Barang</th>
                                                        <th>Nama Pengirim</th>
                                                        <th>Status</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($serahterima_response as $serahTerima)
                                                        <tr>
                                                            <td>{{ $serahTerima->nama_barang }}</td>
                                                            <td>{{ $serahTerima->nama }}</td>
                                                            <td>
                                                                @if ($serahTerima->bukti_serah_terima === null || $serahTerima->bukti_serah_terima === '')
                                                                    <span
                                                                        class="badge badge-{{ $serahTerima->status == 'Diterima' ? 'success' : ($serahTerima->status == 'Diproses' ? 'primary' : 'danger') }}">{{ $serahTerima->status }}
                                                                    </span>
                                                                @else
                                                                    <span class="badge p-1 bg-secondary rounded text-light">Selesai</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a class="bg-primary text-light p-2 rounded"
                                                                    href="{{ route('laporan.dtlSerahTerima', $serahTerima->id_ajukan_barang) }}">Detail</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
            if ($('#pic_pengirim').val() != '' && $('#pic_penerima').val() != '' && $('#nominal').val() != '' && $(
                    '#tanggal').val() != '' && $('#deskripsi').val() != '' && $('#upload').val() != '') {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Catatan Berhasil Disubmit",
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    position: "center",
                    icon: "failed",
                    title: "Mohon isi catatan!",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }

        $(document).ready(function() {
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var recipient = button.data('bs-whatever');

                // Fill to input status
                $('#status').val(recipient)
            });
        });
    </script>
@endpush
