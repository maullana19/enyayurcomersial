<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Enyayur | <?= $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap4/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap');

        * {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="hold-transition login-page" style="background-color: #3caea3;">
    <div class="login-box">
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="#" class="h2 text-success">
                    E-nyayur<mark class="text-secondary">.web</mark>
                    <i class="fas fa-seedling"></i>
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">HALLO ADMIN SEMANGAT UNTUK HARI INI</p>
                <?php

                if ($this->session->flashdata('error')) {
                    echo '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                    echo $this->session->flashdata('error');
                    echo '</div>';
                };

                if ($this->session->flashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i>Logout Sukses</h5>';
                    echo $this->session->flashdata('pesan');
                    echo '</div>';
                };

                echo form_open('auth/login_user');
                ?>
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url() ?>" class="btn rounded-0 btn-block btn-success">enyayur-mall</a>
                    </div>

                    <div class="col-6">
                        <button type="submit" class="btn btn-block rounded-0" style="background-color:#99b890">Login</button>
                    </div>
                </div>
                <?php echo form_close() ?>

                <hr>

                <p class="mb-1">
                    <a href="#" class="text-success">Saya Lupa Password</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('pelanggan/register') ?>" class=" text-decoration-underline">Daftar Disini !</a>
                </p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/template/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/template/dist/js/adminlte.min.js"></script>

    <!-- NotifFade -->
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000)
    </script>
</body>

</html>