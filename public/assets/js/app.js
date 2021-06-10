
function confirmaRemocao() {
    confirm("Você irá deletar o cliente e todos seus contatos. Confirma?");
}

var divAlert = document.getElementById('alert');

setTimeout(() => {
    
    if(divAlert){
        divAlert.style.display = "none";
    }

}, 2000);