<?= $this->extend('_Layouts/IndexView') ?>

<?= $this->section('content') ?>
<?php
if ($getData != null) {
    extract($getData);
}

if (session()->getFlashdata('hasForm')) {
    extract(session()->getFlashdata('hasForm'));
}

?>
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
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                    </div>
                </div>

            </div>
            <div class="card-body">
                <?php
                if (session()->getFlashdata('validation')) {
                ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('validation') as $item) : ?>
                                <li><?= $item ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
                <form action="<?= site_url($url . '/save') ?>" method="POST" id="formData">
                    <?= input_hidden('id', $id ?? '') ?>
                    <div class=" row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Kategori</label>
                                <?= input_text('kategori_nama', $kategori_nama ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="mb-3">Deskripsi</label>
                                <?= textarea('kategori_deskripsi', $kategori_deskripsi ?? '', '', 'required') ?>
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-save"></i> Simpan</button>
                                <a href="<?= site_url($url) ?>" class="btn btn-danger"><i class="bi bi-reply"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
</div>


<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    let pristine;
    window.onload = function() {
        let form = document.getElementById("formData");

        pristine = new Pristine(form);

        form.addEventListener('submit', function(e) {
            var valid = pristine.validate();
            if (!valid) {
                e.preventDefault();
            }
        });
    };
</script>
<?= $this->endSection() ?>