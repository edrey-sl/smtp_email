const formulario_c = document.querySelector('#formulario');
const spinner_c = document.querySelector('#spinner_load');

formulario_c.addEventListener('submit', function(e) {
    e.preventDefault();
    Datos();
})

function Datos() {
    llamarSpinner_coti();
    const datos = new FormData(formulario_c);
    fetch('correo.php', {
            method: 'POST',
            body: datos,

        })
        .then(res => res.json())
        .then(res => {
            formreset_c();
            if (res === 'error') {

                llamarSpinner_coti();
                setTimeout(() => {
                    spinner_c.style.display = 'none';
                    refrescarespiner_coti();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `¡Error al mandar tus datos!`,
                        footer: '¡Vuelve a intentarlo!'
                    })

                }, 3000);
                spinner_c.style.display = 'flex';
            } else {
                formreset_c();
                llamarSpinner_coti();

                setTimeout(() => {
                    spinner_c.style.display = 'none';
                    refrescarespiner_coti();
                    Swal.fire({
                        icon: 'success',
                        title: 'Gracias',
                        text: `¡Tu información se envió de manera satisfactoria!`,
                        footer: 'Nos comunicaremos contigo'
                    })

                }, 2000);
                spinner_c.style.display = 'flex';

            }
        })

}


function llamarSpinner_coti() {
    spinner_c.innerHTML = `  
    
    <div class="spinner">
  <div class="rect1"></div>
  <div class="rect2"></div>
  <div class="rect3"></div>
  <div class="rect4"></div>
  <div class="rect5"></div>
</div>`
}

function formreset_c() {
    formulario_c.reset();
}

function refrescarespiner_coti() {
    spinerquitar_coti = document.querySelector('.spinner');
    spinerquitar_coti.remove();
}