<style>
    h3 {
        color: white;
    }
</style>

<!-- Header section -->
<header class="header-section clearfix">
    <a href="#" class="site-logo">
        <!-- <img src="<?= base_url('assets'); ?>/front/img/logo.png" alt=""> -->
        <h3>Laundry & DRY CLEAN</h3>
    </a>
    <?php if (is_null($this->session->userdata('username'))) { ?>
        <div class="header-right">
            <a href="<?= base_url('login') ?>" class="hr-btn">Login</a>
            <span>|</span>
            <div class="user-panel">
                <a href="<?= base_url('login/register') ?>" class="register">Create an account</a>
            </div>
        </div>
    <?php } else { ?>
        <div class="header-right">
            <a href="<?= base_url('konsumen/profil') ?>" class="register">Profil</a>
            <span>|</span>
            <div class="user-panel">
                <a href="<?= base_url('login/logout_konsumen') ?>" class="register">Logout</a>
            </div>
        </div>
    <?php } ?>
    <ul class="main-menu">
        <li><a href="<?= base_url('konsumen'); ?>">Home</a></li>
        <li><a href="<?= base_url('konsumen/pesanan'); ?>">History</a></li>
        <!-- <li><a href="#">Pages</a>
            <ul class="sub-menu">
                <li><a href="category.html">Category</a></li>
                <li><a href="playlist.html">Playlist</a></li>
                <li><a href="artist.html">Artist</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </li> -->
        <!-- <li><a href="<?= base_url('konsumen/kontak') ?>">Contact</a></li> -->
    </ul>
</header>
<!-- Header section end -->