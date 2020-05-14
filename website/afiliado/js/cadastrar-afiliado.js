let radioButtonTipoAssistida = document.querySelector("#tipoAssistida");
let radioButtonTipoVoluntario = document.querySelector("#tipoVoluntario");

let divVoluntario = document.querySelector("#voluntario");
let divAssistida = document.querySelector("#assistida");

let inputInteresseVoluntario = document.querySelector("#interesse");

let btnCancelar = document.querySelector("#btn-cancelar");

radioButtonTipoAssistida.addEventListener('click', () => {

    divVoluntario.setAttribute("hidden", "hidden");
    divAssistida.removeAttribute("hidden");

    inputInteresseVoluntario.removeAttribute("required");

});

radioButtonTipoVoluntario.addEventListener('click', () => {

    divAssistida.setAttribute("hidden", "hidden");
    divVoluntario.removeAttribute("hidden");

    inputInteresseVoluntario.setAttribute("required", "required");

});

// btnCancelar.addEventListener('click', () => {

//     window.location.pathname = '/lista-geral';

// });



