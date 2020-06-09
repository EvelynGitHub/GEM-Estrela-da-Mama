let senha = document.querySelector("#senha");
let confirmarSenha = document.querySelector("#confirmar-senha");
let botaoCadastrar = document.querySelector("#botaoCadastrar");


botaoCadastrar.addEventListener("change",verificarSenha);

function verificarSenha(){
    if(senha.value != confirmarSenha){
        senha.style.background = "lightcoral";
        confirmarSenha.style.background = "lightcoral";
        
        senha.style.border = "1px solid red";
        confirmarSenha.style.border = "1px solid red";
        
    }
    else{
        
        senha.style.background = "greenyellow";
        confirmarSenha.style.background = "greenyellow";    
        senha.style.border = "1px solid";
        confirmarSenha.style.border = "1px solid";
        botaoCadastrar.disabled = false;           
    }
}
