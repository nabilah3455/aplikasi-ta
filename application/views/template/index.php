<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Laundry</title>
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/'); ?>images/profile/logo.png"> -->
    <!-- Custom Stylesheet -->
    <link href="<?= base_url('assets/'); ?>plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
    <link href='https://fonts.googleapis.com/css' rel='stylesheet'>

    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
    <script src="https://www.amcharts.com/lib/4/lang/de_DE.js"></script>
    <script src="https://www.amcharts.com/lib/4/geodata/germanyLow.js"></script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <?php echo $header; ?>
        <?php echo $sidebar; ?>


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">


            <!-- row -->

            <div class="container-fluid">
                <?php echo $content; ?>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <!-- <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by Nabilah</a> 2020</p>
            </div>
        </div> -->
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?= base_url('assets/'); ?>plugins/common/common.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/settings.js"></script>
    <script src="<?= base_url('assets/'); ?>js/gleek.js"></script>
    <script src="<?= base_url('assets/'); ?>js/styleSwitcher.js"></script>

    <script src="<?= base_url('assets/'); ?>plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
</body>

</html>