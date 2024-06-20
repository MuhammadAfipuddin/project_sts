@extends('master')
@section('title', 'Pengajuan Cuti')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Pengajuan Cuti & Izin
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengajuan /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Pengajuan Cuti & Izin</p>
            </div>
        </div>
        <div class="row mb-5 mx-5">
            <div class="col-md-12">
            <div class="card-shadow">
                <div class="card-body table-responsive">
                        <table class="table text-center table-striped">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Nama</th>
                                    <th>Stok Cuti</th>
                                    <th>Tgl Mulai</th>
                                    <th>Tgl Berakhir</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            <tbody>
                                @foreach ($response as $pengcut)
                                    <tr>
                                        <td>{{ $pengcut->kategori }}</td>
                                        <td>{{ $pengcut->nama }}</td>
                                        <td>{{ $pengcut->stok_cuti }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pengcut->tanggal_mulai)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($pengcut->tanggal_selesai)) }}</td>
                                        <td>
                                            <span
                                            class="badge badge-{{ $pengcut->status == 'Diterima' ? 'success' : ($pengcut->status == 'Diproses' ? 'primary' : 'danger') }}">{{ $pengcut->status }}
                                        </span>
                                        </td>
                                        <td>
                                            <a class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 rounded"
                                                href="{{ route('laporan.dtlCuti', $pengcut->id_pengajuan_cuti) }}">Detail</a>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script></script>
@endpush
