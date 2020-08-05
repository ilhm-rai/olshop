<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/favicon/favicon-32x32.png'); ?>" alt="" class="rounded-circle border border-white">
        </div>
        <div class="sidebar-brand-text mx-3">DalyRasya</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('dashboard'); ?>">
            <i class="fa fa-fw fa-chart-pie"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Produk
    </div>

    <!-- Nav Item - Products -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('product'); ?>">
            <i class="fas fa-fw fa-box"></i>
            <span>Produk</span></a>
    </li>

    <!-- Nav Item - Category -->
    <li class="nav-item">
        <a class="nav-link pt-0" href="<?= base_url('category'); ?>">
            <i class="fas fa-fw fa-list-alt"></i>
            <span>Kategori</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <!-- Nav Item - Order -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-cart-arrow-down"></i>
            <span>Pesanan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link pt-0" href="tables.html">
            <i class="fas fa-fw fa-truck-moving"></i>
            <span>Jasa Pengirim</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-target="#logoutModal" data-toggle="modal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->