<?= $this->extend('_Layouts/IndexView') ?>
<?= $this->section('content'); ?>
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-grey">Peta Pertambangan</h5>
                </div>
                <div class="card-body">
                    <div id="mapid" style=" height: 400px;"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-grey">Create Data Potensial dan Aktivitas Manusia</h5>
                </div>
                <div class="card-body">
                    <form action="/potensial/store" method="POST" enctype="multipart/form-data">
                        <?php if ($validation->hasError('checkbox')) { ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Silahkan Centang Kotak Di Bawah ! </strong>Untuk memastikan data yang kamu masukan sudah benar silahkan baca kembali inputan kamu
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label>ID Potensial</label>
                            <input type="text" class="form-control <?= ($validation->hasError('id_potensial')) ? 'is-invalid' : ''; ?>" name="id_potensial" value="<?= old('id_potensial'); ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('id_potensial'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kondisi Lahan</label>
                            <input type="text" class="form-control <?= ($validation->hasError('kondisi_lahan')) ? 'is-invalid' : ''; ?>" name="kondisi_lahan" value="<?= old('kondisi_lahan'); ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->getError('kondisi_lahan'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Akses</label>
                            <input type="text" class="form-control <?= ($validation->hasError('akses')) ? 'is-invalid' : ''; ?>" name="akses" value="<?= old('akses'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('akses'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Aktivitas</label>
                            <input type="text" class="form-control <?= ($validation->hasError('jenis_aktivitas')) ? 'is-invalid' : ''; ?>" name="jenis_aktivitas" value="<?= old('jenis_aktivitas'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('jenis_aktivitas'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Intensitas</label>
                            <input type="text" class="form-control <?= ($validation->hasError('intensitas')) ? 'is-invalid' : ''; ?>" name="intensitas" value="<?= old('intensitas'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('intensitas'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Dampak</label>
                            <input type="text" class="form-control <?= ($validation->hasError('dampak')) ? 'is-invalid' : ''; ?>" name="dampak" value="<?= old('dampak'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('dampak'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Foto Lokasi</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto_lokasi" name="foto_lokasi" onchange="img()">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Latitude</label>
                            <input id="Latitude" type="text" class="form-control <?= ($validation->hasError('latitude')) ? 'is-invalid' : ''; ?>" name="latitude" value="<?= old('latitude'); ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('latitude'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input id="Longitude" type="text" class="form-control <?= ($validation->hasError('longitude')) ? 'is-invalid' : ''; ?>" name="longitude" value="<?= old('longitude'); ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('longitude'); ?>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="checkbox">
                            <label class="form-check-label">Data Sudah Benar</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>

<script type='text/javascript'>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [-3.657774, 102.299013];
    }

    var L = window.L;

    var mymap = L.map('mapid').setView([-3.657774, 102.299013], 8);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    }).addTo(mymap);

    mymap.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation, {
        draggable: 'true'
    });

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $("#Latitude").val(position.lat);
        $("#Longitude").val(position.lng).keyup();
    });


    document.addEventListener("DOMContentLoaded", function(event) {
        $("#Latitude, #Longitude").change(function() {
            var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            mymap.panTo(position);
        });
    });
    mymap.addLayer(marker);
</script>
<script>
    function img() {
        const gambarLabel = document.querySelector('.custom-file-label');
        gambarLabel.textContent = foto_lokasi.files[0].name;
    }
</script>
<?= $this->endSection(); ?>