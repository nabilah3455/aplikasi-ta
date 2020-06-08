<style>
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
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">
                <div class="card-title" style="color: black;">
                {items}
                    <a class="btn btn-warning" onclick="window.history.back();">Kembali</a>
                    <a href="<?= base_url('konsumen/cetak_nota'); ?>?id_pesanan={seri}" type="button" class="btn btn-primary">Cetak Nota</i></a>
                    {/items}
                </div>
                <div class="kop_nota">
                    <table width="100%">
                        <tr>
                            <td rowspan="2" width="30%">LOGO</td>
                            <td class="sub1">PRIMA LESTARI</td>
                        </tr>
                        <tr>
                            <td>
                                LAUNDRY & DRY CLEAN CLEANING SERVICE<br>
                                Puri Bukit Depok Jl. Menteng III Rt. 04 Rw. 10 No. 18<br>
                                Hp. 0878 8135 6214<br>
                                <b>WA : 0857 1032 9617 NPWP. 25.687.980.0-403.000</b><br>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table width="100%" cellpadding="1">
                        <tr>
                            <td width="13%" style="padding-left: 4px;">Cabang</td>
                            <td width="2%">:</td>
                            <td width="46%">Nanin</td>
                            <td width="13%">Nomor Seri</td>
                            <td width="2%">:</td>
                            {items}
                            <td>{seri}</td>
                            {/items}
                        </tr>
                        <tr>
                            {items}
                            <td style="padding-left: 4px;">Nama</td>
                            <td>:</td>
                            <td>{nama}</td>
                            <td>Telepon</td>
                            <td>:</td>
                            <td>{tlp}</td>
                        </tr>
                        <tr valign="top">
                            <td style="padding-left: 4px;">Alamat</td>
                            <td>:</td>
                            <td colspan="4" style="padding-bottom: 1rem;">{alamat}</td>
                            {/items}
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            {items}
                            <td width="50%">Tanggal Masuk : {masuk}</td>
                            <td width="50%">Tanggal Selesai : {selesai}</td>
                            {/items}
                        </tr>
                    </table>
                    <table border="1" width="100%" style="border-collapse: collapse;">
                        <tr align="center" class="total">
                            <td width="3%">No.</td>
                            <td>Jenis Barang</td>
                            <td width="15%">Jumlah</td>
                            <td>Total Harga</td>
                        </tr>
                        <tr>{items}
                            <td align="center" style="padding: 1rem;">1</td>
                            <td>{jenis}</td>
                            <td align="center">{jml}</td>
                            <td align="right">Rp. {total}</td>
                        </tr>
                        <tr class="total" align="center">
                            <td colspan="2">TOTAL</td>
                            <td>{jml}</td>
                            <td align="right">Rp. {total}</td>
                        </tr>
                        {/items}
                    </table>
                    <div class="ttd" style="font-size:15px; padding-top: 1rem;">
                        <b>Hormat Kami,</b><br>
                        {ttd}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>