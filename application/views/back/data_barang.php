<style>
    .tambah {
        float: right;
    }

    .card-title {
        font-size: 25px;
        color: black;
        float: left
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="card col-lg-12">
        <div class="card-body">
            <div class="card-title">
                Data Barang
            </div>
            <div class="tambah">
                <a href="{tambah}" class="btn mb-1 btn-rounded btn-outline-primary"><i class="fa fa-plus"></i> Data Barang</a>
            </div>
            <div class="table-responsive" style="color: black;">
                <table class="table table-striped table-bordered zero-configuration" style="color: black;">
                    <thead>
                        <tr align="center">
                            <th width="12%">Kode Barang</th>
                            <th width="20%">Jenis Barang</th>
                            <th width="15%">Harga Laundry</th>
                            <th width="15%">Harga Dry Clean</th>
                            <th width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {items}
                        <tr>
                            <td align="center">{kode_barang}</td>
                            <td>{nama_barang}</td>
                            <td align="center">Rp. {hrg_laundry}</td>
                            <td align="center">Rp. {hrg_dryclean}</td>
                            <td align="center"><a href="<?= base_url('barang/edit'); ?>?kode_barang={kode_barang}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('barang/delete'); ?>?kode_barang={kode_barang}" class="btn btn-danger" onclick="return confirm('Yakin Hapus Data Barang Ini?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        {/items}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>