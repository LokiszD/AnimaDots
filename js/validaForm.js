//Funções para validação dos formulários de gerenciamento de animais (funcionario/gerenciarAnimais.php)

//Função para limpar formulário de cadastro de animais ao fechar ou cancelar
function apagaForm() {
    document.getElementById('formCadastro').reset()
}

//Função para apagar o check do formulário de excluir animais ao fechar ou cancelar
function apagaCheck() {
    document.getElementById('formExcluir').reset()
}

//Função para remover a validação ao fechar (no X) o formulário de cadastro de animais
$("#fechar").click(function() {
    $("label.error").hide();
    $(".error").removeClass("error");
});

//Função para remover a validação ao cancelar o formulário de cadastro de animais
$("#cancelar").click(function() {
    $("label.error").hide();
    $(".error").removeClass("error");
});

//Função para remover a validação ao fechar (no X) o formulário de alteração de animais
$("#fecharEditar").click(function() {
    $("label.error").hide();
    $(".error").removeClass("error");
});

//Função para remover a validação ao cancelar o formulário de alteração de animais
$("#cancelarEditar").click(function() {
    $("label.error").hide();
    $(".error").removeClass("error");
});

//Validação do formulário de cadastro de animais
jQuery.validator.addMethod("noSpace", function(value, element) {
    return value == '' || value.trim().length != 0;
}, "Por favor, insira um nome válido!");

var $formCadastro = $('#formCadastro');
if ($formCadastro.length) {
    $formCadastro.validate({
        rules: {
            nome_animal: {
                required: true,
            },
            sexo_animal: {
                required: true,
            },
            raca_animal: {
                required: true
            },
            idade_animal: {
                required: true
            },
            vacinado_animal: {
                required: true
            },
            castrado_animal: {
                required: true
            },
            vermifugado_animal: {
                required: true
            },
            especie_animal: {
                required: true
            },
            cor_animal: {
                required: true
            },
            porte_animal: {
                required: true
            },
            foto_animal: {
                required: true
            },
            adotado_animal: {
                required: true
            }
        },
        messages: {
            nome_animal: {
                required: 'Por favor, insira o nome do animal!'
            },
            sexo_animal: {
                required: "Por favor, selecione o sexo do animal!",
            },
            raca_animal: {
                required: "Por favor, informe a raça do animal!"
            },
            idade_animal: {
                required: "Por favor, informe a idade do animal!"
            },
            vacinado_animal: {
                required: "Por favor, selecione uma das opções!"
            },
            castrado_animal: {
                required: "Por favor, selecione uma das opções!"
            },
            vermifugado_animal: {
                required: "Por favor, selecione uma das opções!"
            },
            especie_animal: {
                required: "Por favor, esolha a espécie do animal!"
            },
            cor_animal: {
                required: "Por favor, informe a cor do animal!"
            },
            porte_animal: {
                required: "Por favor, selecione o porte do animal!"
            },
            foto_animal: {
                required: "Por favor, insira uma foto do animal!"
            },
            adotado_animal: {
                required: "Por favor, selecione uma das opções!"
            }
        },

        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.input-group'))
            } else {
                error.insertAfter(element)
            }
        },

        submitHandler: function(form) {
            alert("Animal cadastrado com sucesso!")
            form.submit()
        }
    })
}

//Função para validar o formulário de exclusão de animais
var $formExcluir = $('#formExcluir')
if ($formExcluir.length) {
    $formExcluir.validate({
        rules: {
            check: {
                required: true
            }
        },
        messages: {
            check: {
                required: "Por favor, concorde com a exclusão. Uma vez excluído, não será possível desfazer essa ação!"
            }
        },

        errorPlacement: function(error, element) {
            if (element.is(":checkbox")) {
                error.appendTo(element.parents('.confExcluir'))
            }
        },

        submitHandler: function(form) {
            alert("Animal excluído com sucesso!")
            form.submit()
        }
    })
}

//Função para validar formulário de alteração de animais
var $formEditar = $('#formEditar')
if ($formEditar.length) {
    $formEditar.validate({
        rules: {
            nome_animal: {
                required: true,
            },
            sexo_animal: {
                required: true,
            },
            raca_animal: {
                required: true
            },
            idade_animal: {
                required: true
            },
            vacinado_animal: {
                required: true
            },
            castrado_animal: {
                required: true
            },
            vermifugado_animal: {
                required: true
            },
            especie_animal: {
                required: true
            },
            cor_animal: {
                required: true
            },
            porte_animal: {
                required: true
            },
            adotado_animal: {
                required: true
            }
        },
        messages: {
            nome_animal: {
                required: 'Por favor, insira o nome do animal!'
            },
            sexo_animal: {
                required: "Por favor, selecione o sexo do animal!",
            },
            raca_animal: {
                required: "Por favor, informe a raça do animal!"
            },
            idade_animal: {
                required: "Por favor, informe a idade do animal!"
            },
            vacinado_animal: {
                required: "Por favor, selecione uma das opções!"
            },
            castrado_animal: {
                required: "Por favor, selecione uma das opções!"
            },
            vermifugado_animal: {
                required: "Por favor, selecione uma das opções!"
            },
            especie_animal: {
                required: "Por favor, esolha a espécie do animal!"
            },
            cor_animal: {
                required: "Por favor, informe a cor do animal!"
            },
            porte_animal: {
                required: "Por favor, selecione o porte do animal!"
            },
            adotado_animal: {
                required: "Por favor, selecione uma das opções!"
            }
        },
        submitHandler: function(form) {
            alert("Animal alterado com sucesso!")
            form.submit()
        }
    })
}

//////////////////////////////////////////////////////////////////////////////////////////////


//Funções para validação dos formulários de análise de adoções (funcionario/analisarAdocao.php)

//Função para apagar o check do negar/aprovar ao fechar o formulário de resposta de adoção
function apagaConfirma() {
    document.getElementById('formAnaliseAdocao').reset()
}

//Função para validar o formulário de análise de adoção
var $formAnaliseAdocao = $('#formAnaliseAdocao')
if ($formAnaliseAdocao.length) {
    $formAnaliseAdocao.validate({
        rules: {
            check: {
                required: true
            }
        },
        messages: {
            check: {
                required: "Por favor, concorde com a ação antes de continuar!"
            }
        },

        errorPlacement: function(error, element) {
            if (element.is(":checkbox")) {
                error.appendTo(element.parents('.confirmar'))
            }
        },

        submitHandler: function(form) {
            alert("Adoção respondida com sucesso!")
            form.submit()
        }
    })
}

///////////////////////////////////////////////////////////////////////////////////////////////


//Funções para validação dos formulários de gerenciamento de funcionários (funcionario/gerenciarFuncionarios.php)

//Função para limpar formulário de cadastro de funcionários ao fechar ou cancelar
function apagaForm() {
    document.getElementById('formCadastroFunc').reset()
}

//Função para apagar o check do excluir ao fechar ou cancelar
function apagaCheck() {
    document.getElementById('formExcluirFunc').reset()
}

//Validação do formulário de cadastro de funcionários 
var $formCadastroFunc = $('#formCadastroFunc')
if ($formCadastroFunc.length) {
    $formCadastroFunc.validate({
        rules: {
            nome_funcionario: {
                required: true,
            },
            rg_funcionario: {
                required: true,
            },
            cpf_funcionario: {
                required: true
            },
            telefone_funcionario: {
                required: true
            },
            login_funcionario: {
                required: true
            },
            senha_funcionario: {
                required: true
            },
            endereco_funcionario: {
                required: true
            },
            nivel_funcionario: {
                required: true
            }
        },
        messages: {
            nome_funcionario: {
                required: "Por favor, insira o nome do funcionário!",
            },
            rg_funcionario: {
                required: "Por favor, insira o RG do funcionário!",
            },
            cpf_funcionario: {
                required: "Por favor, insira o CPF do funcionário!"
            },
            telefone_funcionario: {
                required: "Por favor, insira o telefone do funcionário!"
            },
            login_funcionario: {
                required: "Por favor, insira o login do funcionário!"
            },
            senha_funcionario: {
                required: "Por favor, insira a senha do funcionário!"
            },
            endereco_funcionario: {
                required: "Por favor, insira o endereço do funcionário!"
            },
            nivel_funcionario: {
                required: "Por favor, insira o nível do funcionário!"
            }
        },

        submitHandler: function(form) {
            alert("Funcionário cadastrado com sucesso!")
            form.submit()
        }
    })
}

//Validação do formulário de alteração de funcionários
var $formEditarFunc = $('#formEditarFunc')
if ($formEditarFunc.length) {
    $formEditarFunc.validate({
        rules: {
            nome_funcionario: {
                required: true,
            },
            rg_funcionario: {
                required: true,
            },
            cpf_funcionario: {
                required: true
            },
            telefone_funcionario: {
                required: true
            },
            login_funcionario: {
                required: true
            },
            senha_funcionario: {
                required: true
            },
            endereco_funcionario: {
                required: true
            },
            nivel_funcionario: {
                required: true
            }
        },
        messages: {
            nome_funcionario: {
                required: "Por favor, insira o nome do funcionário!",
            },
            rg_funcionario: {
                required: "Por favor, insira o RG do funcionário!",
            },
            cpf_funcionario: {
                required: "Por favor, insira o CPF do funcionário!"
            },
            telefone_funcionario: {
                required: "Por favor, insira o telefone do funcionário!"
            },
            login_funcionario: {
                required: "Por favor, insira o login do funcionário!"
            },
            senha_funcionario: {
                required: "Por favor, insira a senha do funcionário!"
            },
            endereco_funcionario: {
                required: "Por favor, insira o endereço do funcionário!"
            },
            nivel_funcionario: {
                required: "Por favor, insira o nível do funcionário!"
            }
        },

        submitHandler: function(form) {
            alert("Funcionário alterado com sucesso!")
            form.submit()
        }
    })
}


//Função para validar o formulário de exclusão de funcionários
var $formExcluirFunc = $('#formExcluirFunc')
if ($formExcluirFunc.length) {
    $formExcluirFunc.validate({
        rules: {
            check: {
                required: true
            }
        },
        messages: {
            check: {
                required: "Por favor, concorde com a exclusão. Uma vez excluído, não será possível desfazer essa ação!"
            }
        },

        errorPlacement: function(error, element) {
            if (element.is(":checkbox")) {
                error.appendTo(element.parents('.confExcluir'))
            }
        },

        submitHandler: function(form) {
            alert("Funcionário excluído com sucesso!")
            form.submit()
        }
    })
}

///////////////////////////////////////////////////////////////////////////////////////////////


//Funções para validação dos formulários de adoção (animal/formAdocao.php)

//Função para validar o formulário de adoção
var $formCadastro = $('#formAdocao');
if ($formCadastro.length) {
    $formCadastro.validate({
        rules: {
            nome_internauta: {
                required: true,
            },
            idade_internauta: {
                required: true,
                min: 18
            },
            rg_internauta: {
                required: true
            },
            cpf_internauta: {
                required: true
            },
            telefone_internauta: {
                required: true
            },
            email_internauta: {
                required: true
            },
            endereco_internauta: {
                required: true
            },
            numeroCasa_internauta: {
                required: true
            },
            bairro_internauta: {
                required: true
            },
            cep_internauta: {
                required: true
            },
            residencia_internauta: {
                required: true
            },
            cidade_internauta: {
                required: true
            },
            preferenciaAnimal_internauta: {
                required: true
            }
        },
        messages: {
            nome_internauta: {
                required: "Campo obrigatório!",
            },
            idade_internauta: {
                required: "Campo obrigatório",
                min: "Adoções são permitidas apenas para maiores de idade.",
            },
            rg_internauta: {
                required: "Campo obrigatório!"
            },
            cpf_internauta: {
                required: "Campo obrigatório!"
            },
            telefone_internauta: {
                required: "Campo obrigatório!"
            },
            email_internauta: {
                required: "Campo obrigatório!"
            },
            endereco_internauta: {
                required: "Campo obrigatório!"
            },
            numeroCasa_internauta: {
                required: "PCampo obrigatório!"
            },
            bairro_internauta: {
                required: "Campo obrigatório!"
            },
            cep_internauta: {
                required: "Campo obrigatório!"
            },
            residencia_internauta: {
                required: "Campo obrigatório!"
            },
            cidade_internauta: {
                required: "Campo obrigatório!"
            },
            preferenciaAnimal_internauta: {
                required: "Campo obrigatório!"
            }
        },

        errorPlacement: function(error, element) {
            if (element.is(":radio")) {
                error.appendTo(element.parents('.row'))
            } else {
                error.insertAfter(element)
            }
        },

        submitHandler: function(form) {
            alert("Pedido de adoção enviado com sucesso! Fique atento ao seu e-mail para o recebimento da resposta nos próximos dias.")
            form.submit()
        }
    })
}

///////////////////////////////////////////////////////////////////////////////////////////////


//Funções para validação dos formulários do perfil do funcionario (funcionario/perfilFuncionario.php)

//Função para validar o formulário de alteração dos dados do perfil
var $formEditar = $('#formEditarPerfil')
if ($formEditar.length) {
    $formEditar.validate({
        rules: {
            nome_funcionario: {
                required: true,
            },
            rg_funcionario: {
                required: true,
            },
            cpf_funcionario: {
                required: true
            },
            telefone_funcionario: {
                required: true
            },
            login_funcionario: {
                required: true
            },
            senha_funcionario: {
                required: true
            },
            endereco_funcionario: {
                required: true
            },
            nivel_funcionario: {
                required: true
            }
        },
        messages: {
            nome_funcionario: {
                required: "Por favor, preencha este campo!",
            },
            rg_funcionario: {
                required: "Por favor, preencha este campo!",
            },
            cpf_funcionario: {
                required: "Por favor, preencha este campo!"
            },
            telefone_funcionario: {
                required: "Por favor, preencha este campo!"
            },
            login_funcionario: {
                required: "Por favor, preencha este campo!"
            },
            senha_funcionario: {
                required: "Por favor, preencha este campo!"
            },
            endereco_funcionario: {
                required: "Por favor, preencha este campo!"
            },
            nivel_funcionario: {
                required: "Por favor, preencha este campo!"
            }
        },

        submitHandler: function(form) {
            alert("Dados alterados com sucesso!")
            form.submit()
        }
    })
}