<style>
    .row {
        color: black;
    }

    .menu {
        float: right;
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
                    <?php foreach ($items as $i) { ?>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Nomor Seri</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="no_seri" value="<?= $i['no_seri'] ?>" placeholder="Nomor Seri" readonly>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Tanggal Masuk</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="date" class="form-control" name="masuk" value="<?= $i['masuk'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Telephone</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="tlp" value="<?= $i['tlp'] ?>" placeholder="nomor telephone" maxlength="12" readonly>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Nama Konsumen</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="nama_konsumen" value="<?= $i['nama_konsumen'] ?>" placeholder="Nama Konsumen" required>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Antar Pesanan?</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="antar" value="<?= $i['antar'] ?>" placeholder="Nama Konsumen" readonly>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col-lg-4" style="padding-top: 1rem;">
                                <label>Alamat Konsumen</label>
                                <label for="" style="color: red;">*</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="alamat" value="<?= $i['alamat'] ?>" placeholder="Alamat" readonly>
                            </div>
                        </div>
                    <?php } ?>
            </div>
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
                    </div>
                    <div class="col-lg-6">
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
                    </div>
                    <div class="col-lg-6">
                        <input type="number" name="jml_barang" placeholder="0" class="form-control" style="width: 40%;" required>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-4" style="padding-top: 1rem;">
                        <label>Cuci</label>
                    </div>
                    <div class="col-lg-7" style="width: 5cm; padding-top: 1rem;">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="radio" name="cuci" value="laundry" class="form"> Laundry
                            </div>
                            <div class="col-lg-6">
                                <input type="radio" name="cuci" value="dry"> Dry Clean
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="menu">
                    <input type="submit" name="submit" value="Tambah Pesanan" class="btn btn-success">
                    <a href="<?= base_url('pesanan/bayar'); ?>?no_seri={seri}" class="btn btn-primary">Bayar</a>
                </div>
            </div>
        </div>
    </div>
    </form>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    List Pesanan
                </div>
                <div class="table-responsive" style="color: black;">
                    <table class="table table-striped table-bordered zero-configuration" style="color: black;" width="140%">
                        <thead>
                            <tr align="center">
                                <th width="1px">No.</th>
                                <th width="30px">Nomor Seri</th>
                                <th width=500px>Jenis Barang</th>
                                <th width="1px">Jumlah</th>
                                <th width=10px>Cuci</th>
                                <th width="20px">Harga</th>
                            </tr>
                            <tbody>
                                <?php $no=1; foreach($pesanan as $p){?>
                                <tr>
                                    <td align="center"><?= $no ?></td>
                                    <td><?= $p['no_seri'] ?></td>
                                    <td><?= $p['nama_barang'] ?></td>
                                    <td align="center"><?= $p['jml_barang'] ?></td>
                                    <td><?= $p['cuci'] ?></td>
                                    <td align="center">Rp. <?= $p['total'] ?></td>
                                </tr>
                                <?php $no++; } ?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>