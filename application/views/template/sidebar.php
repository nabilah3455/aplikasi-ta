<!--**********************************
            Sidebar start
        ***********************************-->

<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#basicModal"><i class="mdi mdi-magnify"></i> Cari Pesanan</button>
            </li>
            <!-- <li>
                <a class="" href="http://api.whatsapp.com/send?phone=6285780268522&text=Hallo%20Admin" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">contoh ke wa</span>
                </a>
            </li> -->
            <li>
                <a class="" href="<?php echo base_url('pesanan'); ?>" aria-expanded="false">
                    <i class="fa fa-plus"></i><span class="nav-text">Tambah Pesanan</span>
                </a>
            </li>
            <li>
                <a class="" href="<?php echo base_url('dashboard'); ?>" aria-expanded="false">
                    <i class="fa fa-home"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-users"></i> <span class="nav-text">Data User</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href=" <?= base_url('user/admin'); ?>"><i class="fa fa-user"></i>Admin</a></li>
                    <li><a href="<?= base_url('user'); ?>"><i class="fa fa-user"></i>Konsumen</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-shopping-cart"></i> <span class="nav-text">Data Pesanan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href=" <?= base_url('pesanan/antrian'); ?>"><i class="fa fa-file"></i>Dalam Antrian</a></li>
                    <li><a href="<?= base_url('pesanan/cuci'); ?>"><i class="fa fa-file"></i>Dicuci</a></li>
                    <li><a href="<?= base_url('pesanan/setrika '); ?>"><i class="fa fa-file"></i>Di Setrika</a></li>
                    <li><a href="<?= base_url('pesanan/ambil'); ?>"><i class="fa fa-file"></i>Bisa diambil/Diantar</a></li>
                    <li><a href="<?= base_url('pesanan/selesai '); ?>"><i class="fa fa-file"></i>Selesai</a></li>
                </ul>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fa fa-book"></i> <span class="nav-text">Laporan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href=" <?= base_url('laporan'); ?>"><i class="fa fa-file"></i>Laporan Pesanan Masuk</a></li>
                    <!-- <li><a href="<?= base_url('pesanan/cuci'); ?>"><i class="fa fa-user"></i>Dicuci</a></li> -->
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->