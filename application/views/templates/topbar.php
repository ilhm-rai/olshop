<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-customer <?= ($this->session->userdata('role_id') == 1) ? 'bg-white shadow mb-4' : 'bg-gradient-main'; ?> navbar-dark  topbar static-top py-0" id="navbar">

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group relative">
                    <input type="text" class="form-control border-0 <?= ($this->session->userdata('role_id') == 1) ? 'bg-light' : ''; ?> rounded-pill small no-focus-border" placeholder="Cari sesuatu disini..." aria-label="Search" aria-describedby="basic-addon2" style="height: 38px;">
                    <button class="btn <?= ($this->session->userdata('role_id') == 1) ? 'btn-primary' : 'btn-geraldine'; ?>  rounded-pill position-absolute right-of-parent border-white" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Carts -->
                <?php if (($this->session->userdata('role_id') == 2) || (!$this->session->has_userdata('role_id'))) : ?>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="cartsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-shopping-cart fa-fw fa-1x text-white"></i>
                            <!-- Counter - Carts -->
                            <span class="badge badge-danger badge-counter"></span>
                        </a>
                        <!-- Dropdown - Carts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="cartsDropdown">
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                <?php endif ?>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <?php if (!$this->session->userdata('email')) : ?>
                        <div class="d-inline-flex">
                            <a class="nav-link" href="<?= base_url('registration'); ?>" id="" role="button">
                                <span class="mr-2 d-none d-lg-inline <?= ($this->session->userdata('role_id') == 1) ? 'text-dark' : 'text-white'; ?> small">Daftar</span>
                            </a>
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <a class="nav-link" href="<?= base_url('login'); ?>" id="" role="button">
                                <span class="mr-2 d-none d-lg-inline <?= ($this->session->userdata('role_id') == 1) ? 'text-dark' : 'text-white'; ?> small">Login</span>
                            </a>
                        </div>
                    <?php else : ?>
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline <?= ($this->session->userdata('role_id') == 1) ? 'text-dark' : 'text-white'; ?> small"><?= $user['name']; ?></span>
                            <img class="img-profile rounded-circle bg-white p-1 border-white" src="<?= base_url('assets/img/user_picture/') . $user['picture']; ?>">
                        </a>
                    <?php endif; ?>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                            Akun
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-clipboard-list fa-sm fa-fw mr-2"></i>
                            Pesanan
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->