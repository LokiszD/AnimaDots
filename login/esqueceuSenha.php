<?php
require_once '../classes/funcionario.php';
$f = new funcionario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>AnimaDots - Esqueceu a senha</title>
    <link rel="stylesheet" href="../css/esqueceuSenha.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/83d533cd1a.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="img">
            <img src="../assets/logo.png">
        </div>
        <div class="conteudo">
            <form id="formSenha" action="">
                <h2>Recuperação de senha</h2>
                <h3>Informe o e-mail cadastrado para o envio das instruções de alteração de senha</h3>
                <div class="input-div email">
                    <div class="i">
                        <i class="fas fa-at"></i>
                    </div>
                    <div class="div">
                        <h5>E-mail</h5>
                        <input type="email" name="email_funcionario" id="email_funcionario" class="input" required>
                    </div>
                </div>
                <button type="submit" value="enviar">Enviar</button>
            </form>
        </div>
    </div>
    
    <!-- Link para as coisas do JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <!-- Link para o js de efeito do login -->
    <script src="../js/efeitoLogin.js"></script>
</body>
</html>