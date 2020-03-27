let radioButtonTipoAssistida = document.querySelector("#tipoAssistida");
let radioButtonTipoVoluntario = document.querySelector("#tipoVoluntario");
let divVoluntario = document.querySelector("#voluntario");
let divAssistida = document.querySelector("#assistida");

radioButtonTipoAssistida.addEventListener('click', () => {
    divVoluntario.setAttribute("hidden", "hidden");
    divAssistida.removeAttribute("hidden");
});

radioButtonTipoVoluntario.addEventListener('click', () => {
    divAssistida.setAttribute("hidden", "hidden");
    divVoluntario.removeAttribute("hidden");
});
