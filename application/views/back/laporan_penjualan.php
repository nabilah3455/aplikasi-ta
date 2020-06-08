<style>
    .nama {
        font-weight: 600;
        padding-top: 5rem;
    }

    .tgl {
        padding-top: 2rem;
    }

    .double {
        width: 50%;
        float: left;
    }

    .data{
        text-align: center;
    }
</style>

<table width="100%">
    <tr>
        <td width="50%"><img src="<?= base_url('assets'); ?>/images/media/logo.png" alt="logo" width="300"></td>
        <td class="nama">Nama Perwakilan : Nanin <br>
            <hr>
        </td>
    </tr>
    <tr class="tgl">
        <td>Rekapitulasi Mulai Tgl : {awal}</td>
        <td>Sampai Dengan Tgl : {akhir}</td>
    </tr>
</table>
<div class="row">
    <table border="1" cellspacing="0" width="100%" class="data">
        <tr>
            <th width=15px>No.</th>
            <th>Tanggal</th>
            <th>No. Seri</th>
            <th>Jumlah</th>
        </tr>
        <?php $no=1; foreach ($item as $i) { ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $i['tgl_masuk'] ?></td>
                <td><?= $i['no_seri'] ?></td>
                <td>Rp. <?= $i['total'] ?></td>
            </tr>
        <?php $no++; } ?>
    </table>
    <table width="100%">
        {total}
        <tr>
            <td width=63%></td>
            <th width="17%" align="left">Total</th>
            <td width="1%">:</td>
            <td align="right">Rp. {total}</td>
        </tr>
        <tr>
            <td width=63%></td>
            <th width="17%" align="left">Discount</th>
            <td width="1%">:</td>
            <td align="right">Rp. {diskon}</td>
        </tr>
        <tr>
            <td width=63%></td>
            <th width="17%" align="left">Grand Total</th>
            <td width="1%">:</td>
            <td align="right"><b>Rp. {grand}</b></td>
        </tr>
        {/total}
    </table>
</div>