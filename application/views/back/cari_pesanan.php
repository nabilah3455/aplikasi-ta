<style>
    .btn_cari {
        padding-bottom: 0.5rem;
        padding-top: 0.5rem;
        padding-left: 2rem;
        padding-right: 2rem;
    }

    .button {
        padding-left: 0.1rem;
    }

    .kop_nota {
        color: black;
        line-height: 1.2;
    }

    .sub1 {
        font-size: 40px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sub2 {
        font-size: 15px;
    }

    .nomor {
        font-size: 20px;
        width: 35%;
        /* transform: rotate(-90deg); */
    }

    .total {
        font-size: 15px;
        font-weight: bold;
    }

    .ttd {
        float: right;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Cari Pesanan</div>
                <div class="row">
                    <div class="col-lg-10">
                        <form action="{self}" method="POST">
                            <input type="text" class="form-control" placeholder="Cari Pesanan..." name="no_seri" id="no_seri">
                    </div>
                    <div class="col-lg-2 button">
                        <input type="submit" name="submit" class="btn btn-success">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive lebar" style="color: black;">
            <table class="table table-striped table-bordered zero-configuration" style="color: black;">
                <thead>
                    <tr align="center">
                        <th width="1%">Nomor Seri</th>
                        <th>Nama Konsumen</th>
                        <th width="15%">Jenis Barang</th>
                        <th width="1%">Jumlah</th>
                        <th width="11%">Harga</th>
                        <th width="13%">Tanggal Masuk</th>
                        <th width="13%">Tanggal Keluar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $i) { ?>
                        <tr>
                            <td><?= $i['seri']; ?></td>
                            <td><?= $i['nama']; ?></td>
                            <td><?= $i['jenis']; ?></td>
                            <td class="text-center"><?= $i['jml']; ?></td>
                            <td class="text-center">Rp. <?= $i['total']; ?></td>
                            <td class="text-center"><?= $i['masuk']; ?></td>
                            <td class="text-center"><?= $i['selesai']; ?></td>
                            <td class="text-center"><?= $i['status']; ?></td>
                            <td>
                                <?php
                                if ($i['status'] != "selesai") { ?>
                                    <a href="<?= base_url('pesanan/cari'); ?>?id_pesanan={no_seri}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <?php } else { ?>
                                    <a href="<?= base_url('pesanan/nota'); ?>?id_pesanan={seri}" type="button" class="btn btn-primary"><i class="fa fa-file"></i></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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