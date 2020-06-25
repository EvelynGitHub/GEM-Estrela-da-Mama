// window.onload = () => {

//     let form = document.querySelector("#chamada");

//     if (form) {

//         form.reset();

//     }

// }
$(document).ready(function () {


    let listaAfiliadosChamada = [];

    if (sessionStorage.getItem("listaAfiliadosChamada")) {
        listaAfiliadosChamada = sessionStorage.getItem("listaAfiliadosChamada").split(",");
    }

    $("input[name*='afiliado']").click(function () {

        if (listaAfiliadosChamada.includes(this.value)) {
            listaAfiliadosChamada.splice(listaAfiliadosChamada.indexOf(this.value), 1)
        } else {
            listaAfiliadosChamada.push(this.value)
        }
        sessionStorage.setItem("listaAfiliadosChamada", listaAfiliadosChamada);

        console.log("Clicou")

    });

    $("#encerrarChamada").click(function () {

        sessionStorage.setItem("listaAfiliadosChamada", "");

        let form = document.querySelector("#chamada");

        if (form) {

            form.reset();

        }
    })


    for (let x = 0; x < listaAfiliadosChamada.length; x++) {
        $("input[value='" + listaAfiliadosChamada[x] + "']").prop("checked", true);
    }


});