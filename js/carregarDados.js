//Carrega os dados do modal de edição (funcionario/gerenciarAnimais.php)
$(function() {
    var modalEditar = document.getElementById('modalEditar')
    modalEditar.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalEditar #id_animal')[0].value = button.getAttribute('data-bs-Id')
        $('#modalEditar #nome_animal')[0].value = button.getAttribute('data-bs-Nome')
        $('#modalEditar #sexo_animal').filter('[value=' + button.getAttribute('data-bs-Sexo') + ']').prop('checked', true)
        $('#modalEditar #raca_animal')[0].value = button.getAttribute('data-bs-Raca')
        $('#modalEditar #idade_animal')[0].value = button.getAttribute('data-bs-Idade')
        $('#modalEditar #vacinado_animal').filter('[value=' + button.getAttribute('data-bs-Vacinado') + ']').prop('checked', true)
        $('#modalEditar #castrado_animal').filter('[value=' + button.getAttribute('data-bs-Castrado') + ']').prop('checked', true)
        $('#modalEditar #vermifugado_animal').filter('[value=' + button.getAttribute('data-bs-Vermifugado') + ']').prop('checked', true)
        $('#modalEditar #especie_animal')[0].value = button.getAttribute('data-bs-Especie')
        $('#modalEditar #cor_animal')[0].value = button.getAttribute('data-bs-Cor')
        $('#modalEditar #porte_animal').filter('[value=' + button.getAttribute('data-bs-Porte') + ']').prop('checked', true)
        $('#modalEditar #deficiencia_animal')[0].value = button.getAttribute('data-bs-Deficiencia')
        $('#modalEditar #foto_animal').attr("src", button.getAttribute('data-bs-Foto'))
        $('#modalEditar #video_animal').attr("src", button.getAttribute('data-bs-Video'))
        $('#modalEditar #adotado_animal').filter('[value=' + button.getAttribute('data-bs-Adotado') + ']').prop('checked', true)
        $('#modalEditar #notas_animal')[0].value = button.getAttribute('data-bs-Notas')
    })
})


//Carrega os dados do modal de exclusão (funcionario/gerenciarAnimais.php)
$(function() {
    var modalExcluir = document.getElementById('modalExcluir')
    modalExcluir.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalExcluir #id_animal')[0].value = button.getAttribute('data-bs-id')
        $('#modalExcluir #nome_animal')[0].value = button.getAttribute('data-bs-nome')
        $('#modalExcluir #sexo_animal').filter('[value=' + button.getAttribute('data-bs-sexo') + ']').prop('checked', true)
        $('#modalExcluir #raca_animal')[0].value = button.getAttribute('data-bs-raca')
        $('#modalExcluir #idade_animal')[0].value = button.getAttribute('data-bs-idade')
        $('#modalExcluir #vacinado_animal').filter('[value=' + button.getAttribute('data-bs-vacinado') + ']').prop('checked', true)
        $('#modalExcluir #castrado_animal').filter('[value=' + button.getAttribute('data-bs-castrado') + ']').prop('checked', true)
        $('#modalExcluir #vermifugado_animal').filter('[value=' + button.getAttribute('data-bs-vermifugado') + ']').prop('checked', true)
        $('#modalExcluir #especie_animal')[0].value = button.getAttribute('data-bs-especie')
        $('#modalExcluir #cor_animal')[0].value = button.getAttribute('data-bs-cor')
        $('#modalExcluir #porte_animal').filter('[value=' + button.getAttribute('data-bs-porte') + ']').prop('checked', true)
        $('#modalExcluir #deficiencia_animal')[0].value = button.getAttribute('data-bs-deficiencia')
        $('#modalExcluir #foto_animal').attr("src", button.getAttribute('data-bs-foto'))
        $('#modalExcluir #video_animal').attr("src", button.getAttribute('data-bs-video'))
        $('#modalExcluir #adotado_animal').filter('[value=' + button.getAttribute('data-bs-adotado') + ']').prop('checked', true)
        $('#modalExcluir #notas_animal')[0].value = button.getAttribute('data-bs-notas')
    })
})


//Carrega os dados do modal de consulta (funcionario/gerenciarAnimais.php)
$(function() {
    var modalConsultar = document.getElementById('modalConsultar')
    modalConsultar.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalConsultar #id_animal')[0].value = button.getAttribute('data-bs-Id')
        $('#modalConsultar #nome_animal')[0].value = button.getAttribute('data-bs-Nome')
        $('#modalConsultar #sexo_animal').filter('[value=' + button.getAttribute('data-bs-Sexo') + ']').prop('checked', true)
        $('#modalConsultar #raca_animal')[0].value = button.getAttribute('data-bs-Raca')
        $('#modalConsultar #idade_animal')[0].value = button.getAttribute('data-bs-Idade')
        $('#modalConsultar #vacinado_animal').filter('[value=' + button.getAttribute('data-bs-Vacinado') + ']').prop('checked', true)
        $('#modalConsultar #castrado_animal').filter('[value=' + button.getAttribute('data-bs-Castrado') + ']').prop('checked', true)
        $('#modalConsultar #vermifugado_animal').filter('[value=' + button.getAttribute('data-bs-Vermifugado') + ']').prop('checked', true)
        $('#modalConsultar #especie_animal')[0].value = button.getAttribute('data-bs-Especie')
        $('#modalConsultar #cor_animal')[0].value = button.getAttribute('data-bs-Cor')
        $('#modalConsultar #porte_animal').filter('[value=' + button.getAttribute('data-bs-Porte') + ']').prop('checked', true)
        $('#modalConsultar #deficiencia_animal')[0].value = button.getAttribute('data-bs-Deficiencia')
        $('#modalConsultar #foto_animal').attr("src", button.getAttribute('data-bs-foto'))
        $('#modalConsultar #video_animal').attr("src", button.getAttribute('data-bs-video'))
        $('#modalConsultar #adotado_animal').filter('[value=' + button.getAttribute('data-bs-Adotado') + ']').prop('checked', true)
        $('#modalConsultar #notas_animal')[0].value = button.getAttribute('data-bs-Notas')
    })
})


//Carrega os dados do modal de resposta da análise de adoção (funcionario/analisarAdocao.php)
$(function() {
    var modalResponderAdocao = document.getElementById('modalResponderAdocao')
    modalResponderAdocao.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalResponderAdocao #modal-title').html(button.getAttribute('data-bs-idA'))
        $('#modalResponderAdocao #nome_internauta').val(button.getAttribute('data-bs-nomeInternauta'))
        $('#modalResponderAdocao #idade_internauta').val(button.getAttribute('data-bs-idadeInternauta'))
        $('#modalResponderAdocao #rg_internauta')[0].value = button.getAttribute('data-bs-rg')
        $('#modalResponderAdocao #cpf_internauta')[0].value = button.getAttribute('data-bs-cpf')
        $('#modalResponderAdocao #telefone_internauta')[0].value = button.getAttribute('data-bs-telefone')
        $('#modalResponderAdocao #email_internauta')[0].value = button.getAttribute('data-bs-email')
        $('#modalResponderAdocao #endereco_internauta')[0].value = button.getAttribute('data-bs-endereco')
        $('#modalResponderAdocao #complemento_internauta')[0].value = button.getAttribute('data-bs-complemento')
        $('#modalResponderAdocao #bairro_internauta')[0].value = button.getAttribute('data-bs-bairro')
        $('#modalResponderAdocao #cep_internauta')[0].value = button.getAttribute('data-bs-cep')
        $('#modalResponderAdocao #residencia_internauta')[0].value = button.getAttribute('data-bs-residencia')
        $('#modalResponderAdocao #cidade_internauta')[0].value = button.getAttribute('data-bs-cidade')
        $('#modalResponderAdocao #preferenciaAnimal_internauta').filter('[value=' + button.getAttribute('data-bs-preferencia') + ']').prop('checked', true)
        $('#modalResponderAdocao #nome_animal')[0].value = button.getAttribute('data-bs-nomeAnimal')
        $('#modalResponderAdocao #sexo_animal').filter('[value=' + button.getAttribute('data-bs-sexo') + ']').prop('checked', true)
        $('#modalResponderAdocao #raca_animal')[0].value = button.getAttribute('data-bs-raca')
        $('#modalResponderAdocao #idade_animal')[0].value = button.getAttribute('data-bs-idade')
        $('#modalResponderAdocao #vacinado_animal').filter('[value=' + button.getAttribute('data-bs-vacinado') + ']').prop('checked', true)
        $('#modalResponderAdocao #castrado_animal').filter('[value=' + button.getAttribute('data-bs-castrado') + ']').prop('checked', true)
        $('#modalResponderAdocao #vermifugado_animal').filter('[value=' + button.getAttribute('data-bs-vermifugado') + ']').prop('checked', true)
        $('#modalResponderAdocao #especie_animal')[0].value = button.getAttribute('data-bs-especie')
        $('#modalResponderAdocao #cor_animal')[0].value = button.getAttribute('data-bs-cor')
        $('#modalResponderAdocao #porte_animal').filter('[value=' + button.getAttribute('data-bs-porte') + ']').prop('checked', true)
        $('#modalResponderAdocao #deficiencia_animal')[0].value = button.getAttribute('data-bs-deficiencia')
        $('#modalResponderAdocao #foto_animal').attr("src", button.getAttribute('data-bs-foto'))
        $('#modalResponderAdocao #adotado_animal').filter('[value=' + button.getAttribute('data-bs-adotado') + ']').prop('checked', true)
        $('#modalResponderAdocao #notas_animal')[0].value = button.getAttribute('data-bs-notas')
        $('#modalResponderAdocao #id_adocao')[0].value = button.getAttribute('data-bs-idAdocao')
        $('#modalResponderAdocao #id_animal')[0].value = button.getAttribute('data-bs-idAnimal')
    })
})


//Carrega os dados do modal de consulta da análise de adoção (funcionario/analisarAdocao.php)
$(function() {
    var modalConsultarAdocao = document.getElementById('modalConsultarAdocao')
    modalConsultarAdocao.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalConsultarAdocao #modalConsulta-title').html(button.getAttribute('data-bs-idAdocao'))
        $('#modalConsultarAdocao #nome_internauta').val(button.getAttribute('data-bs-nomeInt'))
        $('#modalConsultarAdocao #nome_animal').val(button.getAttribute('data-bs-nomeAni'))
        $('#modalConsultarAdocao #foto_animal').attr("src", button.getAttribute('data-bs-fotoAni'))
        $('#modalConsultarAdocao #data_criacao').val(button.getAttribute('data-bs-dataCriacao'))
        $('#modalConsultarAdocao #data_modificacao').val(button.getAttribute('data-bs-dataModificacao'))
        $('#modalConsultarAdocao #status_adocao').val(button.getAttribute('data-bs-status'))
        $('#modalConsultarAdocao #nome_funcionario').val(button.getAttribute('data-bs-funcionario'))
    })
})


//Carrega os dados do modal de edição do gerenciamento de funcionários (funcionario/gerenciarFuncionarios.php)
$(function() {
    var modalEditarFunc = document.getElementById('modalEditarFunc')
    modalEditarFunc.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalEditarFunc #id_funcionario')[0].value = button.getAttribute('data-bs-id')
        $('#modalEditarFunc #nome_funcionario')[0].value = button.getAttribute('data-bs-nome')
        $('#modalEditarFunc #rg_funcionario')[0].value = button.getAttribute('data-bs-rg')
        $('#modalEditarFunc #cpf_funcionario')[0].value = button.getAttribute('data-bs-cpf')
        $('#modalEditarFunc #telefone_funcionario')[0].value = button.getAttribute('data-bs-telefone')
        $('#modalEditarFunc #login_funcionario')[0].value = button.getAttribute('data-bs-login')
        $('#modalEditarFunc #senha_funcionario2')[0].value = button.getAttribute('data-bs-senha')
        $('#modalEditarFunc #endereco_funcionario')[0].value = button.getAttribute('data-bs-endereco')
        $('#modalEditarFunc #nivel_funcionario')[0].value = button.getAttribute('data-bs-nivel')
    })
})


//Carrega os dados do modal de consulta do gerenciamento de funcionários (funcionario/gerenciarFuncionarios.php)
$(function() {
    var modalConsultarFunc = document.getElementById('modalConsultarFunc')
    modalConsultarFunc.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalConsultarFunc #id_funcionario')[0].value = button.getAttribute('data-bs-id')
        $('#modalConsultarFunc #nome_funcionario')[0].value = button.getAttribute('data-bs-nome')
        $('#modalConsultarFunc #rg_funcionario')[0].value = button.getAttribute('data-bs-rg')
        $('#modalConsultarFunc #cpf_funcionario')[0].value = button.getAttribute('data-bs-cpf')
        $('#modalConsultarFunc #telefone_funcionario')[0].value = button.getAttribute('data-bs-telefone')
        $('#modalConsultarFunc #login_funcionario')[0].value = button.getAttribute('data-bs-login')
        $('#modalConsultarFunc #senha_funcionario')[0].value = button.getAttribute('data-bs-senha')
        $('#modalConsultarFunc #endereco_funcionario')[0].value = button.getAttribute('data-bs-endereco')
        $('#modalConsultarFunc #nivel_funcionario')[0].value = button.getAttribute('data-bs-nivel')
    })
})


//Carrega os dados do modal de exclusão do gerenciamento de funcionários (funcionario/gerenciarFuncionarios.php)
$(function() {
    var modalExcluirFunc = document.getElementById('modalExcluirFunc')
    modalExcluirFunc.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalExcluirFunc #id_funcionario')[0].value = button.getAttribute('data-bs-Id')
        $('#modalExcluirFunc #nome_funcionario')[0].value = button.getAttribute('data-bs-Nome')
        $('#modalExcluirFunc #rg_funcionario')[0].value = button.getAttribute('data-bs-Rg')
        $('#modalExcluirFunc #cpf_funcionario')[0].value = button.getAttribute('data-bs-Cpf')
        $('#modalExcluirFunc #telefone_funcionario')[0].value = button.getAttribute('data-bs-Telefone')
        $('#modalExcluirFunc #login_funcionario')[0].value = button.getAttribute('data-bs-Login')
        $('#modalExcluirFunc #senha_funcionario')[0].value = button.getAttribute('data-bs-Senha')
        $('#modalExcluirFunc #endereco_funcionario')[0].value = button.getAttribute('data-bs-Endereco')
        $('#modalExcluirFunc #nivel_funcionario')[0].value = button.getAttribute('data-bs-Nivel')
    })
})


//Carrega os dados do modal de edição do perfil do funcionário (funcionario/perfilFuncionario.php)
$(function() {
    var modalEditarPerfil = document.getElementById('modalEditarPerfil')
    modalEditarPerfil.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget

        $('#modalEditarPerfil #id_funcionario')[0].value = button.getAttribute('data-bs-id')
        $('#modalEditarPerfil #nome_funcionario')[0].value = button.getAttribute('data-bs-nome')
        $('#modalEditarPerfil #rg_funcionario')[0].value = button.getAttribute('data-bs-rg')
        $('#modalEditarPerfil #cpf_funcionario')[0].value = button.getAttribute('data-bs-cpf')
        $('#modalEditarPerfil #telefone_funcionario')[0].value = button.getAttribute('data-bs-telefone')
        $('#modalEditarPerfil #login_funcionario')[0].value = button.getAttribute('data-bs-login')
        $('#modalEditarPerfil #senha_funcionario')[0].value = button.getAttribute('data-bs-senha')
        $('#modalEditarPerfil #endereco_funcionario')[0].value = button.getAttribute('data-bs-endereco')
        $('#modalEditarPerfil #nivel_funcionario')[0].value = button.getAttribute('data-bs-nivel')
    })
})