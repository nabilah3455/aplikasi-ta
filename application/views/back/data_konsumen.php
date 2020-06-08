<style>
    .tambah {
        float: right;
    }

    .scroll {
        overflow-x: auto;
        width: 100%;
    }

    .lebar {
        width: 1020px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="card scroll">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="">{judul}</h3>
                </div>
                <div class="col-lg-6">
                    <div class="tambah">
                        <!-- <a href="{tambah}" class="btn mb-1 btn-rounded btn-outline-primary"><i class="fa fa-plus"></i> Data Admin</a> -->
                    </div>
                </div>
            </div>
            <div class="table-responsive lebar" style="color: black;">
                <table class="table table-striped table-bordered zero-configuration" style="color: black;">
                    <thead>
                        <tr align="center">
                            <th width="1px">N0.</th>
                            <th width="200px">Nama Lengkap</th>
                            <th width="100px">No. Telepon</th>
                            <th width="100px">Username</th>
                            <th width=400px>Alamat</th>
                            <!-- <th width=100px>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        {items}
                        <tr>
                            <td>{nomor}</td>
                            <td>{nama_konsumen}</td>
                            <td>{no_tlp}</td>
                            <td>{username}</td>
                            <td>{alamat}</td>
                            <!-- <td align="center"><a href="<?= base_url('user/edit'); ?>?id={id_konsumen}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <!-- <a href="<?= base_url('user/delete_admin'); ?>?id={id_admin}" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data User Ini?')"><i class="fa fa-trash"></i></a> -->
                            </td>
                        </tr>
                        {/items}
                    </tbody>
                </table>
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