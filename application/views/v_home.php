<div class="row m-0">
    <div class="col-sm-8">
        <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?= base_url('assets/img/banner/banner1.jpeg') ?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src=" <?= base_url('assets/img/banner/enyayurposter2.png') ?>" alt="Second slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon " aria-hidden="true">
                        <i class="fas fa-arrow-alt-circle-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-4 p-3">
        <div class="card rounded-0 m-auto" style="width: 18rem;">
            <img src="<?= base_url('assets/img/petaniindonesia1.jpg') ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">Petani Hebat adalah petani yang banyak memberikan manfaat serta kerja kerasnya kepada indonesia </p>
            </div>
        </div>
    </div>
</div>
<div class="row m-0">
    <div class="col-sm-12">
        <section class="content">
            <div class="card card-solid" style="background-color:#a0d468;">
                <div class="card-body pb-0">
                    <div class="row">
                        <?php foreach ($barang as $key => $value) { ?>
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <?php
                                echo form_open('belanja/add');
                                echo form_hidden('id', $value->id_barang);
                                echo form_hidden('qty', 1);
                                echo form_hidden('price', $value->harga);
                                echo form_hidden('name', $value->nama_barang);
                                echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                                ?>
                                <div class="card bg-white rounded-0 d-flex flex-fill">
                                    <div class="card-body pt-3">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead text-capitalize"><b><?= $value->nama_barang ?></b></h2>
                                                <hr>
                                                <p class="text-success text-sm"><b>Kategori: </b> <?= $value->nama_kategori ?> </p>
                                                <small class="text-success">Berat : <?= $value->berat ?>/gr</small>
                                                <hr>
                                                <small class="text-success">Oleh Petani Profesional <i class="fas fa-thumbs-up"></i></small>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="<?= base_url('assets/img/produk/' . $value->gambar) ?>" alt="produk-image" width="140px" height="130px">
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
                                                    <a href="<?= base_url('home/detail_barang/' . $value->id_barang) ?>" class="btn btn-outline-success">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-success swalDefaultSuccess">
                                                        <i class="fas fa-cart-plus"></i> Tambahkan
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
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
    </div>
</div>

<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: ' Sayur Sudah Masuk Keranjang'
            })
        });
    });
</script>