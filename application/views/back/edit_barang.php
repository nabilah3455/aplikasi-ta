<div class="row">
    <div class="col-12">
        <h3>{judul}</h3>
        <div class="card">
            <div class="card-body" style="color: black;">
                <?= form_open_multipart('barang/update');  ?>
                <?php foreach ($items as $i) { ?>
                    <div class="row">
                        <div class="col">
                            <label>Kode Barang</label>
                            <input type="text" class="form-control" name="kode_barang" value="<?= $i['kode_barang'] ?>" placeholder="Kode Barang" readonly>
                        </div>
                        <div class="col">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" value="<?= $i['nama_barang'] ?>" placeholder="Nama Barang" required>
                        </div>
                    </div>
                    <?php if ($i['kode_barang'] != '78') { ?>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col">
                                <label>Harga Laundry (Rp)</label>
                                <input type="text" class="form-control" name="harga_laundry" value="<?= $i['hrg_laundry'] ?>" placeholder="Harga" required>
                            </div>
                            <div class="col">
                                <label>Harga Dry Clean (Rp)</label>
                                <input type="text" class="form-control" name="harga_dry" value="<?= $i['hrg_dryclean'] ?>" placeholder="Harga" required>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row" style="padding-top: 1rem;">
                            <div class="col">
                                <label>Harga Cuci (Rp)</label>
                                <input type="text" class="form-control" name="harga_laundry" value="<?= $i['hrg_laundry'] ?>" placeholder="Harga" required>
                            </div>
                            <div class="col">
                                <!-- <label>Harga Dry Clean (Rp)</label>
                                <input type="text" class="form-control" name="harga_dry" value="<?= $i['hrg_dryclean'] ?>" placeholder="Harga" required> -->
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row" style="float: right; padding-top: 2rem; display: block;">
                        <input type="submit" name="submit" value="Edit" class="btn btn-success">
                        <a class="btn btn-warning" onclick="window.history.back();">Cancel</a>
                    </div>
                <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>