<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="color: black;">
                <div class="card-title">
                    <h3>{judul}</h3>
                </div>
                <?= form_open_multipart('pesanan/update_status');  ?>
                {items}
                <div class="row">
                    <div class="col">
                        <label>Nomor Seri</label>
                        <input type="hidden" class="form-control" name="id_pesanan" value="{id_pesanan}" placeholder="" required>
                        <input type="text" class="form-control" value="{no_seri}" name="no_seri" placeholder="no_seri" readonly>
                    </div>
                    <div class="col">
                        <label>Nama Konsumen</label>
                        <input type="text" class="form-control" name="nama_konsumen" value="{nama_konsumen}" placeholder="Nama Lengkap" readonly>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Jenis Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="{nama_barang}" placeholder="nama_barang" maxlength="8" readonly>
                    </div>
                    <div class="col">
                        <label>Jumlah Barang</label>
                        <input type="text" class="form-control" name="jml_barang" value="{jml_barang}" placeholder="jml_barang" maxlength="8" readonly>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Tanggal Masuk</label><br>
                        <input type="text" name="tgl_masuk" value="{tgl_masuk}" placeholder="Nomor Telepon" class="form-control" readonly>
                    </div>
                    <div class="col">
                        <label>Status Pesanan</label><br>
                        <select name="status" class="form-control">
                            <option value="{status}">{nama_status}</option>
                            <option value="1">Antrian</option>
                            <option value="2">Dicuci</option>
                            <option value="4">Disetrika</option>
                            <option value="5">Bisa Diambil</option>
                            <option value="7">Selesai</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="float: right; display: block; padding-top: 3rem;">
                    <input type="submit" name="submit" class="btn btn-success">
                    <a class="btn btn-warning" onclick="window.history.back();">Cancel</a>
                </div>
                {/items}
                </form>
            </div>
        </div>
    </div>
</div>

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