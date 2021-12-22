<div class="container mt-2 bg-white p-3">
    <div class="card border-success border">
        <div class="card-body register-card-body">
            <p class="login-box-msg"><mark class="bg-success p-1">Daftar Member Enyayur</mark></p>
            <?php

            echo validation_errors('<div class=" alert rounded-0 alert-danger alert-dismissible"><h5><i class="icon fas fa-info"></i>', '</h5> </div>');

            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible"
                        <h5><i class="icon fas fa-check"></i></h5>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            };

            echo form_open('pelanggan/register'); ?>
            <div class="input-group mb-3">
                <input type="text" name="nama_pelanggan" value="<?= set_value('nama_pelanggan') ?>" class="form-control border-success" placeholder="Nama Pelanggan">
                <div class="input-group-append">
                    <div class="input-group-text border-success">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input name="email" value="<?= set_value('email') ?>" type="email" class="form-control border-success" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text border-success">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input name="password" type="password" class="form-control border-success" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text border-success">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input name="ulangi_password" type="password" class="form-control border-success" placeholder="Ulangi Password">
                <div class="input-group-append">
                    <div class="input-group-text border-success">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                            Saya setuju <a href="#">syarat & Ketentuan</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-outline-success rounded-0 btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo form_close() ?>
            <a href="<?= base_url('pelanggan/login') ?>" class="text-center">Saya Sudah Punya akun</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>