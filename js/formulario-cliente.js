const formulario = document.querySelector(".formulario");

formulario.addEventListener("submit", function (event) {

    event.preventDefault();

    if (validarTudo()) {

        alert("✅ Dados cadastrados com sucesso!");

        formulario.submit();

    } else {

        alert("❌ Verifique os campos!");
    }

});


// =========================
// VALIDAR TUDO
// =========================
function validarTudo() {

    let valido = true;

    if (!validarNome()) {
        valido = false;
    }

    if (!validarEmail()) {
        valido = false;
    }

    if (!validarSenha()) {
        valido = false;
    }

    // Só valida CPF se existir
    const cpf = document.getElementById("txtCpf");

    if (cpf && !validarCpf()) {
        valido = false;
    }

    // Só valida RG se existir
    const rg = document.getElementById("txtRg");

    if (rg && !validarRg()) {
        valido = false;
    }

    return valido;
}


// =========================
// NOME
// =========================
function validarNome() {

    const campo = document.getElementById("txtNome");

    if (campo.value.trim().length < 3) {

        erro(campo);

        alert("Nome deve ter no mínimo 3 caracteres!");

        return false;
    }

    sucesso(campo);

    return true;
}


// =========================
// EMAIL
// =========================
function validarEmail() {

    const campo = document.getElementById("txtEmail");

    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!regex.test(campo.value)) {

        erro(campo);

        alert("E-mail inválido!");

        return false;
    }

    sucesso(campo);

    return true;
}


// =========================
// SENHA
// =========================
function validarSenha() {

    const senha = document.getElementById("txtSenha");

    const confirmar = document.getElementById("txtConfirmarSenha");

    if (senha.value.length < 6) {

        erro(senha);

        alert("A senha deve ter no mínimo 6 caracteres!");

        return false;
    }

    if (senha.value !== confirmar.value) {

        erro(senha);
        erro(confirmar);

        alert("As senhas não coincidem!");

        return false;
    }

    sucesso(senha);
    sucesso(confirmar);

    return true;
}


// =========================
// CPF
// =========================
function validarCpf() {

    const campo = document.getElementById("txtCpf");

    const cpf = campo.value.replace(/\D/g, "");

    if (cpf.length < 11) {

        erro(campo);

        alert("CPF inválido!");

        return false;
    }

    sucesso(campo);

    return true;
}


// =========================
// RG
// =========================
function validarRg() {

    const campo = document.getElementById("txtRg");

    const rg = campo.value.replace(/\D/g, "");

    if (rg.length < 9) {

        erro(campo);

        alert("RG inválido!");

        return false;
    }

    sucesso(campo);

    return true;
}


// =========================
// ESTILO ERRO
// =========================
function erro(campo) {

    campo.style.border = "2px solid red";
}


// =========================
// ESTILO SUCESSO
// =========================
function sucesso(campo) {

    campo.style.border = "2px solid green";
}