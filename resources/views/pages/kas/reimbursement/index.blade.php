@extends('master')
@section('title', 'Reimbursement')
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
                <p class="h5 pt-4 pb-3 pl-4 text-dark font-weight-bold text-start">Reimburst & Bukti Pengembalian
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-2 mr-3"></i>
                <p class="text-dark pt-2 mt-2">/ Kas Keuangan /</p>
                <p class="text-primary pt-2 ml-2 mt-2 mr-4">Reimbursement</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills mb-3 justify-content-evenly" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pengajuan-dana-tab" data-bs-toggle="pill"
                            data-bs-target="#pengajuan-dana" type="button" role="tab" aria-controls="pengajuan-dana"
                            aria-selected="true">Pengajuan Reimbursement</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pengembalian-dana-tab" data-bs-toggle="pill"
                            data-bs-target="#pengembalian-dana" type="button" role="tab"
                            aria-controls="pengembalian-dana" aria-selected="false">Bukti Pengembalian Dana</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pengajuan-dana" role="tabpanel"
                        aria-labelledby="pengajuan-dana-tab">
                        <div class="row mb-5 mt-3 mr-5 ml-5">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="text-center table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Tanggal</th>
                                                        <th>Nominal</th>
                                                        <th>Kategori</th>
                                                        <th>Status</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($response as $reimburst)
                                                        <tr>
                                                            <td>{{ $reimburst->nama }}</td>
                                                            <td>{{ date('d-m-Y', strtotime($reimburst->tanggal_waktu)) }}
                                                            </td>
                                                            <td>Rp.
                                                                {{ number_format($reimburst->nominal_uang, 2, ',', '.') }}
                                                            </td>
                                                            <td>{{ $reimburst->kategori }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-{{ $reimburst->status == 'Diterima' ? 'success' : ($reimburst->status == 'Diproses' ? 'primary' : 'danger') }}">{{ $reimburst->status }}
                                                                </span>
                                                            </td>
                                                            <td><a class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 rounded"
                                                                    href="{{ route('laporan.dtlReimbursement', $reimburst->id_reimbursment) }}">Detail</a>
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
                    <div class="tab-pane fade" id="pengembalian-dana" role="tabpanel"
                        aria-labelledby="pengembalian-dana-tab">
                        <div class="row mr-5 mt-3 ml-5 mb-5">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('reimbursement.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @if (Session::has('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ Session::get('error') }}
                                                </div>
                                            @endif
                                            <div class="table-responsive">
                                                <table class="table text-center table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Nominal</th>
                                                            <th>Status</th>
                                                            <th>Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($res as $pengembalian)
                                                            <tr>
                                                                <td>{{ $pengembalian->nama }}</td>
                                                                <td>Rp.
                                                                    {{ number_format($pengembalian->nominal_uang, 2, ',', '.') }}
                                                                </td>
                                                                <td>
                                                                    @if ($pengembalian->bukti_reimburs == null || $pengembalian->bukti_reimburs == '')
                                                                        <span
                                                                            class="badge badge-{{ $pengembalian->status == 'Diterima' ? 'success' : ($pengembalian->status == 'Diproses' ? 'primary' : 'danger') }}">
                                                                            {{ $pengembalian->status }}
                                                                        </span>
                                                                    @else
                                                                        <span class="badge badge-secondary">
                                                                            Selesai
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td><a class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 rounded"
                                                                        href="{{ route('laporan.dtlPengembalian', $pengembalian->id_reimbursment) }}">Detail</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
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
