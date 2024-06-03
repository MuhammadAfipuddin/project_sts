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
    <link rel="icon" href="{{ asset('assets/img/Logo-sts.jpg') }}" type="image/jpg">

    <style>
        .nav-link:hover {
            background: #dfb64e;
            transition: all ease-in 0.3s;
            border-radius: 20px;
        }

        .btn {
            min-width: auto;
            min-height: auto;
            font-family: 'Nunito', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            font-weight: 700;
            color: #ffffff;
            background: #614fe6;
            background: linear-gradient(90deg, rgb(68, 62, 223) 0%, rgbargb(79, 92, 209)%);
            border: none;
            border-radius: 1000px;
            box-shadow: 6px 6px 18px rgba(99, 79, 209, 0.64);
            transition: all 0.3s ease-in-out 0s;
            cursor: pointer;
            outline: none;
            position: relative;
            padding: 6px 12px;
        }

        .topbar {
            height: 4.375rem
        }

        .topbar #sidebarToggleTop {
            height: 2.5rem;
            width: 2.5rem
        }

        .topbar #sidebarToggleTop:hover {
            background-color: #eaecf4
        }

        .topbar #sidebarToggleTop:active {
            background-color: #dddfeb
        }
    </style>


    <script src="https://cdn.onesignal.com/sdks/web/v16/OneSignalSDK.page.js" defer></script>
    <script>
        window.OneSignalDeferred = window.OneSignalDeferred || [];
        OneSignalDeferred.push(function(OneSignal) {
            OneSignal.init({
                appId: "5f287263-03af-476a-953c-1d919b3202aa",
            });
        });
    </script>


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
                {{-- <div class="sidebar-brand-text mx-3">{{ Session::get('tipe_role') }}</div> --}}
            </a>

            <hr class="sidebar-divider d-none d-md-block mt-3 border border-3">

            <li class="nav-item active">
                <a id="dashboard-tab" class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Kas Keuangan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a id="pemasukan-tab" class="collapse-item" href="{{ route('pemasukan.index') }}">Pemasukan</a>
                        <a id="pengeluaran-tab" class="collapse-item"
                            href="{{ route('pengeluaran.index') }}">Pengeluaran</a>
                        <a id="reimbursement-tab" class="collapse-item"
                            href="{{ route('reimbursement.index') }}">Reimbursement
                            <span class="badge badge-center rounded-pill bg-danger" id="pepek"></span>
                        </a>
                        <a id="laporan-kas-tab" class="collapse-item" href="{{ route('laporan.laporanKas') }}">Laporan</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pengadaan Barang</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a id="inventory-tab" class="collapse-item" href="{{ route('inventory.index') }}">Inventory</a>
                        <a id="peminjaman-tab" class="collapse-item" href="{{ route('peminjaman.index') }}">Peminjaman
                            <span class="badge badge-center rounded-pill bg-danger" id="pinjamBarang"></span>
                        </a>
                        <a id="pengajuan-tab" class="collapse-item" href="{{ route('pengajuan.index') }}">Pengajuan Barang
                            <span class="badge badge-center rounded-pill bg-danger" id="pengajuanBarang"></span></a>
                        <a id="laporan-pengadaan-tab" class="collapse-item" href="{{ route('laporan.laporanPengadaan') }}">Laporan
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pengajuan Cuti & Izin</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a id="pengajuan-cuti-tab" class="collapse-item" href="{{ route('datapengajuancuti.index') }}">Data Pengajuan
                            Cuti
                            <span class="badge badge-center rounded-pill bg-danger" id="pengajuanCuti"></span>
                        </a>
                        <a id="laporan-cuti-tab" class="collapse-item" href="{{ route('laporan.laporanCuti') }}">Laporan Cuti</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a id="profile-tab" class="nav-link" href="{{ route('profile.index') }}">
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span></a>
            </li>

            <li class="nav-item">
                <a id="user-management-tab" class="nav-link" href="{{ route('userManagement.index') }}">
                    <i class="bi bi-person-add"></i>
                    <span>User Management</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block mt-3 border border-3">

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="{{ route('logout') }}">
                    <i class="fa fa-sign"></i>
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
            <footer class="sticky-footer bg-white">
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah jika anda yakin ingin keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
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
