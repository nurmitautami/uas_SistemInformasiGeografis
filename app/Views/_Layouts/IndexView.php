<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php' ?>
    <?= $this->renderSection('style') ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('components/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('components/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

    <!-- Leaflet -->
    <link rel="stylesheet" href="<?= base_url('js/leaflet/leaflet.css'); ?>" />
    <script type='text/javascript' src="<?= base_url('js/leaflet/leaflet.js'); ?>"></script>
</head>

<body>
    <div id="app">
        <?php include 'sidebar.php' ?>

        

 <div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?= $this->renderSection('content') ?>
            <?php include 'footer.php' ?>
        </div>
    </div>

<?php include 'javascript.php' ?>
<?= $this->renderSection('javascript') ?>

     <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i></a>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('components/jquery/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('components/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('components/jquery-easing/jquery.easing.min.js'); ?>"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('js/sb-admin-2.min.js'); ?>"></script>

        <!-- Page level plugins -->
        <script src="<?= base_url('components/datatables/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('components/datatables/dataTables.bootstrap4.min.js') ?>"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('js/demo/datatables-demo.js'); ?>"></script>

        <!-- CKEditor -->
        <script src="<?= base_url('js/ckeditor/ckeditor.js'); ?>"></script>
</body>

</html>