<div class="col-md-12">
    <div class="card card-outline card-success">
        <div class="card-header">
            <h5 class="card-title p-1 rounded-pill bg-success">User Data</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add">
                    add
                </button>
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

            <table class="table table-bordered table-hover" id="example1">
                <thead class="text-center bg-gradient-light">
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_user ?></td>
                            <td><?= $value->username ?></td>
                            <td><?= $value->password ?></td>
                            <td>
                                <?php
                                if ($value->level_user == 1) {
                                    echo '<span class="badge bg-danger">Admin</span>';
                                } else {
                                    echo '<span class="badge bg-success">User</span>';
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_user ?>"><i class="fas fa-pen"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_user ?>"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Data Pelanggan -->
    <div class="card card-outline card-success pb-5">
        <div class="card-header">
            <h5 class="card-title p-1 rounded-pill bg-primary">Data Pelanggan</h5>
            <div class="card-tools">
                <button type="button" class="btn btn-success" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <?php
            if ($this->session->flashdata('pesan_pelanggan')) {
                echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5>Sukses ';
                echo $this->session->flashdata('pesan_pelanggan');
                echo ' </h5></div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="example1">
                    <thead class="text-center bg-gradient-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $no = 1;
                        foreach ($pelanggan as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value->nama_pelanggan ?></td>
                                <td><?= $value->email ?></td>
                                <td><?= $value->password ?></td>
                                <td>
                                    <img src="<?php echo base_url('assets/img/foto/' . $value->foto) ?>" alt="fotopelanggan" width="30px" height="25px">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_pelanggan<?= $value->id_pelanggan ?>"><i class="fas fa-pen"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_pelanggan<?= $value->id_pelanggan ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal add User-->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('user/add');
                ?>
                <div class="form-group">
                    <label for="#">Nama User</label>
                    <input type="text" class="form-control" name="nama_user" id="" placeholder="Masukan Nama" required>
                </div>
                <div class="form-group">
                    <label for="#">username</label>
                    <input type="text" class="form-control" name="username" id="" placeholder="Masukan Username" required>
                </div>
                <div class="form-group">
                    <label for="#">password</label>
                    <input type="text" class="form-control" name="password" id="" placeholder="Masukan Password" required>
                </div>
                <div class="form-group">
                    <label for="#">Level User</label>
                    <select class="form-control" name="level_user">
                        <option value="1" selected>Admin</option>
                        <option value="2">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>
<!-- Modal Edit -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('user/edit/' . $value->id_user);
                    ?>
                    <div class="form-group">
                        <label for="#">Nama User</label>
                        <input type="text" class="form-control" name="nama_user" id="" value="<?= $value->nama_user ?>" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="#">username</label>
                        <input type="text" class="form-control" name="username" id="" value="<?= $value->username ?>" placeholder="Masukan Username" required>
                    </div>
                    <div class="form-group">
                        <label for="#">password</label>
                        <input type="text" class="form-control" name="password" id="" value="<?= $value->password ?>" placeholder="Masukan Password" required>
                    </div>
                    <div class="form-group">
                        <label for="#">Level User</label>
                        <select class="form-control" name="level_user">
                            <option value="1" <?php if ($value->level_user == 1) {
                                                    echo 'selected';
                                                } ?>>Admin</option>
                            <option value="2" <?php if ($value->level_user == 2) {
                                                    echo 'selected';
                                                } ?>>User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- Modal Delete -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_user ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $value->nama_user ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Ingin Dihapus?</h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('user/delete/' . $value->id_user) ?>" class="btn btn-primary"><i class="fas fa-trash-alt"> Hapus</i></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Edit Pelanggan -->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="edit_pelanggan<?= $value->id_pelanggan ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pelanggan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('user/edit_pelanggan/' . $value->id_pelanggan);
                    ?>
                    <div class="form-group">
                        <label for="#">Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" id="" value="<?= $value->nama_pelanggan ?>" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="#">username</label>
                        <input type="text" class="form-control" name="email" id="" value="<?= $value->email ?>" placeholder="Masukan email" required>
                    </div>
                    <div class="form-group">
                        <label for="#">password</label>
                        <input type="text" class="form-control" name="password" id="" value="<?= $value->password ?>" placeholder="Masukan Password" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Hapus Data Pelanggan -->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="delete_pelanggan<?= $value->id_pelanggan ?>">
        <div class="modal-dialog border-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Hapus Data Pelanggan ini ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class=""> > <?= $value->nama_pelanggan ?> < </h5>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('user/delete_pelanggan/' . $value->id_pelanggan) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"> Hapus</i></a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>