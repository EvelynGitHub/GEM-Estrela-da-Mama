let cpf = document.getElementById("cpf")
let cep = document.getElementById("cep")
let telefone = document.getElementById("telefone")
let celular = document.getElementById("celular")

// Deste modo os valores são obtidos enquanto digitados
cpf.addEventListener("input", ({ target }) => {
    removePontuacao(target)
    mascaraInput(target, "000.000.000-00")
})

telefone.addEventListener("input", ({ target }) => {
    removePontuacao(target)
    mascaraInput(target, "(00)0000-0000")
})

celular.addEventListener("input", ({ target }) => {
    removePontuacao(target)
    mascaraInput(target, "(00)00000-0000")
})

cep.addEventListener("input", ({ target }) => {
    removePontuacao(target)
    mascaraInput(target, "00000-000")
})


function mascaraInput(valorAny, mascaraAny) {
    let mascara = mascaraAny.split('')
    let valor = valorAny.value.split('')
    let auxiliar = Array();
    let cont = 0;

    mascara.forEach(element => {
        if (element == 0) {
            auxiliar.push(valor[cont])
            cont++
        } else {
            auxiliar.push(element)
        }
    })

    valorAny.value = auxiliar.join('')
}

function removePontuacao(input) {
    const texto = input.value;
    const textoSemHifem = texto.replace(/\-/g, '');
    const textoSemHifemPonto = textoSemHifem.replace(/\./g, '');
    let textoSemParenteses = textoSemHifemPonto.replace(/\(/g, '')
    textoSemParenteses = textoSemParenteses.replace(/\)/g, '')

    input.value = textoSemParenteses;
}


function inicializarEditar() {
    mascaraInput(cpf, "000.000.000-00")
    mascaraInput(telefone, "(00)0000-0000")
    mascaraInput(celular, "(00)00000-0000")
}
