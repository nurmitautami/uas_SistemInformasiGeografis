<script src="/mazer/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/mazer/assets/js/bootstrap.bundle.min.js"></script>
<script src="/mazer/assets/js/mazer.js"></script>
<script src="/mazer/assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="https://combinatronics.com/Sha256/Pristine/master/dist/pristine.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php
    if (session()->getFlashdata('info')) {
    ?>
        Swal.fire({
            icon: '<?= session()->getFlashdata('info') ?>',
            title: '<?= session()->getFlashdata('message') ?>',
        })
    <?php
    }
    ?>


    let deleteData = (thisValue) => {
        Swal.fire({
            title: 'Yakin hapus data?',
            icon: 'warning',
            html: 'Data akan dihapus permanent',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: true,
            confirmButtonText: '<i class="bi bi-check"></i> Lanjutkan',
            confirmButtonAriaLabel: 'Lanjutkan dihapus',
            cancelButtonText: '<i class="bi bi-x"></i> Batal',
            cancelButtonAriaLabel: 'Batalkan'
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location = thisValue.getAttribute('data-href');
            }
        })
    }
</script>