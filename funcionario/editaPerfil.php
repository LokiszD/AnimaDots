<?php
require_once '../classes/conexao.php';
$f = new conexao();

if (!$conexao = $f->conectar()) {
    header("Location: cadastrarFuncionario.php");
}
if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
    if ($acao == "Editar") {

        $id_funcionario = $_POST['id_funcionario'];
        $nome_funcionario = $_POST['nome_funcionario'];
        $rg_funcionario = $_POST['rg_funcionario'];
        $cpf_funcionario = $_POST['cpf_funcionario'];
        $telefone_funcionario = $_POST['telefone_funcionario'];
        $login_funcionario = $_POST['login_funcionario'];
        $senha_funcionario = $_POST['senha_funcionario'];
        $endereco_funcionario = $_POST['endereco_funcionario'];
        $nivel_funcionario = $_POST['nivel_funcionario'];

        $sql = "UPDATE funcionario
                SET nome_funcionario= '$nome_funcionario', rg_funcionario= '$rg_funcionario', cpf_funcionario= '$cpf_funcionario', telefone_funcionario= '$telefone_funcionario', login_funcionario= '$login_funcionario', senha_funcionario= '$senha_funcionario', endereco_funcionario= '$endereco_funcionario', nivel_funcionario= '$nivel_funcionario' 
                WHERE id_funcionario=" .$id_funcionario;
        $sql = mysqli_query($conexao, $sql);

        header("Location: perfilFuncionario.php");
    }
}