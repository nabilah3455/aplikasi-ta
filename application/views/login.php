<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets'); ?>/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>
<style>
    body {
        /* background-image: url('assets/images/big/bg.jpg'); */
        background-size: 100%;
        /* background-color: white; */
    }

    .card {
        /* background-color: rgba(255, 255, 255, 0.8); */
        color: black;
        background-color: white;
        box-shadow: 10rem;
    }

    .store {
        text-align: center;
        font-size: 20px;
        padding-bottom: 2rem;
    }

    .register{
        text-align: center;
        padding-top: 10px;
        text-decoration: underline;
    }
</style>

<body>
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="form-input-content col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="store">
                                <b>Pelayanan Laundry Prima Lestari</b>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <form class="login-input" action="<?= base_url('login'); ?>" method="POST">
                                <div class="form-group">
                                    <label>Masukan Username</label>
                                    <input type="username" class="form-control" name="username" placeholder="Username" style="background-color:#ededed; color: black;" value="<?= set_value('username'); ?>" required />
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Masukan Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" style="background-color:#ededed; color: black;" required />
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button class="btn btn-primary col-lg-12">Login</button>
                            </form>
                            <div class="register">
                                <a href="<?= base_url('login/register'); ?>" class="text-center">Register Akun Kostumer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('assets/'); ?>plugins/common/common.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/settings.js"></script>
    <script src="<?= base_url('assets/'); ?>js/gleek.js"></script>
    <script src="<?= base_url('assets/'); ?>js/styleSwitcher.js"></script>
</body>

</html>