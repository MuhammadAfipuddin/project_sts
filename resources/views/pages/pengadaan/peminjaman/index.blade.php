@extends('master')
@section('title', 'Peminjaman Barang')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Peminjaman Barang
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Peminjaman Barang</p>
            </div>
        </div>

        <div class="row mt-3 mb-5">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nama Barang</th>
                                        <th>Tgl Pinjam</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($response as $pinjam)
                                        <tr>
                                            <td class="align-middle">{{ $pinjam->nama }}</td>
                                            <td class="align-middle">{{ $pinjam->nama_barang }}</td>
                                            <td class="align-middle">{{ date('d-m-Y', strtotime($pinjam->tanggal_pinjam)) }}</td>
                                            <td>
                                                <span class="badge badge-{{ $pinjam->status == 'Diterima' ? 'success' : ($pinjam->status == 'Diproses' ? 'primary' : 'danger') }}">{{ $pinjam->status }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="text-light pb-2 pt-2 pr-2 pl-2 bg-primary rounded" href="{{ route('laporan.dtlPeminjamanBrg', $pinjam->id_pinjam_barang) }}">Detail</a>
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
@endsection
@push('script')
    <script></script>
@endpush
