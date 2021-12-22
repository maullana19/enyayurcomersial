<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h5 class="card-title p-1 rounded-pill bg-success">Data Gambar Barang</h5>
            <div class="card-tools">
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
            <table class="table table-bordered table-sm table-hover" id="example1">
                <thead class="text-center bg-gradient-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Cover</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($gambarbarang as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_barang ?></td>
                            <td class="text-center"><img src="<?= base_url('assets/img/produk/' . $value->gambar) ?>" alt="gmb" width="80px"></td>
                            <td class="text-center"><span class="badge bg-success"><?= $value->total_gambar ?></span></td>
                            <td class="text-center">
                                <a href="<?= base_url('gambarbarang/add/' . $value->id_barang) ?>" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> add</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>