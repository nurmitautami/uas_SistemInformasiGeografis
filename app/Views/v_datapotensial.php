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
                    <h5 class="m-0 font-weight-bold text-grey">Data Potensial dan Aktivitas manusia</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Kondisi Lahan</th>
                                    <th>Akses</th>
                                    <th>Jenis Aktivitas</th>
                                    <th>Intensitas</th>
                                    <th>Dampak</th>
                                    <th>Lotitude</th>
                                    <th>Longitude</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($potensial as $i) { ?>
                                    <tr>
                                        <td><img src="<?= base_url('img/potensial') . "/" . $i['foto_lokasi']; ?>" width="90px" height="90px" class="img-fluid"></td>
                                        <td><?= $i['kondisi_lahan']; ?></td>
                                        <td><?= $i['akses']; ?></td>
                                        <td><?= $i['jenis_aktivitas']; ?></td>
                                        <td><?= $i['intensitas']; ?></td>
                                        <td><?= $i['dampak']; ?></td>
                                        <td><?= $i['latitude']; ?></td>
                                        <td><?= $i['longitude']; ?></td>
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
<?= $this->endSection(); ?>