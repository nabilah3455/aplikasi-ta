<style>
    .kop_nota {
        color: black;
        line-height: 1.2;
    }

    .sub1 {
        font-size: 23px;
        font-family: 'Times New Roman', Times, serif;
        font-weight: 600;
    }

    .sub2 {
        font-size: 14px;
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

    .catatan {
        font-size: 10px;
        text-align: justify;
    }

    .ttd {
        float: right;
    }
</style>

<div class="row">
    <div class="col-lg-7">
        <div class="card sub2">
            <div class="card-body">
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
                            <td width="40%">Nanin</td>
                            <td width="15%">Nomor Seri</td>
                            <td width="2%">:</td>
                            {items}
                            <td>{seri}</td>
                        </tr>
                        <tr>
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
                            <td style="padding-bottom: 1rem;">{alamat}</td>
                            <td>Pembayaran</td>
                            <td>:</td>
                            <td><b>{status_bayar}</b></td>
                            {/items}
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            {items}
                            <td width="50%">Tanggal Masuk : {tgl_masuk}</td>
                            <td width="50%">Tanggal Selesai : {selesai}</td>
                            {/items}
                        </tr>
                    </table>
                    <table border="1" width="100%" style="border-collapse: collapse;">
                        <tr align="center" class="total">
                            <td width="1%">No</td>
                            <td>Jenis Barang</td>
                            <td width="15%">Jumlah</td>
                            <td width="15%">Berat</td>
                            <td>Total Harga</td>
                        </tr>
                        <?php $no = 1;
                        foreach ($barang as $b) {?>
                                <tr>
                                    <td align="center"><?= $no ?></td>
                                    <td><?= $b['jenis'] ?></td>
                                    <td align="center"><?= $b['jml'] ?></td>
                                    <td align="center"><?= $b['berat'] ?></td>
                                    <td align="right">Rp. <?= $b['total'] ?></td>
                                </tr>
                        <?php 
                            $no++;
                        } ?>
                        <tr class="total" align="center">
                            <?php foreach ($total as $t) { ?>
                                <td colspan="2">TOTAL</td>
                                <td><?= $t['jml'] ?></td>
                                <td><?= $t['berat'] ?></td>
                                <td>Rp. <?= $t['jumlah'] ?></td>
                            <?php } ?>
                        </tr>
                    </table>
                    <div class="ttd" style="font-size:15px; padding-top: 1rem;">
                        <b>Hormat Kami,</b><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>