<style>
    .tambah {
        float: right;
    }

    .scroll {
        height: 500px;
        overflow-x: auto;
    }

    .lebar {
        width: 1300px;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <?= $this->session->flashdata('message'); ?>
    </div>
    <div class="col-lg-6">
        <h3 class="">{judul}</h3>
    </div>
    <div class="col-lg-6">
        <div class="tambah">
            <a href="{tambah}" class="btn mb-1 btn-rounded btn-outline-primary"><i class="fa fa-plus"></i> Data Barang</a>
        </div>
    </div>
    <div class="card scroll">
        <div class="card-body">
            <div class="table-responsive lebar" style="color: black;">
                <table class="table table-striped table-bordered zero-configuration" style="color: black;">
                    <thead>
                        <tr align="center">
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th width="200px">Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {items}
                        <tr>
                            <td align="center">{kode_barang}</td>
                            <td>{nama_barang}</td>
                            <td align="center">{stok}</td>
                            <td align="center">Rp. {harga}</td>
                            <td align="center"><img src="<?= base_url('assets'); ?>/images/barang/{gambar}" alt="gambar_produk" width="100px"></td>
                            <td>{deskripsi}</td>
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