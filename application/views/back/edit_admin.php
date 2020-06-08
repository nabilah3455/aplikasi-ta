<div class="row">
    <div class="col-12">
        <h3>{judul}</h3>
        <div class="card">
            <div class="card-body" style="color: black;">
                <?= form_open_multipart('user/update_admin');  ?>
                {items}
                <div class="row">
                    <div class="col">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="{nama}" placeholder="Nama Lengkap" required>
                        <input type="hidden" class="form-control" name="id" value="{id}" placeholder="" required>
                    </div>
                    <div class="col">
                        <label>Username</label>
                        <input type="text" class="form-control" value="{username}" name="username" placeholder="Username" readonly>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="" placeholder="Password" maxlength="8" >
                    </div>
                    <div class="col">
                        <label>Jenis Kelamin</label><br>
                        <select class="form-control" name="jk">
                            <option value="{jk}">{kelamin}</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>No. Telepon</label><br>
                        <input type="text" name="telepon" value="{no_tlp}" placeholder="Nomor Telepon" class="form-control" maxlength="11">
                    </div>
                    <div class="col">
                        <label>Alamat</label><br>
                        <input type="text" name="alamat" value="{alamat}" placeholder="Alamat" class="form-control">
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label for="image">Foto</label><br>
                        <img src=" <?= base_url('assets/images/profile/{foto}'); ?>" width="100px">
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <div class="row" style="float: right; display: block;">
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