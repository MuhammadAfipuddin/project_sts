@extends('master')
@section('title', 'Laporan Kas')
@section('content')
    <div class="container-fluid" style="margin: 0; padding: 0;">
        <div class="row d-flex justify-content-between align-itemms-center shadow">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle ml-3">
                    <i class="fa fa-bars"></i>
                </button>
                <p class="h4 pt-4 pb-4 pl-4 text-primary font-weight-bold text-start">KPP (Kas Operasional Perusahaan,
                    Pengadaan
                    Barang, Pengajuan Cuti & Izin)</p>
                <a data-toggle="modal" data-target="#exampleModal" href="">
                    <i class="h2 bi bi-bell-fill pr-4 text-primary"></i>
                </a>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Laporan Pemasukan & Pengeluaran
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary mr-3"></i>
                <p class="text-dark mt-2">/ Kas Keuangan /</p>
                <p class="text-primary ml-2 mt-2 mr-4">Laporan</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('laporan.laporanKas') }}" method="get">
                    @csrf
                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date_start" class="form-label">Tanggal Awal</label>
                            <input class="form-control" type="date" name="date_start" id="date_start"
                                value="{{ request('date_start') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="date_end" class="form-label">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="date_end" id="date_end"
                                value="{{ request('date_end') }}">
                        </div>
                        <div class="col-md-12 mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills mb-3 justify-content-evenly" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="laporan-pemasukan-tab" data-bs-toggle="pill"
                            data-bs-target="#laporan-pemasukan" type="button" role="tab"
                            aria-controls="laporan-pemasukan" aria-selected="true">Laporan Pemasukan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="laporan-pengeluaran-tab" data-bs-toggle="pill"
                            data-bs-target="#laporan-pengeluaran" type="button" role="tab"
                            aria-controls="laporan-pengeluaran" aria-selected="false">Laporan Pengeluaran</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="laporan-pemasukan" role="tabpanel"
                        aria-labelledby="laporan-pemasukan-tab">
                        <div class="row mr-5 ml-5 mb-5">
                            <div class="col-md-12">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="dataTable" class="text-center table table-striped">
                                                <thead>
                                                    <th>Pic Pengirim</th>
                                                    <th>Pic Penerima</th>
                                                    <th>Tgl Masuk</th>
                                                    <th>Nominal</th>
                                                    <th>Bukti</th>
                                                    <th>Detail</th>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total_pemasukan = 0;
                                                        $total_pengeluaran = 0;
                                                    @endphp
                                                    @foreach ($pemasukan_response as $kasmas)
                                                        <tr>
                                                            <td class="align-middle" width="15%">
                                                                {{ $kasmas->nama_pengirim }}
                                                            </td>
                                                            <td class="align-middle" width="15%">
                                                                {{ $kasmas->nama_penerima }}
                                                            </td>
                                                            <td class="align-middle" width="15%">
                                                                {{ date('d-m-Y', strtotime($kasmas->tanggal_waktu)) }}
                                                            </td>
                                                            <td class="align-middle" width="15%">
                                                                Rp.
                                                                {{ number_format($kasmas->nominal_dikirim, 2, ',', '.') }}
                                                            </td>
                                                            <td class="align-middle" width="40%">
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#modalFoto{{ $kasmas->id_kas_masuk }}">
                                                                    <img id="bukti_pemasukan"
                                                                        src="{{ 'https://composed-included-bug.ngrok-free.app/pemasukan' . $kasmas->bukti_transaksi }}"
                                                                        alt="{{ $kasmas->bukti_transaksi }}" width="30%"
                                                                        style="border-radius: 10px;">
                                                                </a>
                                                            </td>
                                                            <td class="align-middle">
                                                                <a class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 rounded"
                                                                    href="{{ route('laporan.dtlKasPemasukan', $kasmas->id_kas_masuk) }}">Detail</a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $total_pemasukan += (float) $kasmas->nominal_dikirim;
                                                        @endphp

                                                        <div class="modal fade" id="modalFoto{{ $kasmas->id_kas_masuk }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="modalFotoLabel{{ $kasmas->id_kas_masuk }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document"
                                                                style="max-width: calc(40vw - 30px); /* 30px untuk margin */">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="modalFotoLabel{{ $kasmas->id_kas_masuk }}">
                                                                            Pratinjau Foto
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <img src="{{ 'https://composed-included-bug.ngrok-free.app/pemasukan' . $kasmas->bukti_transaksi }}"
                                                                            alt="{{ $kasmas->bukti_transaksi }}"
                                                                            style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3"
                                                            class="h5 text-start font-weight-bold text-primary">Total
                                                            Pendapatan</td>
                                                        <td colspan="3"
                                                            class="h5 text-end font-weight-bold text-primary">
                                                            Rp. {{ number_format($total_pemasukan, 2, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="laporan-pengeluaran" role="tabpanel"
                        aria-labelledby="laporan-pengeluaran-tab">
                        <div class="row mr-5 ml-5 mb-5">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="dataTable" class="text-center table table-striped">
                                                <thead>
                                                    <th>Pic Pengirim</th>
                                                    <th>Pic Penerima</th>
                                                    <th>Tgl Keluar</th>
                                                    <th>Nominal</th>
                                                    <th>Bukti</th>
                                                    <th>Detail</th>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $total_pengeluaran = 0;
                                                    @endphp
                                                    @foreach ($pengeluaran_response as $keluar)
                                                        <tr>
                                                            <td class="align-middle" width="15%">
                                                                {{ $keluar->nama_pengirim }}
                                                            </td>
                                                            <td class="align-middle" width="15%">
                                                                {{ $keluar->nama_penerima }}
                                                            </td>
                                                            <td class="align-middle" width="15%">
                                                                {{ date('d-m-Y', strtotime($keluar->tanggal_waktu)) }}
                                                            </td>
                                                            <td class="align-middle" width="15%">
                                                                Rp.
                                                                {{ number_format($keluar->nominal_dikeluarkan, 2, ',', '.') }}
                                                            </td>
                                                            <td class="align-middle" width="40%">
                                                                <a href="#" data-toggle="modal"
                                                                    data-target="#modalFoto{{ $keluar->id_kas_keluar }}">
                                                                    <img id="bukti_pengeluaran"
                                                                        src="{{ 'https://composed-included-bug.ngrok-free.app/pengeluaran' . $keluar->bukti_transaksi }}"
                                                                        alt="{{ $keluar->bukti_transaksi }}"
                                                                        width="30%" style="border-radius: 10px;">
                                                                </a>
                                                            </td>
                                                            <td class="align-middle">
                                                                <a class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 rounded"
                                                                    href="{{ route('laporan.dtlKasPengeluaran', $keluar->id_kas_keluar) }}">Detail</a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $total_pengeluaran += (float) $keluar->nominal_dikeluarkan;
                                                        @endphp

                                                        <div class="modal fade"
                                                            id="modalFoto{{ $keluar->id_kas_keluar }}" tabindex="-1"
                                                            role="dialog"
                                                            aria-labelledby="modalFotoLabel{{ $keluar->id_kas_keluar }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg"
                                                                role="document"
                                                                style="max-width: calc(40vw - 30px); /* 30px untuk margin */">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="modalFotoLabel{{ $keluar->id_kas_keluar }}">
                                                                            Pratinjau Foto
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body text-center">
                                                                        <img src="{{ 'https://composed-included-bug.ngrok-free.app/pengeluaran' . $keluar->bukti_transaksi }}"
                                                                            alt="{{ $keluar->bukti_transaksi }}"
                                                                            style="width: 100%;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3"
                                                            class="h5 text-start font-weight-bold text-primary">Total
                                                            Pengeluaran</td>
                                                        <td colspan="3"
                                                            class="h5 font-weight-bold text-primary text-end">
                                                            Rp. {{ number_format($total_pengeluaran, 2, ',', '.') }}
                                                        </td>
                                                    </tr>
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
    <script></script>
@endpush
