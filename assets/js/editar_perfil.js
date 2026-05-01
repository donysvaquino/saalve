function previewImage(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function ativar(id) {
    const input = document.getElementById(id);
    input.removeAttribute('readonly');
    input.focus();
}

function bloquear(input) {
    input.setAttribute('readonly', true);
}

const btnSalvar = document.getElementById('btnSalvar');
const campos = document.querySelectorAll('input[name="nome"], input[name="senha_atual"], input[name="nova_senha"],  #inputFoto');

function destacarBotao() {
    btnSalvar.removeAttribute('disabled');
    btnSalvar.style.background = "var(--gradiente)";
}

campos.forEach(campo => {
    campo.addEventListener('input', destacarBotao);
});

document.getElementById('inputFoto').addEventListener('change', destacarBotao);