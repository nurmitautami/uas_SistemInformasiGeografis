<?= $this->extend('_Layouts/IndexView') ?>

<?= $this->section('content') ?>
<?php
$auth = Auth();
?>
<div class="page-heading">
<h1 class="page-heading">Selamat Datang di Website Sistem Informasi Geografis</h1>
<h1 class="page-heading">Mineral dan Tambang</h1></div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<?= $this->endSection() ?>