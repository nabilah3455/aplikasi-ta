<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Register Akun</title>
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
        padding-bottom: 4rem;
    }

    .register {
        text-align: center;
        padding-top: 10px;
        text-decoration: underline;
    }

    .menu{
        float: right;
    }
</style>

<body>
    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="form-input-content col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="store">
                                <b>Register Akun Konsumen</b>
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <form class="login-input" action="<?= base_url('login/register'); ?>" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Input Nama Lengkap" style="color: black;" value="<?= set_value('nama'); ?>" required />
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="username" class="form-control" name="username" placeholder="Input Username" style="color: black;" value="<?= set_value('username'); ?>" required />
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Input Password" style="color: black;" required />
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jk" id="jk" class="form-control" style="color: black;" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Telepon</label>
                                            <input type="text" class="form-control" name="tlp" placeholder="Input Nomor Telepon" style="color: black;" required />
                                            <?= form_error('tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu">
                                    <button class="btn btn-success">Register</button>
                                    <a href="<?= base_url('login')?>" class="btn btn-warning">Cancel</a>
                                </div>
                            </form>
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