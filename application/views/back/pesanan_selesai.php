<style>
    .tambah {
        float: right;
    }

    .scroll {
        overflow-x: auto;
        width: 100%;
    }

    .lebar {
        width: 1300px;
    }

    .judul {
        font-size: 30px;
    }
</style>
<div class="card">
    <div class="card-body">
        <div class="card-title">
            <h3 class="judul">{judul}</h3>
        </div>
        <div class="table-responsive" style="color: black;">
            <table class="table table-striped table-bordered zero-configuration" style="color: black;">
                <thead>
                    <tr align="center">
                        <th width="1%">No</th>
                        <th>Nama Konsumen</th>
                        <th>Jenis Barang</th>
                        <th width="1%">Jumlah</th>
                        <th>Total Harga</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Selesai</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    {items}
                    <tr align="center">
                        <td>{nomor}</td>
                        <td>{nama}</td>
                        <td>{jenis}</td>
                        <td>{jml}</td>
                        <td>Rp. {total}</td>
                        <td>{masuk}</td>
                        <td>{selesai}</td>
                        <td>
                            <a href="<?= base_url('pesanan/cetak_nota'); ?>?no_seri={no_seri}" type="button" class="btn btn-primary"><i class="fa fa-file"></i></a>
                        </td>
                    </tr>
                    {/items}
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