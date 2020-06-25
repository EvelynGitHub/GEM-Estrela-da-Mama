let cpf = document.getElementById("cpf")
let cep = document.getElementById("cep")
let telefone = document.getElementById("telefone")
let celular = document.getElementById("celular")

// Deste modo os valores são obtidos enquanto digitados
cpf.addEventListener("input", ({ target }) => {
    let valorCpf = removeLetras(target)
    valorCpf = removePontuacao(valorCpf)

    if (validarCPF(target)) {
        if (window.location.pathname == "/afiliado/cadastrar") {
            document.getElementById("btnCadastrar").disabled = false;
        }
        if (window.location.pathname == "/afiliado/editar") {
            document.getElementById("btn-editar").disabled = false;
        }
        cpf.classList.remove('erro')
    } else {
        if (window.location.pathname == "/afiliado/cadastrar") {
            document.getElementById("btnCadastrar").disabled = true;
        }
        if (window.location.pathname == "/afiliado/editar") {
            document.getElementById("btn-editar").disabled = true;
        }
        cpf.classList.add('erro')
    }

    valorCpf = mascaraInput(valorCpf, "000.000.000-00")
    target.value = valorCpf
})

telefone.addEventListener("input", ({ target }) => {
    let valorTelefone = removeLetras(target)
    valorTelefone = removePontuacao(valorTelefone)
    valorTelefone = mascaraInput(valorTelefone, "(00)0000-0000")
    target.value = valorTelefone
})

celular.addEventListener("input", ({ target }) => {
    let valorCelular = removeLetras(target)
    valorCelular = removePontuacao(valorCelular)
    valorCelular = mascaraInput(valorCelular, "(00)00000-0000")

    target.value = valorCelular
})

if (window.location.pathname == "/afiliado/cadastrar") {
    cep.addEventListener("input", ({ target }) => {
        let valorCep = removeLetras(target)
        valorCep = removePontuacao(valorCep)
        valorCep = mascaraInput(valorCep, "00000-000")

        target.value = valorCep
    })
}


function mascaraInput(valorAny, mascaraAny) {

    let valor = valorAny.split('')
    let mascara = mascaraAny.split('')
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

    if (removePontuacao(mascaraAny).length <= valor.length) {
        return auxiliar.join('')
    }

    return valorAny
}

function removePontuacao(input) {

    const texto = input;
    const textoSemHifem = texto.replace(/\-/g, '');
    const textoSemHifemPonto = textoSemHifem.replace(/\./g, '');
    let textoSemParenteses = textoSemHifemPonto.replace(/\(/g, '')
    textoSemParenteses = textoSemParenteses.replace(/\)/g, '')

    return textoSemParenteses;
}

function removeLetras(input) {
    let texto = input.value

    return texto.replace(/[^\d]+/g, '')
}

function validarCPF(input) {
    let valor = input.value.split('')
    let soma = 0
    let cont = 10

    for (let index = 0; index < valor.length - 2; index++) {
        soma = soma + (valor[index] * cont--);
    }

    let digito1 = ((11 - (soma % 11)) >= 10) ? 0 : (11 - (soma % 11))

    soma = 0
    cont = 11
    for (let index = 0; index < valor.length - 1; index++) {
        soma = soma + (valor[index] * cont--);
    }

    let digito2 = ((11 - (soma % 11)) >= 10) ? 0 : (11 - (soma % 11))

    if (valor[9] == digito1 && valor[10] == digito2) {
        console.log("Este CPF é válido")
        return true
    } else {
        console.log("Este CPF NÃO é válido")
        return false
    }
}

function inicializarEditar() {
    cpf.value = mascaraInput(cpf.value, "000.000.000-00")
    telefone.value= mascaraInput(telefone.value, "(00)0000-0000")
    celular.value = mascaraInput(celular.value, "(00)00000-0000")
}