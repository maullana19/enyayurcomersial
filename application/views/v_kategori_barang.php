<section class="content">
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                <?php foreach ($barang as $key => $value) { ?>
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-white rounded-0 d-flex flex-fill">
                            <div class="card-body pt-3">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead text-capitalize"><b><?= $value->nama_barang ?></b></h2>
                                        <hr>
                                        <p class="text-success text-sm"><b>Kategori: </b> <?= $value->nama_kategori ?> </p>
                                        <hr>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="<?= base_url('assets/img/produk/' . $value->gambar) ?>" alt="user-avatar" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-left">
                                            <h4><span class="badge bg-success"><i class="fas fa-tag"></i> Rp. <?= number_format($value->harga, 0) ?></span></h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-right">
                                            <a href="#" class="btn btn-outline-success">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success">
                                                <i class="fas fa-cart-plus"></i> Tambahkan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>