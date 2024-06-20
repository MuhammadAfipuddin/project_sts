@extends('master')
@section('title', 'Inventory')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Update Barang
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-4 mr-3"></i>
                <p class="text-dark pt-4 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-4 ml-2 mt-2 mr-4">Update Barang</p>
            </div>
        </div>
        <div class="row mt-3 mb-3 mr-3 ml-3">
            <div class="col-md-12 card">
                <a class="text-black ml-4 mt-4 mb-4" href="{{ route('inventory.index') }}">
                    <i class="bi bi-caret-left-fill"></i>
                    back
                </a>
                <div class="border rounded border-secondary border-2 ml-4 mr-4 mb-4">
                    <form class="border" action="{{ route('inventory.update', $response->id_barang) }}" method="POST">
                        @csrf
                        @method('put')
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{-- {{ Session::get('error') }} --}}
                                <p class="h5 text-center text-danger">Semua Harus Diisi!</p>
                            </div>
                        @endif
                        <div class="mb-3 mt-3 d-flex">
                            <div class="col-md-2">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="nama_barang"
                                    placeholder="Masukkan nama barang" name="nama_barang"
                                    value="{{ $response->nama_barang }}" required disabled>
                            </div>
                        </div>
                        <div class=" d-flex mb-3">
                            <div class="col-md-2">
                                <label for="kategori" class="form-label">Kategori</label>
                            </div>
                            <div class="col-md-3">
                                <input type="text" name="status" id="status" value="{{ $response->kategori }}"
                                    required disabled>
                            </div>
                        </div>
                        <div class=" d-flex mb-3">
                            <div class="col-md-2">
                                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                            </div>
                            <div class="col-md-10">
                                <input type="jumlah_barang" class="form-control" id="jumlah_barang"
                                    placeholder="Masukkan jumlah barang" name="jumlah_barang"
                                    value="{{ $response->jumlah_barang }}" required>
                            </div>
                        </div>
                        <div class=" d-flex mb-3">
                            <div class="col-md-2">
                                <label for="total_diservice" class="form-label">Total Diservice</label>
                            </div>
                            <div class="col-md-10">
                                <input type="total_diservice" class="form-control" id="total_diservice"
                                    placeholder="Masukkan jumlah barang" name="total_diservice"
                                    value="{{ $response->total_diservice }}" required>
                            </div>
                        </div>
                        <div class=" d-flex mb-3">
                            <div class="col-md-2">
                                <label for="role" class="form-label">Status</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value="" selected>Status</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end mb-3 mt-3">
                            <button type="submit" name="update" onclick="myAlert()"
                                class="btn btn-primary tombol">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function myAlert() {
            if ($('#nama_barang').val() != '' && $('#status').val() != '' && $('#jumlah_barang').val() != '') {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Stok Berhasil di Update",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    </script>
@endpush
