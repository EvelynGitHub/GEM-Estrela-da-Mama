$(document).ready(function () {

    let listaAfiliados = sessionStorage.getItem("listaAfiliados").split(",");

    for (let x = 0; x < listaAfiliados.length; x++) {
        $("input[value='" + listaAfiliados[x] + "']").prop("checked", true);
    }


    $("input[name*='afiliado']").click(function () {

        if (listaAfiliados.includes(this.value)) {
            listaAfiliados.splice(listaAfiliados.indexOf(this.value), 1)
        } else {
            listaAfiliados.push(this.value)
        }
        sessionStorage.setItem("listaAfiliados", listaAfiliados);

    });

    $("#finalizaChamada").click(function () {

        sessionStorage.setItem("listaAfiliados", "");

        let form = document.querySelector("#frequencia");

        if (form) {

            form.reset();

        }
    })






});