<div class="row">
    <div class="col-12">
        <h3>{judul}</h3>
        <div class="card">
            <div class="card-body" style="color: black;">
                <?= form_open_multipart('barang/update');  ?>
                {items}
                <div class="row">
                    <div class="col">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" value="{kode_barang}" placeholder="Kode Barang" required>
                    </div>
                    <div class="col">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="{nama_barang}" placeholder="Nama Barang" required>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" value="{stok}" placeholder="Stok" required>
                    </div>
                    <div class="col">
                        <label>Harga (Rp)</label>
                        <input type="text" class="form-control" name="harga" value="{harga}" placeholder="Harga" required>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Deskripsi</label><br>
                        <input type="text" name="deskripsi" value="{deskripsi}" placeholder="Masukkan deskripsi produk" class="form-control"></input>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label for="image">Foto Produk</label><br>
                        <img src=" <?= base_url('assets/images/barang/{gambar}'); ?>" width="100px">
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <div class="row" style="float: right; padding-top: 2rem;">
                    <input type="submit" name="submit" class="btn btn-success">
                    <a class="btn btn-warning" onclick="window.history.back();">Cancel</a>
                </div>
                {/items}
                </form>
            </div>
        </div>
    </div>
</div>