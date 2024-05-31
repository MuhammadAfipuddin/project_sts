@extends('master')
@section('title', 'Pemasukan')
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
                <p class="h5 pt-4 pb-3 pl-4 text-dark font-weight-bold text-start">Pemasukan Keuangan</p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-2 mr-3"></i>
                <p class="text-dark pt-2 mt-2">/ Kas Keuangan /</p>
                <p class="text-primary pt-2 ml-2 mt-2 mr-4">Pemasukan</p>
            </div>
        </div>

        <div class="row mx-5 mb-5">
            <div class="card col-md-12">
                <div class="card-body">
                    <p class="h5 card-title text-center font-weight-bold mb-4 mt-2 text-black">Pemasukan Kas Operasional Perusahaan</p>
                    <form class="mr-4 ml-4" action="{{ route('pemasukan.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                        @csrf
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{-- <p>{{ Session::get('error') }}</p> --}}
                                <p class="h5 text-center text-danger">Nominal Tidak Boleh Minus atau 0!</p> 
                            </div>
                        @endif
                        <div class="mb-3 row">
                            <label for="pic_pengirim" class="col-md-2 col-form-label">Pic Pengirim</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="pic_pengirim" placeholder="Masukkan Nama" aria-describedby="pic_pengirim" name="pic_pengirim" required pattern="[A-Za-z\s]+">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="pic_penerima" class="col-md-2 col-form-label">Pic Penerima</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="pic_penerima" placeholder="Masukkan Nama" aria-describedby="pic_penerima" name="pic_penerima" required pattern="[A-Za-z\s]+">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="rupiah" class="col-md-2 col-form-label">Nominal Pemasukan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Masukkan nominal" id="rupiah" name="rupiah" required>
                            </div>
                            <label for="tanggal" class="col-md-1 col-form-label">Tanggal</label>
                            <div class="col-md-5">
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="keterangan" class="col-md-2 col-form-label">Keterangan</label>
                            <div class="col-md-10">
                                <textarea class="rounded form-control" name="keterangan" id="keterangan" cols="98" rows="6" placeholder="Masukkan keterangan" required></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="upload" class="col-md-2 col-form-label">Upload Bukti</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control" id="upload" name="upload" required>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" onclick="myAlert()" class="btn text-light bg-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function validateForm() {
            var pic_pengirim = document.getElementById("pic_pengirim").value;
            var pic_penerima = document.getElementById("pic_penerima").value;
            var rupiah = document.getElementById("rupiah").value;
            var tanggal = document.getElementById("tanggal").value;
            var keterangan = document.getElementById("keterangan").value;
            let kondisi = false;

            if (pic_pengirim.trim() !== "" && pic_penerima.trim() !== "" && rupiah.trim() !== "" && tanggal.trim() !== "" &&
                keterangan.trim() !== "") {
                if (rupiah == "Rp. 0") {
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Nominal tidak boleh 0!",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    kondisi = false;
                } else {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Form Berhasil Disubmit",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    kondisi = true;
                }

            } else {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Mohon Lengkapi Semua Kolom!",
                    showConfirmButton: false,
                    timer: 1500
                });
                kondisi = false;
            }

            return kondisi;
        }


        var rupiah = document.getElementById("rupiah");
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, "Rp. ");
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>
@endpush
