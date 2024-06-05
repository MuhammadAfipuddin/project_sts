@extends('master')
@section('title', 'Laporan Pengadaan')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Laporan Pengajuan, Peminjaman, Inventory,
                    Serah/Terima
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Laporan Pengadaan Barang</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('laporan.laporanPengadaan') }}" method="get">
                    @csrf
                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="date_start" class="form-label">Tanggal Awal</label>
                            <input class="form-control" type="date" name="date_start" id="date_start"
                                value="{{ request('date_start') }}">
                        </div>
                        <div class="col-6">
                            <label for="date_end" class="form-label">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="date_end" id="date_end"
                                value="{{ request('date_end') }}">
                        </div>
                        <div class="col-12 mt-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr class="border border-3 border-dark mx-4 mb-4 ">

        <div class="row mt-3 mb-5">
            <div class="col-md-12">
                <ul class="nav nav-pills mb-3 justify-content-evenly" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active h5 tombol" id="pills-pengajuan-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-pengajuan" type="button" role="tab" aria-controls="pills-pengajuan"
                            aria-selected="true">Laporan Pengajuan Barang</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link h5 tombol" id="pills-peminjaman-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-peminjaman" type="button" role="tab"
                            aria-controls="pills-peminjaman" aria-selected="false">Laporan Peminjaman Barang</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link h5 tombol" id="pills-inventory-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-inventory" type="button" role="tab"
                            aria-controls="pills-inventory" aria-selected="false">Laporan Inventory</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link h5 tombol" id="pills-serah-terima-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-serah-terima" type="button" role="tab"
                            aria-controls="pills-serah-terima" aria-selected="false">Laporan Serah/Terima Barang</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-pengajuan" role="tabpanel"
                        aria-labelledby="pills-pengajuan-tab">
                        <div class="row ml-5 mr-5">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="text-center table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Pengirim</th>
                                                        <th>Tanggal</th>
                                                        <th>Nama Barang</th>
                                                        <th>Harga Barang</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pengajuan_response as $pengajuan)
                                                        <tr>
                                                            <td>{{ $pengajuan->nama }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($pengajuan->created_at)) }}</td>
                                                            <td>{{ $pengajuan->nama_barang }}</td>
                                                            <td>Rp. {{ number_format($pengajuan->harga_total, 2, ',', '.') }}</td>
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
                    <div class="tab-pane fade" id="pills-peminjaman" role="tabpanel"
                        aria-labelledby="pills-peminjaman-tab">
                        <div class="row  ml-5 mr-5">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="text-center table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Nama Barang</th>
                                                        <th>Tgl Pinjam</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($peminjaman_response as $pinjam)
                                                        <tr>
                                                            <td>{{ $pinjam->nama }}</td>
                                                            <td>{{ $pinjam->nama_barang }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($pinjam->tanggal_pinjam)) }}
                                                            </td>
                                                            <td><a class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 rounded"
                                                                    href="{{ route('laporan.dtlPeminjamanBrg', $pinjam->id_pinjam_barang) }}">Detail</a>
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
                    <div class="tab-pane fade" id="pills-inventory" role="tabpanel"
                        aria-labelledby="pills-inventory-tab">
                        <div class="row  ml-5 mr-5">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="text-center table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Timestamp</th>
                                                        <th>Nama Barang</th>
                                                        <th>Status</th>
                                                        <th>Jumlah Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($inventory_response as $inventory)
                                                        <tr>
                                                            <td>{{ date('d-m-Y', strtotime($inventory->created_at)) }}</td>
                                                            <td>{{ $inventory->nama_barang }}</td>
                                                            <td>{{ $inventory->status }}</td>
                                                            <td>{{ $inventory->jumlah_barang }}</td>
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
                        <div class="row  ml-5 mr-5">
                            <div class="col-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="text-center table table-striped">
                                                <thead>
                                                    <th width="15%">Pic Penerima</th>
                                                    <th width="15%">Pic Penyerahan</th>
                                                    <th width="15%">Tgl Penyerahan</th>
                                                    <th>Bukti</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($serahterima_response as $serter)
                                                        <tr>
                                                            <td class="align-middle">{{ $serter->nama }}</td>
                                                            <td class="align-middle">{{ $serter->nama_penyerah }}</td>
                                                            <td class="align-middle">{{ $serter->created_at }}</td>
                                                            <td class="align-middle"><img
                                                                    src="{{ 'https://composed-included-bug.ngrok-free.app/serahterima' . $serter->bukti_serah_terima }}"
                                                                    alt="{{ $serter->bukti_serah_terima }}"
                                                                    width="20%" style="border-radius: 10px;"></td>
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
    <script></script>
@endpush
