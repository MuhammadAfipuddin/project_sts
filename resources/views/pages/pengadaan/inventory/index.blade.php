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
                <a data-toggle="modal" data-target="#exampleModal" href=""><i
                        class="h2 bi bi-bell-fill pr-4 text-primary"></i></a>
            </div>
        </div>

        <div class="row d-flex align-items-center">
            <div class="col-md-6">
                <p class="h5 pt-3 pl-4 text-dark font-weight-bold text-start">Inventory
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Inventory</p>
            </div>
        </div>

        <div class="row d-flex justify-content-center mt-2 mb-5 mr-5 ml-5">
            <div class="col-md-12 card">
                <div class="row card-body">
                    <div class="mb-3 d-flex justify-content-end col-md-12">
                        <a href="{{ route('tambahStok') }}" class="text-light bg-primary pt-1 pb-1 pr-1 pl-1 rounded">+
                            Tambah
                            Stok Barang</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center text-black table-striped">
                            <thead>
                                <th width="30%">Nama Barang</th>
                                <th>Kategori</th>
                                <th>Jumlah Barang</th>
                                <th>Detail</th>
                                <th>Hapus</th>
                            </thead>
                            <tbody>
                                @foreach ($response as $inventory)
                                    <tr>
                                        <td>{{ $inventory->nama_barang }}</td>
                                        <td>{{ $inventory->kategori }}</td>
                                        <td>{{ $inventory->total_seluruhnya }}</td>
                                        <td><a class="bg-primary text-light pt-2 pb-2 pr-2 pl-2 rounded"
                                                href="{{ route('laporan.dtlInventory', $inventory->id_barang) }}">Detail</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('inventory.destroy', $inventory->id_barang) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    onclick="return confirm('Apakah kamu yakin ingin menghapus {{ $inventory->nama_barang }}?')"><i
                                                        class="fa fa-trash text-danger"></i></button>
                                            </form>
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
@endsection
@push('script')
    <script></script>
@endpush
