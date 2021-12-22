<section class="content m-0 p-3">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Akun Profil Mu</h3>

            <div class="card-tools">
                <a href="<?= base_url('home') ?>">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Pembelian Mu</span>
                                    <span class="info-box-number text-center text-muted mb-0">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Promo Yang Didapatkan</span>
                                    <span class="info-box-number text-center text-muted mb-0">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Total Ongkirmu</span>
                                    <span class="info-box-number text-center text-muted mb-0">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Setting</h4>
                            <!--Edit User-->
                            <?php foreach ($pelanggan as $key => $value) { ?>
                                <?php
                                echo form_open('user/edit_pelanggan/' . $value->id_pelanggan);
                                ?>
                                <div class="post">
                                    <label>Foto : </label>
                                    <img name="foto" src="<?= $value->foto ?>" alt="User Avatar" width="100px" height="90px" class="img-circle">
                                    <br>
                                    <label>Nama</label>
                                    <input name="nama_pelanggan" class="form-control" value="<?= $value->nama_pelanggan ?>" required>
                                    <br>
                                    <label>Email</label>
                                    <input name="email" class="form-control" value="<?= $value->email ?>" required>
                                    <br>
                                    <label>Password</label>
                                    <input name="password" class="form-control" value="<?= $value->password ?>" required>
                                    <br>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                                <?php
                                echo form_close();
                                ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-success"><i class="fas fa-paint-brush"></i> Here You</h3>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Foto Profil</th>
                                <th>:</th>
                                <th><img src="<?= base_url('assets/img/foto/' . $this->session->userdata('foto')) ?>" alt="User Avatar" width="100px" height="90px" class="img-circle"></th>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th><?= $this->session->userdata('nama_pelanggan'); ?></th>
                            </tr>
                            <tr>
                                <th>email</th>
                                <th>:</th>
                                <th><?= $this->session->userdata('email'); ?></th>
                            </tr>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>