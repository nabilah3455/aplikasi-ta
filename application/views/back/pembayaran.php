<style>
    .data-konsumen {
        line-height: 1px;
    }

    .data {
        overflow-x: auto;
        /* width: 100%; */
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="col-lg-7">
        <h3>{judul}</h3>
        <div class="card">
            <div class="card-body data-konsumen" style="color: black;">
                {items}
                <div class="row">
                    <div class="col-lg-3">
                        <label>Nomor Seri</label>
                    </div>
                    <div class="col-lg-6">
                        <label>: {no_seri}</label>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Nama Konsumen</label>
                    </div>
                    <div class="col-lg-6">
                        <label>: {nama_konsumen}</label>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Nomor Telepon</label>
                    </div>
                    <div class="col-lg-6">
                        <label>: {tlp}</label>
                    </div>
                </div>
                <!-- {/items}
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Jenis Barang</label>
                    </div>
                    <div class="col-lg-4">
                        {barang}
                        <label>: {nama_barang}</label><br>
                        {/barang}
                    </div>
                    <div class="col-lg-2">
                        {barang}
                        <label>Total : {jml}</label><br>
                        {/barang}
                    </div>
                </div>
                {items} -->
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Antar Barang</label>
                    </div>
                    <div class="col-lg-2" style="width: 5cm;">
                        <label>: {antar}</label>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Alamat</label>
                    </div>
                    <div class="col-lg-6">
                        <label>: {alamat}</label>
                    </div>
                </div>
                {/items}
                <div>
                    <div class="data">
                        <div class="table-responsive" style="color: black; width: 800px; padding-top: 2rem;">
                            <table class="table table-bordered" style="color: black;">
                                <thead>
                                    <tr align="center">
                                        <th width="1px">No.</th>
                                        <th width="80px">Nomor Seri</th>
                                        <th width="150px">Jenis Barang</th>
                                        <th width="1px">Jumlah</th>
                                        <th width="80px">Cuci</th>
                                        <th width="20px">Total</th>
                                    </tr>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pesanan as $p) { ?>
                                        <tr>
                                            <td align="center"><?= $no ?></td>
                                            <td><?= $p['no_seri'] ?></td>
                                            <td><?= $p['nama_barang'] ?></td>
                                            <td align="center"><?= $p['jml_barang'] ?></td>
                                            <td><?= $p['cuci'] ?></td>
                                            <td align="center">Rp. <?= $p['total'] ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5" style="padding-top: 2.4rem; color: black;">
        <div class="card">
            <div class="card-body">
                <center><label>
                        <h3><b>Total Pembayaran
                    </label>
                    <h4>
                        <label style="padding-top: 1.2rem; text-decoration: underline; font-size: 35px;">
                            {harga}
                            Rp. {jumlah}
                            {/harga}
                        </label>
                        </b></h3>
                </center>
                <hr>
                <?php foreach($status_bayar as $p){
                     if($p['status_bayar'] == null){?>
                <form action="<?= base_url('pesanan/update_status_bayar') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-5">
                            <b>Status Pembayaran</b>
                        </div>
                        <input type="hidden" name="no_seri" id="no_seri" value="<?= $seri ?>">
                        <div class="col-lg-3">
                            <input type="radio" name="bayar" id="" value="Lunas" required> Lunas
                        </div>
                        <div class="col-lg-4">
                            <input type="radio" name="bayar" id="" value="Belum Lunas" required> Belum Lunas
                        </div>
                    </div>
                    <div class="" style="padding-top: 3px;">
                        <input type="submit" class="btn btn-primary col-lg-12" value="update Status Pembayaran" sty>
                    </div>
                </form>
                <?php }else{?>
                    Status Pesanan : <?= $p['status_bayar']?>
                <?php } }?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <!-- <h4 class="text-center"><b>Invoice</b></h4><br> -->
                        <a href="<?= base_url('pesanan/cetak_kwitansi') ?>?no_seri={seri}" type="submit" class="btn btn-warning">Lihat Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= base_url('pesanan/antrian') ?>" class="btn btn-success col-lg-12">Lihat Antrian</a>

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