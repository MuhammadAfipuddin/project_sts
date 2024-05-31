@extends('master')
@section('title', 'Detail Serah/Terima')
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
                <p class="h5 pt-4 pl-4 text-dark font-weight-bold text-start">Detail Serah/Terima Barang
                </p>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-end">
                <i class="h2 bi bi-house text-primary pt-3 mr-3"></i>
                <p class="text-dark pt-3 mt-2">/ Pengadaan Barang /</p>
                <p class="text-primary pt-3 ml-2 mt-2 mr-4">Pengajuan & Serah/Terima</p>
            </div>
        </div>
        <div class="row mt-3 mr-5 ml-5 mb-5">
            <div class="col-md-12">
                <div class="card">
                    <a class="text-black ml-4 mt-4 mb-4" href="{{ route('pengajuan.index') }}">
                        <i class="bi bi-caret-left-fill"></i>
                        back
                    </a>
                    <div class="border rounded border-primary border-2 ml-4 mr-4 mb-4">
                        <p class="h5 card-title font-weight-bold mb-4 mt-4 ml-4 text-primary">Serah/Terima
                            Barang</p>
                        <hr class="border border-2 border-secondary my-4 mx-4">
                        <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_ajukan_barang" value="{{ $response->id_ajukan_barang }}">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td width="18%">Nama</td>
                                            <td width="3%">:</td>
                                            <td>{{ $response->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle"><label for="nama_penyerah">Nama Penyerah</label></td>
                                            <td class="align-middle">:</td>
                                            <td class="align-middle">
                                                @if ($response->nama_penyerah === null || $response->nama_penyerah === '')
                                                    <input class="col-md-4 form-control" type="text" name="nama_penyerah"
                                                        id="penyerah" required>
                                                @else
                                                    {{ $response->nama_penyerah }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td>:</td>
                                            <td>{{ $response->nama_barang }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ $response->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Barang</td>
                                            <td>:</td>
                                            <td>{{ $response->jumlah_barang }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga Barang Satuan</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($response->harga_satuan, 2, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td>:</td>
                                            <td>Rp. {{ number_format($response->harga_total, 2, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $response->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bukti</td>
                                            <td>:</td>
                                            <td>
                                                @if ($response->bukti_serah_terima === null || $response->bukti_serah_terima === '')
                                                    <input type="file" name="upload" id="upload">
                                                @else
                                                <img id="bukti_serah_terima"
                                                                        src="{{ 'https://composed-included-bug.ngrok-free.app/serahterima' . $response->bukti_serah_terima }}"
                                                                        alt="{{ $response->bukti_serah_terima }}"
                                                                        width="30%" style="border-radius: 10px;">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="col-md-12 d-flex justify-content-end">
                                                @if ($response->nama_penyerah != null || $response->nama_penyerah != '')
                                                    <button type="submit" class="btn text-light bg-primary mr-3"
                                                        onclick="myAlert(event)" hidden>Kirim</button>
                                                @else
                                                    <button type="submit" class="btn text-light bg-primary mr-3"
                                                        onclick="myAlert(event)">Kirim</button>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function myAlert(event) {
            event.preventDefault(); // Mencegah form submit secara default
            const namaPenyerah = document.getElementById('penyerah') ? document.getElementById('penyerah').value : null;
            const bukti = document.getElementById('upload') ? document.getElementById('upload').value : null;

            if (!namaPenyerah || !bukti) {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Nama penyerah dan bukti harus diisi!'
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data berhasil dikirim!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.querySelector('form')
                            .submit(); // Lanjutkan submit form jika SweetAlert dikonfirmasi
                    }
                });
            }
        }

        document.getElementById('penyerah').addEventListener('input', function(event) {
            var input = event.target;
            var value = input.value;
            input.value = value.replace(/[^a-zA-Z\s]/g, '');
        });
    </script>
@endpush
