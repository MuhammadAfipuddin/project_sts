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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Tambah Barang
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Tambah Barang</p>
            </div>
        </div>
        <div class="row mt-3 mb-5 mr-5 ml-5">
            <div class="col-md-12 card">
                <a class="text-black ml-4 mt-4 mb-4" href="{{ route('inventory.index') }}">
                    <i class="bi bi-caret-left-fill"></i>
                    back
                </a>
                <div class="border rounded border-secondary border-2 ml-4 mr-4 mb-4">
                    <form class="border" action="{{ route('inventory.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="mb-3 mt-3 d-flex">
                            <div class="col-md-2">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                                    placeholder="Masukkan Nama Barang" required>
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="col-md-2">
                                <label for="kategori" class="form-label">Kategori Barang</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" name="kategori" aria-label="Default select example">
                                    <option value="" selected>Kategori</option>
                                    <option value="Furniture">Furniture</option>
                                    <option value="ATK">ATK</option>
                                    <option value="Elektronik">Elektronik</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-md-2">
                                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang"
                                    placeholder="Masukkan Jumlah Barang" required max="500"
                                    oninput="validateMaxValue(this)">
                            </div>
                            <span class="col-md-8 mt-2" id="error-message" style="color:red; display:none;">Jumlah barang tidak boleh lebih dari 500</span>
                        </div>
                        <div class="mb-3 mt-3 d-flex">
                            <div class="col-md-2">
                                <label for="detail" class="form-label">Spesifikasi</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="detail" name="detail"
                                    placeholder="Masukkan Spesifikasi" required>
                            </div>
                        </div>
                        <div class="mb-3 mt-3 d-flex">
                            <div class="col-md-2">
                                <label for="upload" class="form-label">Upload Foto</label>
                            </div>
                            <div class="col-md-10">
                                <input type="file" class="form-control" id="upload" name="upload" required>
                            </div>
                        </div>

                        <div class="col-md-12 d-flex justify-content-end mb-3 mt-3">
                            <button type="submit" class="btn btn-primary tombol" onclick="myAlert()">Upload</button>
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
            if ($('#nama_barang').val() != '' && $('#kategori').val() != '' && $('#jumlah_barang').val() != '' && $(
                    '#detail').val() != '' && $('#upload').val() != '') {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Barang Berhasil Ditambahkan",
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    position: "center",
                    icon: "failed",
                    title: "Mohon di isi semua ya!",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }

        function validateMaxValue(input) {
            const max = 500;
            const errorMessage = document.getElementById('error-message');
            if (input.value > max) {
                input.value = max;
                errorMessage.style.display = 'inline';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    </script>
@endpush
