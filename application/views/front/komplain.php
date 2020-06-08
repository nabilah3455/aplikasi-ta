<style>
    .data {
        margin: 4rem;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .judul {
        font-size: 30px;
        font-weight: 600;
    }

    .button {
        padding-top: 1rem;
        float: right;
    }
</style>

<div class="data">
    <div class="judul">
        Pengajuan Komplain
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            {items}
            <table>
                <tr>
                    <th width="180px">Nomor Seri</th>
                    <td width="15px">:</td>
                    <td>{no_seri}</td>
                </tr>
                <tr>
                    <th>Nama Konsumen</th>
                    <td>:</td>
                    <td>{nama_konsumen}</td>
                </tr>
                <tr>
                    <th>Jenis Barang</th>
                    <td>:</td>
                    <td>{nama_barang}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>:</td>
                    <td>{jml_barang}</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>:</td>
                    <td>Rp. {total}</td>
                </tr>
                <tr>
                    <th>Status Pesanan</th>
                    <td>:</td>
                    <td>Selesai</td>
                </tr>
            </table>
            {/items}
        </div>
        <div class="col-lg-6">
            <?php foreach ($items as $i) { ?>
            <form action="<?= base_url('konsumen/input_komplain') ?>" method="POST">
                    <input type="hidden" name="id" value="<?= $i['id_pesanan'] ?>">
                    <input type="hidden" name="no_seri" value="<?= $i['no_seri'] ?>">
                    <label for="">Komplain</label><br>
                    <textarea name="komplain" id="komplain" cols="30" rows="5" class="form-control"></textarea>
                    <div class="button">
                        <input type="submit" name="submit" value="Submit" class="btn btn-success">
                        <a class="btn btn-danger" href="<?= base_url('konsumen/cari') ?>?kode=<?= $i['no_seri'] ?>">Cancel</a>
                    </div>
                </form>
                <?php } ?>
        </div>
    </div>
</div>