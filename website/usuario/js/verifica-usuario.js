let senha = document.querySelector("#senha");
let confirmarSenha = document.querySelector("#confirmar-senha");
let botaoCadastrar = document.querySelector("#botaoCadastrar");


botaoCadastrar.addEventListener("click",verificarSenha());

function verificarSenha(){
    if(senha.value != confirmarSenha){
        alert("As senhas estao diferente");
        return false;
    }
    else{
        return true;
    }
}
