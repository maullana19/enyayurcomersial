<!-- Navbar -->
<nav class="main-header border-0 navbar elevation-1 navbar-expand-lg navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url('home') ?>" class="navbar-brand p-0 mb-2 d-none d-lg-block">
            <img src="<?= base_url('assets/img/logocars5.png') ?>" alt="">
        </a>

        <button class="navbar-toggler ml-auto bg-success order-3" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse order-3 p-0" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav p-0">
                <li class="nav-item d-md-none d-lg-none">
                    <a href="#" class="nav-link text-success">Enyayur.mall</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('home') ?>" class="nav-link text-success active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-success" data-toggle="modal" data-target="#modal-default">
                        Produk Petani
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-success " data-toggle="modal" data-target="#modal-pengiriman">
                        Resiko Pengiriman <i class="fas fa-box"></i>
                    </a>
                </li>
                <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-success dropdown-toggle">Kategori</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <?php foreach ($kategori as $key => $value) { ?>
                            <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Right navbar links -->
        <ul class="order-2 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- SearchBox -->
            <li class="nav-item mt-2">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group elevation-2 m-auto input-group-sm">
                            <input class="form-control bg-light form-control-navbar" name="search_text" id="search_text" type="text" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div id="result">
                        </div>
                    </form>
                </div>
            </li>
            <?php
            $keranjang = $this->cart->contents();
            $jml_item = 0;
            foreach ($keranjang as $key => $value) {
                $jml_item = $jml_item + $value['qty'];
            };
            ?>
            <li class="nav-item mt-2 dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-cart-plus"></i>
                    <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-sm">
                    <?php if (empty($keranjang)) { ?>
                        <a href="#" class="dropdown-item">
                            <img src="<?= base_url('assets/img/keranjang_kosong.png') ?>" class="img-fluid">
                            <p>Keranjangmu Kosong</p>
                        </a>
                        <?php } else {

                        foreach ($keranjang as $key => $value) {
                            $barang = $this->m_home->detail_barang($value['id']);
                        ?>
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <img src="<?= base_url('assets/img/produk/' . $barang->gambar) ?>" alt="User Avatar" class="img-size-50 mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            <?= $value['name'] ?>
                                        </h3>
                                        <p class=""><?= $value['qty'] ?> x Rp. <?= number_format($value['price'], 0) ?></p>
                                        <p>Total</p>
                                        <p class="badge bg-success float-right"><i class="fab fa-cart-plus"></i>Rp. <?= $this->cart->format_number($value['subtotal']); ?></p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        <?php } ?>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="media-body">
                                    <tr class="text-center">
                                        <td colspan="2"></td>
                                        <td class=""><strong>Total Belanja :</strong></td>
                                        <td class="">
                                            <p class="badge bg-danger">Rp.<?= $this->cart->format_number($this->cart->total()); ?></pb>
                                        </td>
                                    </tr>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('belanja') ?>" class="dropdown-item dropdown-footer bg-light">Lihat Keranjang</a>
                        <a href="#" class="dropdown-item dropdown-footer bg-s">Cek out</a>
                    <?php } ?>
                </div>
            </li>
            <li class="nav-item mt-2 mr-2 dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-sm ">
                    <span class="dropdown-header">1 Notifikasi</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> Pesan Kosong
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Notifikasi</a>
                </div>
            </li>
            <!-- User -->
            <li class="nav-item mt-2 dropdown">
                <?php if ($this->session->userdata('email') == "") { ?>
                    <a class="nav-link" href="<?= base_url('pelanggan/login') ?>" title="login">
                        <i class="fas fa-user-alt"></i>
                    </a>
                <?php } else { ?>
                    <a class="dropdown-item" data-toggle="dropdown" href="#">
                        <img src="<?= base_url('assets/img/foto/' . $this->session->userdata('foto')) ?>" alt="User Avatar" width="40px" height="35px" class="img-circle mr-2 mt-1">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"><?= $this->session->userdata('nama_pelanggan'); ?></span>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('pelanggan/akun') ?>" class="dropdown-item">
                            Akun Saya
                        </a>
                        <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item">
                            Pesanan Saya
                        </a>
                        <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item">
                            logout
                        </a>
                    </div>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>

<!--Navbar FixedBottom-->


<!-- Modal Petani Profesional -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Petani Profesional</h4>
            </div>
            <div class="modal-body bg-light d-flex">
                <div class="col-sm-6">
                    <H5>Hallo</H5>
                    <p>Petani Profesional Adalah Petani yang paham mengenai metode Hidroponik dan aquaponi beserta akuakulturnya</p>
                </div>
                <div class="col-sm-6">
                    <img src="<?= base_url('assets/img/petanilogo1.png') ?>" alt="logopetani" class="img-fluid float-right">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Resiko Pengiriman -->
<div class="modal fade" id="modal-pengiriman">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Problem Logistik</h4>
            </div>
            <div class="modal-body bg-light d-flex">
                <div class="col-sm-6">
                    <H5>Hallo</H5>
                    <p>Karena Sayuran Bersifat cepat layu jika berkurangnya kadar air didalam sayuran tsb Dalam proses perjalanan, Kami Merekomendasikan Tas Thermal Bag untuk pemesan yang berada diluar daerah kami.
                        tas tersebut bisa mempertahankan air & es dalam waktu yang lama sesuai kondisi sayuran.
                    </p>
                </div>
                <div class="col-sm-6">
                    <img src="<?= base_url('assets/img/thermalbag.jpg') ?>" alt="logopetani" class="img-fluid pad">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        function load_data($query) {
            $.ajax({
                url: "<?php echo base_url(); ?>home/fetch",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            })
        }

        $('#search_text').keyup(function() {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>