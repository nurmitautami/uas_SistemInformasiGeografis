<?= $this->extend('_Layouts/IndexView') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $title ?></h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="/<?= $url ?>"><?= $title ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $page ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h4><?= $page ?></h4>
                    </div>
                    <div>
                        <a href="<?= site_url($url) ?>/form" class="btn btn-primary"><i class="bi bi-plus"></i> Tambah</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-striped" id="dt">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Level</th>
                            <th>Signed</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th width="80px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getData as $row) : ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= uploaded($row->pengguna_foto, 'pengguna') ?>" alt="" width="60px">
                                        <div class="ms-2">
                                            <h6 class="mb-0">
                                                <?= $row->pengguna_nama ?>
                                            </h6>
                                            <span class="text-muted"><?= $row->pengguna_username ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $row->pengguna_level ?></td>
                                <td><?= $row->signed_at ?></td>
                                <td><?= statusPengguna($row->pengguna_status) ?></td>
                                <td><?= $row->created_at ?></td>
                                <td>
                                    <div class="btn-group mb-1">
                                        <div class="dropdown">
                                            <button class="btn btn-dark dropdown-toggle me-1" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?= site_url($url . '/form/' . $row->id) ?>">Ubah</a>
                                                <a class="dropdown-item" href="javascript:;" data-href="<?= site_url($url . '/delete/' . $row->id) ?>" onclick="deleteData(this)">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>


<?= $this->endSection() ?>

<?= $this->section('style') ?>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    let table1 = document.querySelector('#dt');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
<?= $this->endSection() ?>