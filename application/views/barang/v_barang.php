<div class="row m-0">
    <div class="col-md-12 pb-5">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h5 class="card-title p-1 rounded-pill bg-success">Data Barang</h5>
                <div class="card-tools">
                    <a href="<?= base_url('barang/add') ?>" class="btn btn-success btn-sm">
                        add
                    </a>
                    <button type="button" class="btn btn-success" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?php
                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5>Sukses ';
                    echo $this->session->flashdata('pesan');
                    echo ' </h5></div>';
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-condensed table-sm table-hover" id="example1">
                        <thead class="text-center bg-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Berat</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $no = 1;
                            foreach ($barang as $key => $value) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value->nama_barang ?></td>
                                    <td><?= $value->nama_kategori ?></td>
                                    <td>Rp. <?= number_format($value->harga, 0) ?></td>
                                    <td><?= $value->berat ?></td>
                                    <td><?= $value->deskripsi ?></td>
                                    <td><img src="<?= base_url('assets/img/produk/' . $value->gambar) ?>" alt="gambars" width="55px" height="50px"></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('barang/edit') ?>" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
                                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_barang ?>"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($barang as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_barang ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->nama_barang ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Ingin Dihapus?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="<?= base_url('barang/delete/' . $value->id_barang) ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>