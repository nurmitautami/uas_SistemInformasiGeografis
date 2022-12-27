let pristine;
let elFormLogin = document.querySelector('#form-login');

pristineLogin = new Pristine(elFormLogin);

elFormLogin.addEventListener('submit', async function (e) {
    var valid = pristineLogin.validate();
    e.preventDefault();
    if (valid) {
        let post = await fetch(`${apiUrl}/auth`,{
            method : 'POST',
            body: `username=${document.querySelector('[name=username]').value}&password=${document.querySelector('[name=password]').value}`,
            headers : {
                'Content-Type' : 'application/x-www-form-urlencoded'
            }
        });
        let resp = await post.json();
        if(!resp.error)
        {
            Swal.fire({
                title: 'Login sukses!',
                icon: 'success',
                html: 'Silakan klik ok untuk refresh halaman'
            }).then((result) => {
                localStorage.setItem('tokenPw', resp.tokenPw);
                localStorage.setItem('tokenUn', resp.tokenUn);
                location.reload();
            })
        }
        else
        {
            Swal.fire({
                title: 'Login gagal!',
                icon: 'error',
                html: resp.message
            })
        }
    }
});


let logout = () => {
    Swal.fire({
        title: 'Yakin untuk logout?',
        icon: 'warning',
        html: 'Sesi Anda akan diakhiri jika menekan tombol lanjutkan',
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
            localStorage.setItem('tokenUn', '');
            localStorage.setItem('tokenPw', '');
            location.reload();
        }
    })
}