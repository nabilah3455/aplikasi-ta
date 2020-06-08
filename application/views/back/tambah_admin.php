<div class="row">
    <div class="col-12">
        <h3>{judul}</h3>
        <div class="card">
            <div class="card-body" style="color: black;">
                <?= form_open_multipart('user/insert_admin');  ?>
                <div class="row">
                    <div class="col">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="col">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Usernmae" required>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" maxlength="8" required>
                    </div>
                    <div class="col">
                        <label>Jenis Kelamin</label><br>
                        <select class="form-control" name="jk">
                            <option>-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>No. Telepon</label><br>
                        <input type="text" name="telepon" placeholder="Nomor Telepon" class="form-control" maxlength="11">
                    </div>
                    <div class="col">
                        <label>Alamat</label><br>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control">
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label for="image">Foto</label><br>
                        <img src=" <?= base_url('assets/images/user/no-image.png'); ?>" width="100px">
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <div class="row" style="float: right; display: block">
                    <input type="submit" name="submit" class="btn btn-success">
                    <a class="btn btn-warning" onclick="window.history.back();">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>