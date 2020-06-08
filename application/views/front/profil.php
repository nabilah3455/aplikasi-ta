<style>
    .data {
        padding: 3rem 7rem;
    }

    .judul {
        font-size: 30px;
    }

    .picture {
        box-shadow: 5px 5px 7px 1px #f8f3eb;
        border-radius: 50%;
        width: 200px;
        height: 200px;
    }

    .profil {
        padding-top: 2rem;
    }

    .profil :read-only {
        background-color: white;
        cursor: auto;
    }

    .edit_btn {
        width: 100%;
    }

    .edit, .button{
        padding-top: 1rem;
    }
</style>

<div class="data">
    <div class="row">
        <div class="col-lg-12">
            <div class="judul">
                <b>Profil Konsumen</b>
                <hr>
            </div>
        </div>
        <div class="col-lg-3">
            <img src="<?= base_url('assets') ?>/images/user/{foto}" alt="no-image" class="picture">
        </div>
        <div class="col-lg-8">
            <?php foreach ($items as $i) { ?>
                <div class="row">
                    <div class="col-lg-6 profil">
                        <label for="">Nama Konsumen</label>
                        <input type="text" name="" id="" value="<?= $i['nama'] ?>" class="form-control" readonly>
                    </div>
                    <div class="col-lg-6 profil">
                        <label for="">Username</label>
                        <input type="text" name="" id="" value="<?= $i['username'] ?>" class="form-control" readonly>
                    </div>
                    <div class="col-lg-6 profil">
                        <label for="">Jenis Kelamin</label>
                        <input type="text" name="" id="" value="<?= $i['kelamin'] ?>" class="form-control" readonly>
                    </div>
                    <div class="col-lg-6 profil">
                        <label for="">Nomor Telepon</label>
                        <input type="text" name="" id="" value="<?= $i['no_tlp'] ?>" class="form-control" readonly>
                    </div>
                    <div class="col-lg-6 profil">
                        <label for="">Alamat</label>
                        <!-- <input type="text" name="" id="" value="<?= $i['alamat'] ?>" class="form-control" readonly> -->
                        <textarea name="" id="" cols="30" rows="3" class="form-control" readonly><?= $i['alamat'] ?></textarea>
                    </div>
                    <div class="col-lg-6 profil">
                        <label for="">Create On</label>
                        <input type="text" name="" id="" value="<?= $i['create_on'] ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="" style="padding-top: 1rem;">
                    <button class="btn btn-success edit_btn" data-toggle="modal" data-target="#edit">Edit Profile</button>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="bootstrap-modal">
    <div class="modal fade" id="edit">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black">
                    <?= form_open_multipart('konsumen/update_profil');?> 
                    <?php foreach ($items as $i) { ?>
                        <label for="">Nama Konsumen</label>
                        <input type="text" name="nama" id="nama" value="<?= $i['nama'] ?>" class="form-control" required>

                        <label for="" class="edit">Username</label>
                        <input type="text" name="username" id="username" value="<?= $i['username'] ?>" class="form-control" required>

                        <label for="" class="edit">Password</label>
                        <input type="password" name="password" id="password" value="<?= $i['password'] ?>" class="form-control" required>

                        <label for="" class="edit">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control" required>
                            <option value="<?= $i['jk'] ?>"><?= $i['kelamin'] ?></option>
                            <option value=""></option>
                            <option value="P">Perempuan</option>
                            <option value="L">Laki-Laki</option>
                        </select>

                        <label for="" class="edit">Nomor Telepon</label>
                        <input type="text" name="no_tlp" id="no_tlp" value="<?= $i['no_tlp'] ?>" class="form-control" required>

                        <label for="" class="edit">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required><?= $i['alamat'] ?></textarea>

                        <label for="" class="edit">Foto</label><br>
                        <img src="<?= base_url('assets') ?>/images/user/<?= $i['foto'] ?>" alt="" width=100 height=100 style="border-radius: 50%;">
                        <input type="file" name="image" id="image">

                        <div class="button">
                            <input type="submit" name="submit" class="btn btn-success" value="Edit">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                </div>
            <?php } ?>
            </form>
            </div>
        </div>
    </div>
</div>