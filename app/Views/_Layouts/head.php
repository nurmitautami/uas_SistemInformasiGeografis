<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?? 'Dashboard' ?></title>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/mazer/assets/css/bootstrap.css">

<link rel="stylesheet" href="/mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="/mazer/assets/css/app.css">
<link rel="shortcut icon" href="/mazer/assets/images/favicon.svg" type="image/x-icon">
<link rel="stylesheet" href="/mazer/assets/vendors/simple-datatables/style.css">
<style type="text/css">
	@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");

	.dataTable-container {
		min-height: 200px;
	}

	.pristine-error {
		color: #f30;
	}

	.has-danger .form-control {
		border-color: #f30;
	}

	.sidebar-item .bi {
		margin-top: -7px !important;
	}
</style>
<?= $this->renderSection('head') ?>