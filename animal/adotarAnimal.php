<?php
    require_once '../classes/conexao.php';
    $a = new conexao();

    if (!$conexao = $a->conectar()) {
        header("Location: adotarAnimal.php");
    }
    if (isset($_POST['acao'])) {
        $acao = $_POST['acao'];
        if ($acao == "Adotar") {

            $id_animal = $_GET['id_animal'];
            
            $nome_internauta = $_POST['nome_internauta'];
            $idade_internauta = $_POST['idade_internauta'];
            $rg_internauta = $_POST['rg_internauta'];
            $cpf_internauta = $_POST['cpf_internauta'];
            $telefone_internauta = $_POST['telefone_internauta'];
            $email_internauta = $_POST['email_internauta'];
            $endereco_internauta = $_POST['endereco_internauta'];
            $numeroCasa_internauta = $_POST['numeroCasa_internauta'];
            $complemento_internauta = $_POST['complemento_internauta'];
            $bairro_internauta = $_POST['bairro_internauta'];
            $cep_internauta = $_POST['cep_internauta'];
            $residencia_internauta = $_POST['residencia_internauta'];
            $cidade_internauta = $_POST['cidade_internauta'];
            $preferenciaAnimal_internauta = $_POST['preferenciaAnimal_internauta'];

            $sql = "INSERT INTO internauta (nome_internauta, idade_internauta, rg_internauta, cpf_internauta, telefone_internauta, email_internauta, endereco_internauta, numeroCasa_internauta, complemento_internauta, bairro_internauta, cep_internauta, residencia_internauta, cidade_internauta, preferenciaAnimal_internauta)
                                VALUES ('$nome_internauta', '$idade_internauta', '$rg_internauta', '$cpf_internauta', '$telefone_internauta', '$email_internauta', '$endereco_internauta', '$numeroCasa_internauta', '$complemento_internauta', '$bairro_internauta', '$cep_internauta', '$residencia_internauta', '$cidade_internauta', '$preferenciaAnimal_internauta')";
            $sql = mysqli_query($conexao, $sql);

            $id_internauta = mysqli_insert_id($conexao);


            $sql = "INSERT INTO adocao (status_adocao, animalId_animal, internautaId_internauta)
                                VALUES ('pendente', '$id_animal', '$id_internauta')";
            $sql = mysqli_query($conexao, $sql);

            $sql = "UPDATE animal SET adotado_animal= 'adotado' WHERE id_animal=".$id_animal;
            $sql = mysqli_query($conexao, $sql);

            header("Location: ../index.php");

        }
    }
?>