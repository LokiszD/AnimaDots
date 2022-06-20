<?php
    require_once '../classes/conexao.php';
    $a = new conexao();

    require_once '../menu/menuFunc.php';

        if(!$conexao = $a -> conectar()) {
            header("location: respostaAdocao.php");
        }
            if(isset($_POST['acao'])) {
                $acao = $_POST['acao'];
                if($acao == "Adotar") {

                    $id_adocao = $_POST['id_adocao'];
                    $id_animal = $_POST['id_animal'];
                    $id_funcionario = $_SESSION['id_funcionario'];
                   
                    $sql = "UPDATE adocao 
                            SET data_modificacao_adocao = current_timestamp(), status_adocao= 'aprovada', funcionarioId_funcionario= '$id_funcionario' WHERE id_adocao =" .$id_adocao;
                    $sql = mysqli_query($conexao, $sql);

                    header("location: analisarAdocao.php");

                } else {
                    $id_adocao = $_POST['id_adocao'];
                    $id_animal = $_POST['id_animal'];
                    $id_funcionario = $_SESSION['id_funcionario'];
                   
                    $sql = "UPDATE adocao 
                            SET data_modificacao_adocao = current_timestamp(), status_adocao= 'negada', funcionarioId_funcionario= '$id_funcionario' WHERE id_adocao =" .$id_adocao;
                    $sql = mysqli_query($conexao, $sql);

                    $sql = "UPDATE animal SET adotado_animal= 'nao_adotado' WHERE id_animal =" .$id_animal;
                    $sql = mysqli_query($conexao, $sql);                    

                    header("location: analisarAdocao.php");
                }
            }
