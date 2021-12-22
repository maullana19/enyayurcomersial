<div class="container mt-5 p-0">
    <div class="card">
        <div class="card-body register-card-body">
            <div class="row p-0">
                <div class="col-sm-6 elevation-2 bg-olive">
                    <img src="<?= base_url('assets/img/vegetables7.jpg') ?>" class="img-fluid ">
                </div>
                <div class="col-sm-6 p-5">
                    <h4 class="login-box-msg text-success">LOGIN</h4>
                    <?php

                    echo validation_errors('<div class=" alert rounded-0 alert-danger alert-dismissible"><h5><i class="icon fas fa-info"></i>', '</h5> </div>');

                    if ($this->session->flashdata('pesan')) {
                        echo '<div class="alert alert-success alert-dismissible"
                        <h5><i class="icon fas fa-check"></i></h5>';
                        echo $this->session->flashdata('pesan');
                        echo '</div>';
                    };

                    if ($this->session->flashdata('error')) {
                        echo '<div class="alert alert-danger alert-dismissible"
                        <h5><i class="icon fas fa-check"></i></h5>';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                    };

                    echo form_open('pelanggan/login'); ?>
                    <div class="input-group mb-3">
                        <input name="email" value="<?= set_value('email') ?>" type="email" class="form-control border border-success" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text border border-success">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control border border-success" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text border bg-light border-success">
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
                        <div class="col-4">
                            <button type="submit" class="btn btn-success rounded-1 btn-block">Login</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
            <a href="<?= base_url('pelanggan/register') ?>" class="float-right">Belum Punya akun</a>
            <a href="<?= base_url('auth/login_user') ?>" class="float-right mr-4 text-success">Login Admin</a>
        </div>
    </div>
</div>