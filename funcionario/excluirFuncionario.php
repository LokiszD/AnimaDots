<?php
    require_once '../classes/conexao.php';
    $f = new conexao();

        if(!$conexao = $f -> conectar()) {
            header("location: excluirFuncionario.php");
        }
            if(isset($_POST['acao'])) {
                $acao = $_POST['acao'];
                if($acao == "Excluir") {
                    
                    $id_funcionario = $_POST['id_funcionario'];
                    $sql = "DELETE FROM funcionario WHERE id_funcionario=" .$id_funcionario;
                    $sql = mysqli_query($conexao, $sql);
                    mysqli_close($conexao);
                    header("location: gerenciarFuncionarios.php");
                }
            }
?>