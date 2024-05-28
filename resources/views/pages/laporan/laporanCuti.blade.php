@extends('master')
@section('title', 'Laporan Cuti')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Pengajuan Cuti & Izin
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengajuan /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Pengajuan Cuti & Izin</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('laporan.laporanCuti') }}" method="get">
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

        <div class="row mt-3 mb-5 mr-5 ml-5">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center table-striped">
                                <thead>
                                    <th>Timestamp</th>
                                    <th>Nama Karyawan</th>
                                    <th>Cuti Terpakai</th>
                                    <th>Sisa Cuti</th>
                                </thead>
                                <tbody>
                                    @foreach ($response as $cuti)
                                        <tr>
                                            <td>{{ date('d-m-Y', strtotime($cuti->tanggal_selesai)) }}</td>
                                            <td>{{ $cuti->nama }}</td>
                                            <td>{{ $cuti->cuti_terpakai }}</td>
                                            <td>{{ $cuti->stok_cuti }}</td>
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
