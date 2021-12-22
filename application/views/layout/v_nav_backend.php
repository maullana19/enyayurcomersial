<aside class="main-sidebar sidebar-light-dark elevation-2">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-transparent">
        <img src="<?= base_url('assets/img/newlogoenyayur.png') ?>" alt="logoEnyayur" class="brand-image img-circle elevation-1" style="opacity: .8">
        <span class="brand-text font-weight-light">Enyayur</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/template/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-1" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('nama_user'); ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('admin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' and $this->uri->segment(2) == '') echo "active"; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="<?= base_url('kategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'kategori') echo "active"; ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            KATEGORI
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('barang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'barang') echo "active"; ?>">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            PRODUK SAYUR
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('gambarbarang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'gambarbarang') echo "active"; ?>">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            GAMBAR BARANG
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pesanan_masuk') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pesanan_masuk' and $this->uri->segment(1) == 'admin') echo "active"; ?>">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            PESANAN MASUK
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'user') echo "active"; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            DATA USER
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/setting_lokasi') ?>" class="nav-link <?php if ($this->uri->segment(4) == 'admin') echo "active"; ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            SETTING
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout_user') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            LOGOUT
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>