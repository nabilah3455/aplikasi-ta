<div class="row">
    <div class="col-12">
        <h3>{judul}</h3>
        <div class="card">
            <div class="card-body" style="color: black;">
                <?= form_open_multipart('barang/insert');  ?>
                <div class="row">
                    <div class="col">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" placeholder="Kode Barang" required>
                    </div>
                    <div class="col">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Harga Laundry (Rp)</label>
                        <input type="text" class="form-control" name="harga_laundry" placeholder="Harga" required>
                    </div>
                    <div class="col">
                        <label>Harga Dry Clean (Rp)</label>
                        <input type="text" class="form-control" name="harga_dry" placeholder="Harga" required>
                    </div>
                </div>
                <div class="row" style="float: right; padding-top: 2rem; display: block;">
                    <input type="submit" name="submit" value="Tambah Barang" class="btn btn-success">
                    <a class="btn btn-warning" onclick="window.history.back();">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>