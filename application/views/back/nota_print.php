<style>
    .kop_nota {
        color: black;
        line-height: 1.2;
    }

    .sub1 {
        font-size: 20px;
        font-family: 'Times New Roman', Times, serif;
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
                            <td rowspan="2" width="30%"></td>
                            <td class="sub1"> LAUNDRY & DRY CLEAN CLEANING SERVICE</td>
                        </tr>
                        <tr>
                            <td>
                                Puri Bukit Depok Jl. Menteng III Rt. 04 Rw. 10 No. 18<br>
                                Hp. 0878 8135 6214<br>
                                <b>WA : 0857 1032 9617 NPWP. 25.687.980.0-403.000</b><br>
                            </td>
                        </tr>
                    </table>
                </div>
                <hr>
                <table width="100%" cellpadding="1">
                    <?php foreach ($data as $i) { ?>
                        <tr>
                            <td width="13%" style="padding-left: 4px;">Cabang</td>
                            <td width="2%">:</td>
                            <td width="40%">Nanin</td>
                            <td width="15%">Nomor Seri</td>
                            <td width="2%">:</td>
                            <td><?= $i['no_seri'] ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 4px;">Nama</td>
                            <td>:</td>
                            <td><?= $i['nama_konsumen'] ?></td>
                            <td>Telepon</td>
                            <td>:</td>
                            <td><?= $i['no_tlp'] ?></td>
                        </tr>
                        <tr>
                            <td style="padding-left: 4px;">Alamat</td>
                            <td>:</td>
                            <td><?= $i['alamat'] ?></td>
                            <td>Pembayaran</td>
                            <td>:</td>
                            <td><b><?= $i['status_bayar'] ?></b></td>
                        </tr>
                    <?php } ?>
                </table>
                <table width="100%" style="padding-top: 1rem;">
                    <tr>
                        <?php foreach ($tanggal as $i) { ?>
                            <td width="50%">Tanggal Masuk : <?= $i['tgl_masuk'] ?></td>
                            <td width="50%">Tanggal Selesai : <?= $i['tgl_selesai'] ?></td>
                        <?php } ?>
                    </tr>
                </table>
                <table border="1" width="100%" style="border-collapse: collapse;">
                    <tr align="center">
                        <td width=2%>No</td>
                        <td>Jenis Barang</td>
                        <td width="15%">Jumlah</td>
                        <td width="15%">Berat</td>
                        <td>Total Harga</td>
                    </tr>
                    <?php $a = 1;
                    foreach ($items as $i) { ?>
                        <tr>
                            <td align="center"><?php echo $a; ?></td>
                            <td><?= $i['nama_barang'] ?></td>
                            <td align="center"><?= $i['jml_barang'] ?></td>
                            <td align="center"><?= $i['berat'] ?> Kg</td>
                            <td align="right">Rp. <?= $i['total'] ?></td>
                        </tr>
                    <?php $a++;
                    } ?>
                    <tr class="total" align="center">
                        <?php foreach ($total as $t) { ?>
                            <td colspan="2">TOTAL</td>
                            <td><?= $t['jml'] ?></td>
                            <td><?= $t['berat'] ?> Kg</td>
                            <td>Rp. <?= $t['jumlah'] ?></td>
                        <?php } ?>
                    </tr>
                </table>
                <div class="" style="font-size:15px; padding-top: 1rem;">
                    <div class="row col-lg-12">
                        <div class="col">
                            <?php foreach ($status_pesanan as $i) {
                                if ($i['status_pesanan'] == '6') {
                                    echo "<b>Catatan :</b> Pesanan Dibatalkan";
                                }
                            } ?>
                            <div class="ttd">
                                <b>Hormat Kami,</b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>