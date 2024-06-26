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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">User Management</p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ User Management /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">User</p>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-2 mb-5 mr-5 ml-5">
            <div class="col-md-12 card">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-end">
                        <a href="{{ route('tambahUser') }}" class="text-light bg-primary pt-1 pb-1 pr-1 pl-1 rounded">+
                            Tambah
                            User</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>No. HP</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Stok Cuti</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($response as $user)
                                    <tr>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->tipe_role }}</td>
                                        <td>{{ $user->stok_cuti }}</td>
                                        <td>
                                            <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="{{ route('userManagement.destroy', $user->id_user) }}">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal hapus --}}
        <div class="modal" tabindex="-1" id="logoutModal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-red-700">Konfirmasi Hapus Akun</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus akun {{ $user->nama }}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <form action="{{ route('userManagement.destroy', $user->id_user) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Hapus
                    </button>
                </form>
                </div>
              </div>
            </div>
          </div>

    </div>
@endsection
@push('script')
    <script>

    </script>
@endpush
