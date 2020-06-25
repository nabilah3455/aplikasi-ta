    <style>
        .hs-item {
            background-image: url('assets/images/big/dry.jpg');
            background-size: 100%;
        }

        .button {
            padding-top: 1rem;
            float: right;
        }
    </style>
    <!-- Modal -->
    <div class="bootstrap-modal">
        <div class="modal fade" id="basicModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <h5 class="modal-title"></h5> -->
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color: black">
                        <form action="<?= base_url('konsumen/cari'); ?>" method="GET">
                            <center>
                                <h5 style="padding-bottom: 2rem;">Masukkan Nomor Telepon atau Nomor Seri Pesanan</h5>
                            </center>
                            <input type="text" class="form-control" name="kode" id="kode" placeholder="Input Here ...">
                            <div class="button">
                                <input type="submit" name="submit" class="btn btn-success" value="Cari Pesanan">
                                <button class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            <div class="hs-item">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hs-text">
                                <h2><span>Cari Pesananmu</span></h2>
                                <p style="color: black;">Lihat Riwayat dan Status Pesananmu Disini</p>
                                <a href="#" class="site-btn sb-c2" data-toggle="modal" data-target="#basicModal">Cari Pesanan</a>
                            </div>
                        </div>
                        <!-- <div class="col-lg-6">
                            <div class="hr-img">
                                <!-- <img src="<?= base_url('assets'); ?>/front/img/hero-bg.png" alt=""> -->
                    </div>
                </div> -->
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Intro section -->
    <section class="intro-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <img src="<?= base_url('assets/images/media/laundry.png') ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Bisnis Laundry dan Dry Clean ini sudah berjalan sejak tahun 2017 dan sudah menerima pesanan lebih dari 1000 pesanan.
                        Toko Laundry ini berada di Puri Bukit Depok Jl. Menteng III Rt. 04 Rw. 10 No. 18, nomor telepon 0878 8135 6214. 
                        Kami menerima Pesanan setiap hari dari pukul 09.00 - 21.11 WIB.
                    </p>
                    <!-- <a href="#" class="site-btn">Try it now</a> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Intro section end -->

    <!-- How section -->
    <section class="how-section spad set-bg" data-setbg="<?= base_url('assets'); ?>/front/img/how-to-bg.jpg">
        <div class="container text-white">
            <div class="section-title">
                <h2>Cuci Pakaian Kotormu</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="<?= base_url('assets'); ?>/images/media/icons8-t-shirt-50.png" alt="" width="45">
                        </div>
                        <h4>Berikan Pakaianmu Ke Pengelola</h4>
                        <p>Akan kami data pakaian kotormu sesuai dengan urutan pesanan masuk.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="<?= base_url('assets'); ?>/images/media/icons8-washing-machine-64.png" alt="" width="45">
                        </div>
                        <h4>Kami Cuci Pakaianmu</h4>
                        <p>Waktu yang dibutuhkan dalam mencuci pakaian sekitar 2-3 jam tergantung jenis pakaiannya. </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="how-item">
                        <div class="hi-icon">
                            <img src="<?= base_url('assets'); ?>/front/img/icons/smartphone.png" alt="" >
                        </div>
                        <h4>Notifikasi Status Pesanan</h4>
                        <p>Konsumen akan menerima notifikasi langsung ke <i>WhatsApp</i> setiap status pesanan di update dari dicuci, disetrika, siap diambil dan akan diantar. </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How section end -->

    <!-- Concept section -->
    <section class="concept-section" style="padding-top: 2rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title">
                        <img src="<?= base_url('assets/images/media/delivery1.jpg')?>" alt="" width="370">
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
    </section>
    <!-- Concept section end -->

    <!-- Subscription section -->
    <!-- <section class="subscription-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sub-text">
                        <h2>Subscription from $15/month</h2>
                        <h3>Start a free trial now</h3>
                        <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#" class="site-btn">Try it now</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="sub-list">
                        <li><img src="<?= base_url('assets'); ?>/front/img/icons/check-icon.png" alt="">Play any track</li>
                        <li><img src="<?= base_url('assets'); ?>/front/img/icons/check-icon.png" alt="">Listen offline</li>
                        <li><img src="<?= base_url('assets'); ?>/front/img/icons/check-icon.png" alt="">No ad interruptions</li>
                        <li><img src="<?= base_url('assets'); ?>/front/img/icons/check-icon.png" alt="">Unlimited skips</li>
                        <li><img src="<?= base_url('assets'); ?>/front/img/icons/check-icon.png" alt="">High quality audio</li>
                        <li><img src="<?= base_url('assets'); ?>/front/img/icons/check-icon.png" alt="">Shuffle play</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Subscription section end -->

    <!-- Premium section end -->
    <!-- <section class="premium-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Why go Premium</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="<?= base_url('assets'); ?>/front/img/premium/1.jpg" alt="">
                        <h4>No ad interruptions </h4>
                        <p>Consectetur adipiscing elit</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="<?= base_url('assets'); ?>/front/img/premium/2.jpg" alt="">
                        <h4>High Quality</h4>
                        <p>Ectetur adipiscing elit</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="<?= base_url('assets'); ?>/front/img/premium/3.jpg" alt="">
                        <h4>Listen Offline</h4>
                        <p>Sed do eiusmod tempor </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="premium-item">
                        <img src="<?= base_url('assets'); ?>/front/img/premium/4.jpg" alt="">
                        <h4>Download Music</h4>
                        <p>Adipiscing elit</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Premium section end -->