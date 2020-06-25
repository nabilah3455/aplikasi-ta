<style>
    .card-title {
        color: black;
        font-size: 20px;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('message'); ?>
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Pesanan Dicuci
                </div>
                <div class="table-responsive lebar" style="color: black;">
                    <table class="table table-striped table-bordered zero-configuration" style="color: black;">
                        <thead>
                            <tr align="center">
                                <th width="1px">No.</th>
                                <th>No. Seri</th>
                                <th>Nama Konsumen</th>
                                <th>Jenis Barang</th>
                                <th width="1%">Jumlah</th>
                                <th>Tanggal Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {items}
                            <tr>
                                <td align="center">{nomor}</td>
                                <td align="center">{no_seri}</td>
                                <td>{nama_konsumen}</td>
                                <td>{nama_barang}</td>
                                <td align="center">{jml_barang}</td>
                                <td align="center">{tgl_masuk}</td>
                                <td align="center"><a href="<?= base_url('pesanan/edit_status'); ?>?id_pesanan={id_pesanan}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="http://api.whatsapp.com/send?phone=62{no_tlp}&text=Hallo%20{nama_konsumen},Pesananmu%20{nama_barang}%20dengan%20No.%20seri%20{no_seri}%20sedang%20dicuci" class="btn btn-success"><i class="fa fa-whatsapp"></i></a>
                                </td>
                            </tr>
                            {/items}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="bootstrap-modal">
        <!-- Modal -->
        <div class="modal fade" id="basicModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cari Pesanan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color: black">
                        <center>
                            <h4>Masukkan Nomor Telephone atau Nomor Seri
                        </center>
                        <input type="text" class="form-control" placeholder="Cari Pesanan...">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-primary" href="<?= base_url('pesanan/cari'); ?>">Cari</a>
                    </div>
                </div>
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