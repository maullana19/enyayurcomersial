<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h5 class="card-title p-1 rounded-pill bg-success">add Gambar Barang : <?= $barang->nama_barang ?></h5>
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
            <?php
            // Notifikasi Kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-info"></i>', '</h5> </div>');
            // Notifikasi Gagal Upload
            if (isset($error_upload)) {
                echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5> </div>';
            }
            echo form_open_multipart('gambarbarang/add/' . $barang->id_barang) ?>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Ket Gambar</label>
                        <input name="ket" class="form-control" placeholder="Keterangan gambar" value="<?= set_value('ket') ?>">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Upload Gambar</label>
                        <br>
                        <input type="file" id="preview_gambar" name="gambar" class="p-0" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <img src="<?= base_url('assets/img/noimage.png') ?>" id="gambar_load" alt="img" width="150px">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <button type="submit" class="btn btn-danger shadow-sm">Save</button>
                <a href="<?= base_url('gambarbarang') ?>" class="btn shadow-sm btn-light">Back</a>
            </div>

            <?php echo form_close() ?>
            <hr>
            <div class="row">
                <?php foreach ($gambar as $key => $value) { ?>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <img src="<?= base_url('./assets/img/gambarbarang/' . $value->gambar) ?>" alt="img" width="130px" height="120px">
                        </div>
                        <p>ket : <?= $value->ket ?></p>
                        <button class="btn btn-block btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>"><i class="fas fa-trash"></i> Delete</button>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<?php foreach ($gambar as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_gambar ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus <?= $value->ket ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center">
                        <img src="<?= base_url('/assets/img/gambarbarang/' . $value->gambar) ?>" alt="img" width="130px" height="120px">
                    </div>
                    <h5>Ingin Dihapus?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="<?= base_url('gambarbarang/delete/' . $value->id_barang . '/' . $value->id_gambar) ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Load Gambar -->
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
    });
</script>