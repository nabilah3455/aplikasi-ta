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
</style>
<div class="row">
    <div class="col-lg-6">
        <h3 class="">{judul}</h3>
    </div>
    <div class="card scroll">
        <div class="card-body">
            <div class="table-responsive lebar" style="color: black;">
                <table class="table table-striped table-bordered zero-configuration" style="color: black;">
                    <thead>
                        <tr align="center">
                            <th>Nama Lengkap</th>
                            <th>Nama Barang</th>
                            <th width=10px>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Status</th>
                            <th>Edit Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {items}
                        <tr align="center">
                            <td>{user}</td>
                            <td>{barang}</td>
                            <td>{jml}</td>
                            <td>Rp. {total}</td>
                            <td>{tanggal}</td>
                            <td><b>{status}</b></td>
                            <td><a href="<?= base_url('pesanan/edit_status'); ?>?id_pesanan={id_pesanan}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                        </tr>
                        {/items}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>