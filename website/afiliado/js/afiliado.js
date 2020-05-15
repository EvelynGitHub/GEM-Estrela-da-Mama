let cpf = document.getElementById("cpf")
let cep = document.getElementById("cep")
let telefone = document.getElementById("telefone")
let celular = document.getElementById("celular")

// Deste modo os valores são obtidos enquanto digitados
cpf.addEventListener("input", ({ target }) => {
    removeLetras(target)
    removePontuacao(target)
    if (validarCPF(target)) {
        mascaraInput(target, "000.000.000-00")
    }
    // habilitar e desabilitar botão  cadastrar e editar dependendo do if
    // Colocar a cor do input vermelha ou verde ???
})

telefone.addEventListener("input", ({ target }) => {
    removeLetras(target)
    removePontuacao(target)
    mascaraInput(target, "(00)0000-0000")
})

celular.addEventListener("input", ({ target }) => {
    removeLetras(target)
    removePontuacao(target)
    mascaraInput(target, "(00)00000-0000")
})

cep.addEventListener("input", ({ target }) => {
    removeLetras(target)
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

function removeLetras(input) {
    let texto = input.value
    input.value = texto.replace(/[^\d]+/g, '')
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
        // console.log("Este CPF é válido")
        return true
    } else {
        // console.log("Este CPF NÃO é válido")
        return false
    }
}

function inicializarEditar() {
    mascaraInput(cpf, "000.000.000-00")
    mascaraInput(telefone, "(00)0000-0000")
    mascaraInput(celular, "(00)00000-0000")
}
