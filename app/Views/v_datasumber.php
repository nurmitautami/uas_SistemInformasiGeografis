<?= $this->extend('_Layouts/IndexView') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $heading; ?></h1>
    </div>
    <?= $this->include('template/statusBar'); ?>
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sukses !</strong> <?= session()->getFlashdata('pesan'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-grey">Data Sumber Daya</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>Jenis Mineral</th>
                                    <th>Kualitas</th>
                                    <th>Ketersediaan</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                foreach ($sumber as $sbr) :
                                ?>
                                    <tr>

                                        <td><?= $sbr['jenis_mineral'] ?></td>
                                        <td><?= $sbr['kualitas'] ?></td>
                                        <td><?= $sbr['ketersediaan'] ?></td>
                                        <td><?= $sbr['latitude'] ?></td>
                                        <td><?= $sbr['longitude'] ?></td>
                                    <?php
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>