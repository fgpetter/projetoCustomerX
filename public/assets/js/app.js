
/**
 * Confirma remoção do cliente e seus contatos
 */
function confirmaRemocao() {
    confirm("Você irá deletar o cliente e todos seus contatos. Confirma?");
}

/**
 * Remove alertas após 2 segundos
 */
var divAlert = document.getElementById('alert');
setTimeout(() => {    
    if(divAlert){
        divAlert.style.display = "none";
    }
}, 2000);


/**
 * Permite ao usuário visualizar a senha nos forms de cadastro e login
 */
togglePassword = document.getElementById('togglePassword');
passwordField = document.getElementById('passwordField');
togglePassword.addEventListener('click', function () {
    if(passwordField.type == "password"){
        passwordField.type = "text"
    } else {
        passwordField.type = "password"
    }
})

togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
passwordFieldConfirm = document.getElementById('passwordFieldConfirm');
togglePasswordConfirm.addEventListener('click', function () {
    if(passwordFieldConfirm.type == "password"){
        passwordFieldConfirm.type = "text"
    } else {
        passwordFieldConfirm.type = "password"
    }
})

/**
 * Confere se as senhas são válidas e semelhantes
 */
btnCadastrar = document.getElementById('btnCadastrar');
erroSenha = document.getElementById('erroSenha');
btnCadastrar.addEventListener('click', function (e) {
    if( passwordField.value.length < 6 || passwordFieldConfirm.value.length < 6 ){
        senhaCurta.style.display = "block"
        e.preventDefault()
        return
    }
    if(passwordField.value != passwordFieldConfirm.value){
        erroSenha.style.display = "block"
        e.preventDefault()
    }
})