<div class="row">
    <div class="col-12">
        <h3>{judul}</h3>
        <div class="card">
            <div class="card-body" style="color: black;">
                <?= form_open_multipart('user/update');  ?>
                {items}
                <div class="row">
                    <div class="col">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="{nama}" placeholder="Nama Lengkap" required>
                        <input type="hidden" class="form-control" name="id" value="{id}" placeholder="" required>
                    </div>
                    <div class="col">
                        <label>Username</label>
                        <input type="text" class="form-control" value="{username}" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{email}" placeholder="email" required>
                    </div>
                    <div class="col">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="{password}" placeholder="Password" maxlength="8" required>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Jenis Kelamin</label><br>
                        <select class="form-control" name="jk">
                            <option value="{jk}">{kelamin}</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>No. Telepon</label><br>
                        <input type="text" name="telepon" value="{telepon}" placeholder="Nomor Telepon" class="form-control" maxlength="11">
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col">
                        <label>Alamat</label><br>
                        <input type="text" name="alamat" value="{alamat}" placeholder="Alamat" class="form-control">
                    </div>
                    <div class="col">
                        <label for="image">Foto</label><br>
                        <img src=" <?= base_url('assets/images/profile/{foto}'); ?>" width="100px">
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