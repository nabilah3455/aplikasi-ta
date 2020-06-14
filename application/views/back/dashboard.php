<style>
    .lebar {
        height: 120px;
    }

    .panel {
        padding-top: 1rem;
        text-align: center;
        border-radius: 5px;
    }

    .angka {
        padding-top: 0rem;
        font-size: 40px;
    }

    .judul {
        font-size: 20px;
    }

    .card1 {
        height: 25rem;
    }

    #chartdiv {
        height: 350px;
    }

    #linechart {
        height: 450px;
    }

    .admin::-webkit-scrollbar {
        display: none;
    }

    .admin {
        height: 350px;
        overflow-y: scroll;
        /* Add the ability to scroll */
    }

    .saran::-webkit-scrollbar {
        display: none;
    }

    .saran {
        height: 300px;
        overflow-y: scroll;
        /* Add the ability to scroll */
    }

    .pendapatan {
        font-size: 23px;
        color: black;
    }

    .nominal {
        font-size: 20px;
        text-align: right;
        padding-top: 1rem;
    }

    .hari {
        font-size: 13px;
        text-align: left;
        padding-top: 1rem;
        padding-left: 1rem;
        padding-bottom: 1rem;
    }

    .table-striped {
        color: black;
        font-size: 15px;
    }
</style>
<div class="row">
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
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1 panel">
            <h4>Dalam Antrian</h4>
            <div class="angka">
                {antrian}
                {total}
                {/antrian}
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1 panel">
            <h4>Dicuci</h4>
            <div class="angka">
                {cuci}
                {total}
                {/cuci}
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1 panel">
            <h4>Siap Diambil</h4>
            <div class="angka">
                {belum_diambil}
                {total}
                {/belum_diambil}
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card gradient-1 panel">
            <h4>Harus Diantar</h4>
            <div class="angka">
                {antar}
                {total}
                {/antar}
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Grafik Pemesanan</h4>
                <div id="linechart"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <!-- Pendapatan -->
                <div class="card-title pendapatan" style="padding-top: 1rem;">
                    Pendapatan
                </div>
                <div class="nominal">
                    Rp. {pendapatan}
                    {total}
                    {/pendapatan}
                </div>
                <div class="" style="padding-top: 1rem; font-size: 12px;">
                    Per Tahun 2020
                </div>
                <hr>
                <!-- Total Pesanan -->
                <div class="card-title pendapatan" style="padding-top: 1rem;">
                    Pesanan
                </div>
                <div class="nominal">
                    {pesanan}
                    {jumlah}
                    {/pesanan}
                </div>
                <div class="" style="padding-top: 1rem; font-size: 12px;">
                    Per Tahun 2020
                </div>
                <hr>
                <!-- Total Konsumen -->
                <div class="card-title pendapatan" style="padding-top: 1rem;">
                    Konsumen
                </div>
                <div class="nominal">
                    {konsumen}
                    {total}
                    {/konsumen}
                </div>
                <div class="" style="padding-top: 1rem; font-size: 12px;">
                    Total Keseluruhan
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Pesanan terbanyak</h4>
                <div id="activity">
                    <div class="admin">
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <div class="media-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="45%">Jenis barang</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {terbanyak}
                                            <tr>
                                                <td>{nama_barang}</td>
                                                <td class="text-center">{jml}</td>
                                            </tr>
                                            {/terbanyak}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Harga</h4>
                <div id="activity">
                    <div class="admin">
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <div class="media-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="45%">Jenis barang</th>
                                                <th>Laundry</th>
                                                <th>Dry Clean</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {list}
                                            <tr>
                                                <td>{nama_barang}</td>
                                                <td class="text-center">Rp. {hrg_laundry}</td>
                                                <td class="text-center">Rp. {hrg_dryclean}</td>
                                            </tr>
                                            {/list}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Komplain</h4>
                <div id="activity">
                    <div class="admin">
                        <div class="media border-bottom-1 pt-3 pb-3">
                            <div class="media-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th width="1%">No.</th>
                                                <th width="20%">Nama Konsumen</th>
                                                <th width="20%">Jenis Barang</th>
                                                <th>Komplain</th>
                                                <th width=15%></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($komplain as $k) {
                                            ?>
                                                <tr>
                                                    <td><?= $k['no'] ?></td>
                                                    <td><?= $k['nama_konsumen'] ?></td>
                                                    <td><?= $k['nama_barang'] ?></td>
                                                    <td><?= $k['komplain'] ?></td>
                                                    <td>
                                                        <a href="http://api.whatsapp.com/send?phone=62<?= $k['no_telepon']; ?>" class="btn btn-primary"><i class="fa fa-phone"></i></a>
                                                        <a href="<?= base_url('dashboard/hapus_komplain')?>?id=<?= $k['id_komplain']?>" onclick="return confirm('Yakin Hapus Daftar Komplain Ini?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
    am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("linechart", am4charts.XYChart);

        var data = [];

        chart.data = {linechart};

        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.ticks.template.disabled = true;
        categoryAxis.renderer.line.opacity = 0;
        categoryAxis.renderer.grid.template.disabled = true;
        categoryAxis.renderer.minGridDistance = 40;
        categoryAxis.dataFields.category = "year";
        categoryAxis.startLocation = 0.4;
        categoryAxis.endLocation = 0.6;


        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.renderer.line.opacity = 0;
        valueAxis.renderer.ticks.template.disabled = true;
        valueAxis.min = 0;

        var lineSeries = chart.series.push(new am4charts.LineSeries());
        lineSeries.dataFields.categoryX = "year";
        lineSeries.dataFields.valueY = "income";
        lineSeries.tooltipText = "Pesanan Masuk: {valueY.value}";
        lineSeries.fillOpacity = 0.5;
        lineSeries.strokeWidth = 3;
        lineSeries.propertyFields.stroke = "lineColor";
        lineSeries.propertyFields.fill = "lineColor";

        var bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
        bullet.circle.radius = 6;
        bullet.circle.fill = am4core.color("#fff");
        bullet.circle.strokeWidth = 3;

        chart.cursor = new am4charts.XYCursor();
        chart.cursor.behavior = "panX";
        chart.cursor.lineX.opacity = 0;
        chart.cursor.lineY.opacity = 0;

        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarX.parent = chart.bottomAxesContainer;

    }); // end am4core.ready()
</script>