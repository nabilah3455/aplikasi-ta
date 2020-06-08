<style>
    .card-title {
        /* text-align: center; */
        color: black;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Laporan Penjualanan
                </div>
                <form action="<?= base_url('laporan/laporan'); ?>" method="POST" autocomplete="off">
                    <div class="row">
                            <div class="col-md-5">
                                <input type="date" name="awal" class="form-control" value="{awal}">
                            </div>
                            <label style="padding-top: 0.6rem"><b>s/d</b></label>
                            <div class="col-md-5">
                                <input type="date" name="akhir" class="form-control" value="{akhir}">
                            </div>
                            <input type="submit" name="submit" value="Cari" class="btn btn-success" style="padding-right: 2rem; padding-left: 2rem;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary" href="<?= base_url('laporan/print'); ?>?tgl_awal={awal}&&tgl_akhir={akhir}">Cetak Laporan</a>
                <div class="card-title tex-center">
                    <!-- {judul} -->
                </div>
                <div class="table-responsive lebar" style="color: black;">
                    <table class="table table-striped table-bordered zero-configuration" style="color: black;">
                        <thead>
                            <tr align="center">
                                <th width="1%">No</th>
                                <th>Tanggal</th>
                                <th>No. Seri</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            {items}
                            <tr>
                                <td align="center">{no}</td>
                                <td align="center">{tgl_masuk}</td>
                                <td align="center">{no_seri}</td>
                                <td align="center">Rp. {total}</td>
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