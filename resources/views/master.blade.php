<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title>PT. STS | @yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/master-style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/Logo-sts.jpg') }}" type="image/jpg">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar Toggle (Topbar) -->

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion shadow-lg" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3"
                href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img class="rounded-circle img-fluid" src="{{ Session::get('profil') }}"
                        alt="{{ Session::get('profil') }}">
                </div>
                <div class="sidebar-brand-text mx-3">{{ Session::get('username') }}</div>
            </a>

            <hr class="sidebar-divider d-none d-md-block mt-3 border border-3">

            <li class="nav-item active">
                <a id="dashboard-tab"
                    class="nav-link {{ Request::is('/') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
                    href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt text-light"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('pemasukan') || Request::is('pengeluaran') || Request::is('reimbursement') || Request::is('laporan/laporanKas') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
                    href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money-bill text-light"></i>
                    <span>Kas Keuangan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a id="pemasukan-tab"
                            class="collapse-item {{ Request::is('pemasukan') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('pemasukan.index') }}">Pemasukan</a>
                        <a id="pengeluaran-tab"
                            class="collapse-item {{ Request::is('pengeluaran') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('pengeluaran.index') }}">Pengeluaran</a>
                        <a id="reimbursement-tab"
                            class="collapse-item {{ Request::is('reimbursement') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('reimbursement.index') }}">Reimbursement
                            <span class="badge badge-center rounded-pill bg-danger" id="pepek"></span>
                        </a>
                        <a id="laporan-kas-tab"
                            class="collapse-item {{ Request::is('laporan/laporanKas') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('laporan.laporanKas') }}">Laporan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('inventory') || Request::is('peminjaman') || Request::is('pengajuan') || Request::is('laporan/laporanPengadaan') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
                    href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
                    aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench text-light"></i>
                    <span>Pengadaan Barang</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a id="inventory-tab"
                            class="collapse-item {{ Request::is('inventory') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('inventory.index') }}">Inventory</a>
                        <a id="peminjaman-tab"
                            class="collapse-item {{ Request::is('peminjaman') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('peminjaman.index') }}">Peminjaman
                            <span class="badge badge-center rounded-pill bg-danger" id="pinjamBarang"></span>
                        </a>
                        <a id="pengajuan-tab"
                            class="collapse-item {{ Request::is('pengajuan') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('pengajuan.index') }}">Pengajuan
                            Barang
                            <span class="badge badge-center rounded-pill bg-danger" id="pengajuanBarang"></span></a>
                        <a id="laporan-pengadaan-tab"
                            class="collapse-item {{ Request::is('laporan/laporanPengadaan') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('laporan.laporanPengadaan') }}">Laporan
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is('datapengajuancuti') || Request::is('laporan/laporanCuti') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
                    href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder text-light"></i>
                    <span>Pengajuan Cuti & Izin</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a id="pengajuan-cuti-tab"
                            class="collapse-item {{ Request::is('datapengajuancuti') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('datapengajuancuti.index') }}">Data Pengajuan
                            Cuti
                            <span class="badge badge-center rounded-pill bg-danger" id="pengajuanCuti"></span>
                        </a>
                        <a id="laporan-cuti-tab"
                            class="collapse-item {{ Request::is('laporan/laporanCuti') ? 'bg-gray-900 text-white' : 'text-gray-900 hover:bg-gray-700 hover:text-white' }}"
                            href="{{ route('laporan.laporanCuti') }}">Laporan Cuti</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a id="profile-tab"
                    class="nav-link {{ Request::is('profile') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
                    href="{{ route('profile.index') }}">
                    <i class="bi bi-person-fill text-light"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a id="user-management-tab"
                    class="nav-link {{ Request::is('userManagement') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}"
                    href="{{ route('userManagement.index') }}">
                    <i class="bi bi-person-add text-light"></i>
                    <span>User Management</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block mt-3 border border-3">

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="#">
                    <i class="fa fa-sign text-light"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                @yield('content')
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white shadow">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT. Shibly Teknologi Solusi 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Apakah anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika anda yakin ingin keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary tombol" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary tombol" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- Sweet Alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('script')
    <script>
        $.ajax({
            type: "GET",
            url: "{{ route('fetchNotif') }}",
            data: {},
            dataType: "json",
            headers: {
                "ngrok-skip-browser-warning": true
            },
            success: function(response) {
                console.log(response[0]['Jumlah_Reimbursment']);
                $('#pepek').text(response[0]['Jumlah_Reimbursment']);
                $('#pinjamBarang').text(response[0]['Jumlah_Pinjam_Barang']);
                $('#pengajuanCuti').text(response[0]['Jumlah_Pengajuan_Cuti']);
                $('#pengajuanBarang').text(response[0]['Jumlah_Pengajuan_Barang']);

            }
        });
    </script>
</body>

</html>
