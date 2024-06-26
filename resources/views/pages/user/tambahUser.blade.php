@extends('master')
@section('title', 'User')
@section('content')
    <div class="container-fluid" style="margin: 0; padding: 0;">
        <div class="row d-flex justify-content-between align-itemms-center shadow">
            <div class="col-md-12 d-flex align-items-center justify-content-between">
                <p class="h4 pt-4 pb-4 pl-4 text-primary font-weight-bold text-start">KPP (Kas Operasional Perusahaan,
                    Pengadaan
                    Barang, Pengajuan Cuti & Izin)</p>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Tambah User
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-4 mr-3"></i>
                <p class="text-dark pt-4 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-4 ml-2 mt-2 mr-4">Tambah User</p>
            </div>
        </div>
        <div class="row mt-3 mb-3 mr-3 ml-3">
            <div class="col-md-12 card">
                <a class="text-black ml-4 mt-4 mb-4" href="{{ route('userManagement.index') }}">
                    <i class="bi bi-caret-left-fill"></i>
                    back
                </a>
                <div class="border rounded border-secondary border-2 ml-4 mr-4 mb-4">
                    <form class="border" action="{{ route('userManagement.store') }}" method="POST">
                        @csrf
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="mb-3 mt-3 d-flex">
                            <div class="col-md-2">
                                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="nama_pengguna"
                                    placeholder="Masukkan Nama Anda" name="nama" required>
                            </div>
                        </div>
                        <div class="mb-3 d-flex">
                            <div class="col-md-2">
                                <label for="username" class="form-label">Username</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="username" placeholder="Masukkan Username"
                                    name="username" required>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="col-md-2">
                                <label for="password" class="form-label">Password</label>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-eye" id="togglePassword"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Masukkan Password" name="password" minlength="8" required>
                                </div>
                            </div>
                        </div>

                        <div class=" d-flex mb-3">
                            <div class="col-md-2">
                                <label for="nomor" class="form-label">No. HP</label>
                            </div>
                            <div class="col-md-10">
                                <input type="number" class="form-control" id="nomor" placeholder="Masukkan Nomor Hp"
                                    name="no_hp" required>
                            </div>
                        </div>
                        <div class=" d-flex mb-3">
                            <div class="col-md-2">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda"
                                    name="email" required>
                            </div>
                        </div>
                        <div class=" d-flex mb-3">
                            <div class="col-md-2">
                                <label for="role" class="form-label">Role</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" name="role" aria-label="Default select example"
                                    id="role">
                                    <option value="" selected>Pilih Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Menagement">Management</option>
                                    <option value="Karyawan">Karyawan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end mb-3 mt-3">
                            <button type="submit" name="submit" onclick="myAlert()"
                                class="btn btn-primary tombol">Upload</button>
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
            let namaPengguna = $('#nama_pengguna').val();
            let username = $('#username').val();
            let password = $('#password').val();
            let nomor = $('#nomor').val();
            let email = $('#email').val();
            let role = $('#role').val();

            if (namaPengguna != '' && username != '' && password != '' && password.length >= 8 && nomor != '' && email !=
                '' && role != '') {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "User Berhasil Ditambahkan",
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                let errorMessage = "Mohon di isi semua ya!";
                if (password.length < 8) {
                    errorMessage = "Password harus memiliki minimal 8 karakter!";
                }
                Swal.fire({
                    position: "center",
                    icon: "error", // Mengubah icon menjadi 'error' bukan 'failed'
                    title: errorMessage,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }


        $(document).ready(function() {
            $("#togglePassword").click(function() {
                let passwordField = $("#password");
                let passwordFieldType = passwordField.attr("type");
                if (passwordFieldType == "password") {
                    passwordField.attr("type", "text");
                    $(this).removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    passwordField.attr("type", "password");
                    $(this).removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });
        });

        document.getElementById('nama_pengguna').addEventListener('input', function(event) {
            let input = event.target;
            let value = input.value;
            input.value = value.replace(/[^a-zA-Z\s]/g, '');
        });
    </script>
@endpush
