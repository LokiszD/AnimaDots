<!-- Arquivo de login do funcionário -->

<?php
require_once '../classes/funcionario.php';
$f = new funcionario();
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>AnimaDots - Login Funcionário</title>
    <link rel="stylesheet" href="../css/styleLogin.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/83d533cd1a.js" crossorigin="anonymous"></script>
</head>
<style>
    .error {
        color: red;
        font-style: italic
    }
</style>

<body>
    <div class="container">
        <div class="img">
            <img src="../assets/logo.png" />
        </div>
        <div class="conteudo-login">
            <form id="formLogin" method="post">
                <h2>BEM-VINDO(A)!</h2>
                <div class="input-div login">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Login</h5>
                        <input type="text" id="login" name="login_funcionario" class="input" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Senha</h5> 
                        <input type="password" id="senha" name="senha_funcionario" class="input" required>                         
                    </div>
                    <i id="mostraSenha" class="fas fa-eye"></i>              
                </div>
                
                <button type="submit" value="acessar">Acessar</button>
            </form>
        </div>
        <a href="esqueceuSenha.php">Esqueceu a senha?</a>
    </div>

    <!-- Link para as coisas do JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <!-- Link para o js de efeito do login -->
    <script src="../js/efeitoLogin.js"></script>
    <!-- Link para o js que valida as informações do login -->
    <script src="../js/login.js"></script>
    <script>
        $((e) => {
            $("#mostraSenha").on('click', e => {
                //alternando entre mostrar e ocultar a senha
                e.currentTarget.classList.toggle('fa-eye-slash');
                const campoSenha = $('#senha').get(0);

                if (campoSenha.type === 'password')
                    campoSenha.type = 'text';
                else
                    campoSenha.type = 'password';
            })
        });
    </script>
</body>

</html>

<?php
if (isset($_POST['login_funcionario'])) {
    $login_funcionario = $_POST['login_funcionario'];
    $senha_funcionario = $_POST['senha_funcionario'];
    if (!empty($login_funcionario) && !empty($senha_funcionario)) {
        if ($f->logar($login_funcionario, $senha_funcionario)) {
            header("Location: ../funcionario/gerenciarAnimais.php");
            exit();
        }
    }
}
?>