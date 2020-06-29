<style>
    .row {
        color: black;
    }

    .menu {
        float: right;
    }

    .cari {
        color: blue;
        text-decoration: underline;
    }
</style>
<div class="row">
    <div class="col-6">
        <h2>Pesanan Baru</h2>
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    {judul}
                </div>
                <form action="<?= base_url('pesanan/input_pesanan'); ?>" method="POST" name="input_pesanan">
                    <div class="row" style="padding-top: 1rem;">
                        <div class="col-lg-4" style="padding-top: 1rem;">
                            <label>Nomor Seri</label>
                            <label for="" style="color: red;">*</label>
                        </div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" name="no_seri" value="<?= $no_seri ?>" placeholder="Nomor Seri" readonly>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 1rem;">
                        <div class="col-lg-4" style="padding-top: 1rem;">
                            <label>Tanggal Masuk</label>
                            <label for="" style="color: red;">*</label>
                        </div>
                        <?php foreach ($tanggal as $k) { ?>
                            <div class="col-lg-7">
                                <input type="date" class="form-control" name="masuk" value="<?= $k['tanggal'] ?>" required>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($konsumen == null) { ?>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Telephone</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="tlp" placeholder="nomor telepon" maxlength="12">
                                <a href="#" class="cari" data-toggle="modal" data-target="#cari_konsumen">Cari Konsumen</a>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Nama Konsumen</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="nama_konsumen" placeholder="Nama Konsumen" required>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Antar Pesanan?</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-2" style="width: 5cm; padding-top: 1rem;">
                                <input type="radio" name="antar" value="ya" required>Ya
                            </div>
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <input type="radio" name="antar" value="tidak" required>Tidak
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Alamat Konsumen</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                            </div>
                        </div>
                        <?php } else {
                        foreach ($konsumen as $i) { ?>

                            <div class="row" style="padding-top: 1rem;">
                                <div class="col-lg-4" style="padding-top: 1rem;">
                                    <label>Telephone</label>
                                    <label for="" style="color: red;">*</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="tlp" value="<?= $i['no_tlp'] ?>" placeholder="nomor telephone" maxlength="12" readonly>
                                    <a href="#" class="cari" data-toggle="modal" data-target="#cari_konsumen">Cari Konsumen</a>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 1rem;">
                                <div class="col-lg-4" style="padding-top: 1rem;">
                                    <label>Nama Konsumen</label>
                                    <label for="" style="color: red;">*</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="nama_konsumen" value="<?= $i['nama_konsumen'] ?>" placeholder="Nama Konsumen" readonly>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 1rem;">
                                <div class="col-lg-4" style="padding-top: 1rem;">
                                    <label>Antar Pesanan?</label>
                                    <label for="" style="color: red;">*</label>
                                </div>
                                <div class="col-lg-2" style="width: 5cm; padding-top: 1rem;">
                                    <input type="radio" name="antar" value="ya" required>Ya
                                </div>
                                <div class="col-lg-4" style="padding-top: 1rem;">
                                    <input type="radio" name="antar" value="tidak" required>Tidak
                                </div>
                            </div>
                            <div class="row" style="padding-top: 1rem;">
                                <div class="col-lg-4" style="padding-top: 1rem;">
                                    <label>Alamat Konsumen</label>
                                    <label for="" style="color: red;">*</label>
                                </div>
                                <div class="col-lg-7">
                                    <input type="text" class="form-control" name="alamat" value="<?= $i['alamat'] ?>" placeholder="Alamat" readonly>
                                </div>
                            </div>
                    <?php }
                    } ?>
            </div>
            <!-- <div class="card-footer">
                Sudah Pernah Mencuci Disini Sebelumnya?
            </div> -->
        </div>
    </div>

    <div class="col-lg-6" style="padding-top: 2.9rem;">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Data Barang
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-4" style="padding-top: 1rem;">
                        <label>Jenis Barang</label>
                        <label for="" style="color: red;">*</label>
                    </div>
                    <div class="col-lg-7">
                        <select class="form-control" name="jenis" required>
                            <option>--- Pilih ---</option>
                            {barang}
                            <option value="{kode_barang}">{nama_barang}</option>
                            {/barang}
                        </select>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-4" style="padding-top: 1rem;">
                        <label>Jumlah Barang</label>
                        <label for="" style="color: red;">*</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="number" name="jml_barang" placeholder="0" class="form-control" style="width: 40%;" required>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-2" style="padding-top: 1rem;">
                        <label>Cuci</label>
                        <label for="" style="color: red;">*</label>
                    </div>
                    <div class="col-lg-10" style=" padding-top: 1rem;">
                        <div class="row">
                            <div class="col-lg-4">
                                <input type="radio" name="cuci" value="laundry" class="form"> <b>Laundry</b>
                            </div>
                            <div class="col-lg-4">
                                <input type="radio" name="cuci" value="dry"> <b> Dry Clean</b>
                            </div>
                            <div class="col-lg-4">
                                <input type="radio" name="cuci" value="kiloan"> <b> Kiloan</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-4" style="padding-top: 1rem;">
                        <label>Berat Barang (Kg)</label>
                    </div>
                    <div class="col-lg-7">
                        <input type="number" name="berat" placeholder="0" class="form-control" style="width: 40%;">
                        <label for="" style="color: red; font-size: 12px;">Diisi Apabila Memilih Cuci Kiloan</label>
                    </div>
                </div>
                <hr>
                <div class="menu">
                    <input type="submit" name="submit" value="Tambah Pesanan" class="btn btn-success">
                    <a href="<?= base_url('pesanan/bayar'); ?>" class="btn btn-primary">Bayar</a>
                    <!-- <a class="btn btn-warning" onclick="window.history.back();">Cancel</a> -->
                </div>
            </div>
        </div>
    </div>
    </form>
</div>


<!-- Modal -->
<div class="bootstrap-modal">
    <div class="modal fade" id="cari_konsumen">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title">Cari Pesanan</h5> -->
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black">
                    <form action="<?= base_url('pesanan'); ?>" method="POST">
                        <center>
                            <h4>Nomor Telepon Konsumen
                        </center>
                        <input type="text" class="form-control" placeholder="08xxxxxxxxxxx" name="no_tlp" id="no_tlp">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <input type="submit" name="cari" value="Cari Konsumen" class="btn btn-success">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="bootstrap-modal">
    <div class="modal fade" id="basicModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cari Pesanan</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black">
                    <form action="<?= base_url('pesanan/cari'); ?>" method="POST">
                        <center>
                            <h4>Masukkan Nomor Telephone atau Nomor Seri
                        </center>
                        <input type="text" class="form-control" placeholder="Cari Pesanan..." name="no_seri" id="no_seri">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->