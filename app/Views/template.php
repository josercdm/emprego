<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title><?= TITLE_SITE ?></title>        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="<?= URL_BASE ?>assets/css/summernote/summernote-bs4.min.css">
    </head>
    <body class="hold-transition login-page">
        <?php
        $this->loadHeader($nameView, $dataView);
        $this->loadViewSite($nameView, $dataView);
        $this->loadFooter($nameView, $dataView);
        ?>
        <script src="<?= URL_BASE ?>assets/js/jquery/jquery-2.2.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <!--<script src="<?= URL_BASE ?>assets/js/jquery-ui.min.js"></script>-->
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

        <!-- Bootstrap 4 -->
        <script src="<?= URL_BASE ?>assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <!--<script src="<?= URL_BASE ?>assets/js/chart.js/Chart.min.js"></script>-->
        <!-- Sparkline -->
        <script src="<?= URL_BASE ?>assets/js/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="<?= URL_BASE ?>assets/js/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?= URL_BASE ?>assets/js/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?= URL_BASE ?>assets/js/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?= URL_BASE ?>assets/js/moment/moment.min.js"></script>
        <script src="<?= URL_BASE ?>assets/js/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?= URL_BASE ?>assets/js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?= URL_BASE ?>assets/js/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?= URL_BASE ?>assets/js/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= URL_BASE ?>assets/js/adminlte.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= URL_BASE ?>assets/js/demo.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <!--<script src="<?= URL_BASE ?>assets/js/dashboard.js"></script>-->
        <script src="<?= URL_BASE ?>assets/js/sweet-alert/sweetalert2.all.min.js" type="text/javascript"></script>


        <?php
        if (isset($_SESSION['nivel'])) {
            ?>
            <script src="<?= URL_BASE ?>assets/js/autobahn.js" type="text/javascript"></script>
            <script src="<?= URL_BASE ?>assets/js/client.js" type="text/javascript"></script>
            <?php
        }
        ?>
        <script src="<?= URL_BASE ?>assets/js/actions.js"></script>
    </body>
</html>
