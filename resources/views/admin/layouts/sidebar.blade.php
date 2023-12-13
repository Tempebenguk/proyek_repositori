<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/img/polinemalogo.png') }}" alt="" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><b>POLTEKGRADREPO</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Data User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.mahasiswa.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mahasiswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.dosen.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dosen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.admin.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tugasakhir.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Data Tugas Akhir
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Tambahkan di bagian bawah template Anda -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil semua elemen nav-item di sidebar
        const navItems = document.querySelectorAll('.nav-sidebar .nav-item');

        // Iterasi melalui setiap elemen nav-item
        navItems.forEach(function (item) {
            // Tambahkan event listener untuk menanggapi hover
            item.addEventListener('mouseenter', function () {
                this.classList.add('active');
            });

            // Tambahkan event listener untuk menanggapi keluar dari hover
            item.addEventListener('mouseleave', function () {
                this.classList.remove('active');
            });
        });
    });
</script>
