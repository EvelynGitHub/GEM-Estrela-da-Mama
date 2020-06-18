let btnEncerrarChamada = document.querySelector("#finalizaChamada");

btnEncerrarChamada.disabled = true;
btnEncerrarChamada.style.cursor = 'no-drop';

function habilitaBotao() {

    var hora = new Date().getHours();

    if (hora >= 16 && hora < 18) {

        btnEncerrarChamada.disabled = false;
        btnEncerrarChamada.style.cursor = 'pointer';

    } else {

        btnEncerrarChamada.disabled = true;
        btnEncerrarChamada.style.cursor = 'no-drop';

    }

}

setInterval(habilitaBotao, 60000);


