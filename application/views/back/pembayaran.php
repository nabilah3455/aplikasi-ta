<style>
    .col-lg-3{
        font-weight: 500;
    }
</style>

<div class="row">
    <div class="col-7">
        <h3>{judul}</h3>
        <div class="card">
            <div class="card-body" style="color: black;">
                {items}
                <div class="row">
                    <div class="col-lg-3">
                        <label>Nomor Seri</label>
                    </div>
                    <div class="col-lg-6">
                        <label>{no_seri}</label>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Nama Konsumen</label>
                    </div>
                    <div class="col-lg-6">
                        <label>{nama_konsumen}</label>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Nomor Telephone</label>
                    </div>
                    <div class="col-lg-6">
                        <label>{tlp}</label>
                    </div>
                </div>
                {/items}
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Jenis Barang</label>
                    </div>
                    <div class="col-lg-4">
                        {barang}
                        <label>{nama_barang}</label><br>
                        {/barang}
                    </div>
                    <div class="col-lg-2">
                        {barang}
                        <label>{jml}</label><br>
                        {/barang}
                    </div>
                </div>
                {items}
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Antar Barang</label>
                    </div>
                    <div class="col-lg-2" style="width: 5cm;">
                        <label>{antar}</label>
                    </div>
                </div>
                <div class="row" style="padding-top: 1rem;">
                    <div class="col-lg-3">
                        <label>Alamat</label>
                    </div>
                    <div class="col-lg-6">
                        <label>{alamat}</label>
                    </div>
                </div>
                {/items}
                <div style="float: right; padding-top: 2rem;">
                    <!-- <input type="submit" name="submit" value="Ubah Pesanan" class="btn btn-success"> -->
                    <!-- <a class="btn btn-warning" onclick="window.history.back();">Cancel</a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5" style="padding-top: 2.4rem;">
        <div class="card">
            <div class="card-body">
                <center><label>
                        <h3><b>Total Pembayaran
                    </label><br>
                    <label style="padding-top: 2rem; text-decoration: underline; font-size: 40px;">
                        {harga}
                            Rp. {jumlah}
                        {/harga}
                    </label>
                    </b></h3>
                </center>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4 class="text-center"><b>Nota Pesanan</b></h4><br>
                        <a href="<?= base_url('pesanan/cetak_kwitansi')?>?no_seri={seri}" class="btn btn-warning">Lihat Nota Pembayaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="<?= base_url('pesanan/antrian')?>" class="btn btn-success col-lg-12">Masuk Ke dalam Antrian</a>

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