<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url() . 'assets/base/' ?>" type="image/gif" sizes="16x16">
    <title>Sistem Pendaftaran PKL</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() . 'assets/base/' ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() . 'assets/base/' ?>css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?= base_url() . 'assets/base/' ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <?php if (isset($custom_css)) : ?>
        <?= $custom_css ?>
    <?php endif; ?>

</head>

<body id="page-top">

    <div class="container-fluid">
        <div class="custom" style="margin-top: 15% !important;">
            <!-- 404 Error Text -->
            <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="lead text-gray-800 mb-5">Page Not Found</p>
                <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                <a href="<?= base_url() . $this->session->previllage . '/Dashboard' ?>">← Back to Dashboard</a>
            </div>
        </div>


    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() . 'assets/base/' ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() . 'assets/base/' ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() . 'assets/base/' ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() . 'assets/base/' ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="<?= base_url() . 'assets/base/' ?>vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="<?= base_url() . 'assets/base/' ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() . 'assets/base/' ?>js/demo/chart-pie-demo.js"></script> -->

    <!-- Page level plugins -->
    <script src="<?= base_url() . 'assets/base/' ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() . 'assets/base/' ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url() . 'assets/base/' ?>js/demo/datatables-demo.js"></script>

    <?php if (isset($custom_js)) : ?>
        <?= $custom_js; ?>
    <?php endif; ?>

</body>

</html>