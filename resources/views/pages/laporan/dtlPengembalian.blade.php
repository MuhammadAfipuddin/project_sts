@extends('master')
@section('title', 'Detail Pengembalian')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Pengembalian Dana
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary mr-3 pt-3"></i>
                <p class="text-dark pt-4">/ Kas Keuangan /</p>
                <p class="text-primary ml-2 pt-4 mr-4">Pengembalian Dana</p>
            </div>
        </div>
        <div class="row mb-5 mt-3 mr-5 ml-5">
            <div class="col-md-12">
                <div class="card">
                    <a class="text-black ml-4 mt-4 mb-4" href="{{ route('reimbursement.index') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        Kembali
                    </a>
                    <div class="border rounded border-primary border-2 ml-4 mr-4 mb-4">
                        <form action="{{ route('reimbursement.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_kembali" value="{{ $response->id_reimbursment }}">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>{{ $response->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>{{ $response->tanggal_waktu }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nominal Digunakan</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($response->nominal_uang, 2, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>: </td>
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
                                        <td><label for="upload">Bukti Pengembalian Dana</label></td>
                                        <td>:</td>
                                        <td>
                                            @if ($response->bukti_reimburs === null || $response->bukti_reimburs === '')
                                                <input type="file" name="upload" id="upload">
                                            @else
                                                <img src="{{ 'https://composed-included-bug.ngrok-free.app/reimburst' . $response->bukti_reimburs }}" alt="">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="col-12 d-flex justify-content-end">
                                            @if ($response->bukti_reimburs === null || $response->bukti_reimburs === '')
                                                <button type="submit" class="btn tombol text-light bg-primary mr-3"
                                                    onclick="myAlert()">Kirim</button>
                                            @else
                                                <button type="submit" class="btn tombol text-light bg-primary mr-3"
                                                    onclick="myAlert()" disabled>Kirim</button>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function myAlert() {
            const fields = ['#upload'];
            const isComplete = fields.every(field => $(field).val() != '');

            Swal.fire({
                position: "center",
                icon: isComplete ? "success" : "error",
                title: isComplete ? "Form Berhasil Dikirim" : "Bukti pengembalian tidak boleh kosong!",
                showConfirmButton: false,
                timer: 1500
            });
        }
    </script>
@endpush
