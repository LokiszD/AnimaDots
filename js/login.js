// Função para validar o formulário de login (login/loginFunc.php)
var $formLogin = $('#formLogin');
if ($formLogin.length) {
    $formLogin.validate({
        rules: {
            login_funcionario: {
                required: true
            },
            senha_funcionario: {
                required: true
            }
        },
        messages: {
            login_funcionario: {
                required: "Por favor, insira um login válido!"
            },
            senha_funcionario: {
                required: "Por favor, insira uma senha válida!"
            }
        }
    })
}