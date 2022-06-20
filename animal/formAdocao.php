<?php
require_once '../classes/conexao.php';
$a = new conexao();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimaDots</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/formAdocao.css">
    <style>
        .error {
            color: red;
            font-style: italic
        }
    </style>
</head>

<body>
    <?php
    include '../menu/menuSite.php';

    if (!$conexao = $a->conectar()) {
        header("Location: pagAnimal.php");
    }

    $id_animal = $_GET['id_animal'];

    if ($result = $conexao->query("SELECT * FROM animal WHERE id_animal=" . $id_animal)) {
        if ($dado = $result->fetch_object()) {
            $nome_animal = $dado->nome_animal;
            $sexo_animal = $dado->sexo_animal;
            $raca_animal = $dado->raca_animal;
            $idade_animal = $dado->idade_animal;
            $vacinado_animal = $dado->vacinado_animal;
            $castrado_animal = $dado->castrado_animal;
            $vermifugado_animal = $dado->vermifugado_animal;
            $especie_animal = $dado->especie_animal;
            $cor_animal = $dado->cor_animal;
            $porte_animal = $dado->porte_animal;
            $deficiencia_animal = $dado->deficiencia_animal;
            $foto_animal = $dado->foto_animal;
            $video_animal = $dado->video_animal;
            $adotado_animal = $dado->adotado_animal;
            $notas_animal = $dado->notas_animal;
            $result->free_result();
            $conexao->close();
        } else {

            $result->free_result();
            $conexao->close();

            header("location: consultarAnimal.php");
        }
    } else {
        $conexao->close();
    }
    ?>

    <div class="container-sm">
        <h1 class="lista-animais">Formulário de Adoção <i class="fas fa-heart"></i></h1>
    </div>

    <div class="container-sm">
        <span class="pata"><i class="fas fa-paw"></i> Campos de preenchimento obrigatório.</span>
        <?php echo "<form id='formAdocao' action='adotarAnimal.php?id_animal=".$dado->id_animal."' method='post'>" ?>
            <div class="row">
                <div class="col-6">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> Nome completo:</span>
                    <input type="text" class="form-control" name="nome_internauta" id="nome_internauta" required>
                </div>
                <div class="col-2">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> Idade:</span>
                    <input type="number" class="form-control" name="idade_internauta" id="idade_internauta" required>
                </div>
                <div class="col-4">
                    <span class="infoInt"> <i class="fas fa-paw pata"></i> RG:</span>
                    <input type="text" class="form-control" name="rg_internauta" id="rg_internauta" required>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <span class="infoInt"> <i class="fas fa-paw pata"></i> CPF:</span>
                    <input type="text" class="form-control" name="cpf_internauta" id="cpf_internauta" required>
                </div>
                <div class="col-3">
                    <span class="infoInt"> <i class="fas fa-paw pata"> </i> Telefone:</span>
                    <input type="text" class="form-control" name="telefone_internauta" id="telefone_internauta" required>
                </div>
                <div class="col-6">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> E-mail:</span>
                    <input type="email" class="form-control" name="email_internauta" id="email_internauta" required>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> Endereço:</span>
                    <input type="text" class="form-control" name="endereco_internauta" id="endereco_internauta" required>
                </div>
                <div class="col-4">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> Número:</span>
                    <input type="number" class="form-control" name="numeroCasa_internauta" id="numeroCasa_internauta" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="infoInt">Complemento:</span>
                    <input type="text" class="form-control" name="complemento_internauta" id="complemento_internauta">
                </div>
                <div class="col-6">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> Bairro:</span>
                    <input type="text" class="form-control" name="bairro_internauta" id="bairro_internauta" required>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> CEP:</span>
                    <input type="text" class="form-control" name="cep_internauta" id="cep_internauta" required>
                </div>
                <div class="col-4">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> Tipo de residência:</span>
                    <input type="text" class="form-control" name="residencia_internauta" id="residencia_internauta" required>
                </div>
                <div class="col-5">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> Cidade:</span>
                    <select class="form-select" name="cidade_internauta" id="cidade_internauta" required>
                        <option selected disabled>Selecione a cidade...</option>
                        <option value="cabreuva">Cabreúva</option>
                        <option value="cajamar">Cajamar</option>
                        <option value="campo_limpo">Campo Limpo Paulista</option>
                        <option value="itupeva">Itupeva</option>
                        <option value="jundiai">Jundiaí</option>
                        <option value="louveira">Louveira</option>
                        <option value="varzea_paulista">Várzea Paulista</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span class="infoInt"><i class="fas fa-paw pata"></i> Preferência em:</span>
                    <div class="form-control animal-input-radio">
                        <div>
                            <input type="radio" class="form-check-input" name="preferenciaAnimal_internauta" id="preferenciaAnimal_internauta" value="cachorro" required> Cachorro <i class="fas fa-dog"></i>
                        </div>
                        <div>
                            <input type="radio" class="form-check-input" name="preferenciaAnimal_internauta" id="preferenciaAnimal_internauta" value="gato" required> Gato <i class="fas fa-cat"></i>
                        </div>
                        <div>
                            <input type="radio" class="form-check-input" name="preferenciaAnimal_internauta" id="preferenciaAnimal_internauta" value="indiferente" required> Indiferente <i class="fas fa-dog"></i> | <i class="fas fa-cat"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="infoLei">
                <strong>IMPORTANTE:</strong> Abandonar, soltar, deixar fugir, não alimentar, acorrentar, bater, amedrontar e deixar acasalar indiscriminadamente 
                são formas de maus tratos com pena prevista na lei. O AnimaDots atuará conforme artigo 164 do Código Penal, artigo 32 da 
                Lei Federal 9.605, de 12 de fevereiro de 1998 (Lei de Crimes Ambientais), e da Lei Municipal 13.131, de 18 de maio de 2001 (Lei 
                de Posse Responsável), contra qualquer um que descumpra as determinações previstas, sejam estes adotantes ou não. Em caso de dúvidas, 
                busque informações e auxílios de profissionais veterinários e nunca de curiosos ou da internet.
            </div>
            <div class="d-flex justify-content-center">
                <?php echo "<a href='pagAnimal.php?id_animal=" . $dado->id_animal . "' class='btn btn-outline-danger'>Voltar</a>" ?>
                <button type="submit" class="btn btn-outline-success" name="acao" value="Adotar">Enviar Pedido</button>
            </div>
        </form>
    </div>

    <?php include '../menu/footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdn.es.gov.br/scripts/jquery/jquery-maskedinput/1.4.1/jquery.maskedinput-1.4.1.min.js"></script>
    <script src="../js/validaForm.js"></script>
    <script>
        $(document).ready(function() {
            $('#rg_internauta').mask("99.999.999-*");
            $('#cpf_internauta').mask("999.999.999-99");
            $('#telefone_internauta').mask("(99)99999-9999")
            $('#cep_internauta').mask("99999-999")
        });
    </script>

</body>