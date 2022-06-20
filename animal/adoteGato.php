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
    <title>AnimaDots - Adote um gato</title>
</head>

<body>
    <?php
    include '../menu/menuSite.php';

    $porte = (isset($_POST['porte']) ? $_POST['porte'] : "");
    $sexo = (isset($_POST['sexo']) ? $_POST['sexo'] : "");
    $idade = (isset($_POST['idade']) ? $_POST['idade'] : "");
    ?>
    
    <div class="geral">
        <div class="container">
            <h2 style="font-weight: bold;">Adote um gato <i class="fas fa-cat"></i></h2>
        </div>
    </div>

    <!--Filtro de animais-->
    <section class="container filtro">

        <h4>Filtre por</h4><br>
        <form method="POST" id="formGato">
            <div class="row">
                <div class="col-xl col-lg-4 col-md-6 col-sm-12">
                    <select name="porte" id="porte_animal">
                        <option disabled selected value="gender">Porte</option>
                        <option value="pequeno" <?php echo ($porte == 'pequeno' ? 'selected' : '') ?>>Pequeno</option>
                        <option value="medio" <?php echo ($porte == 'medio' ? 'selected' : '') ?>>Médio</option>
                        <option value="grande" <?php echo ($porte == 'grande' ? 'selected' : '') ?>>Grande</option>
                    </select>
                </div>

                <div class="col-xl col-lg-4 col-md-6 col-sm-12">
                    <select name="sexo" id="sexo_animal">
                        <option disabled selected value="gender">Sexo</option>
                        <option value="femea" <?php echo ($sexo == 'femea' ? 'selected' : '') ?>>Fêmea</option>
                        <option value="macho" <?php echo ($sexo == 'macho' ? 'selected' : '') ?>>Macho</option>
                    </select>
                </div>

                <div class="col-xl col-lg-4 col-md-6 col-sm-12">
                    <select name="idade" id="idade_animal">
                        <option disabled selected value="gender">Idade</option>
                        <option value="0-3" <?php echo ($idade == '0-3' ? 'selected' : '') ?>>Até 3 anos</option>
                        <option value="3-6" <?php echo ($idade == '3-6' ? 'selected' : '') ?>>De 3 até 6</option>
                        <option value="6-10" <?php echo ($idade == '6-10' ? 'selected' : '') ?>>De 6 até 10</option>
                        <option value="10" <?php echo ($idade == '10' ? 'selected' : '') ?>>Mais de 10 anos</option>
                    </select>
                </div>

                <div class="d-flex justify-content-center" style='display:flex'>
                    <input class="btn-filtro" type="submit" value="Buscar">
                    <input class="btn-filtro" type="button" value="Mostrar todos" onclick="exibeTodos()">
                </div>
            </div>
        </form>

    </section>

    <!--Card dos animais-->
    <section class="container gato">
        <div class="row">
            <?php
            if (!$conexao = $a->conectar()) {
                header("Location: adoteGato.php");
            }

            $cond_idade = '';

            if ($idade == '0-3') $cond_idade  = 'AND (idade_animal <= 3)';
            else if ($idade == '3-6') $cond_idade = 'AND (idade_animal between 3 and 6)';
            else if ($idade == '6-10') $cond_idade = 'AND (idade_animal between 6 and 10)';
            else if ($idade == '10') $cond_idade = 'AND (idade_animal >=10)';

            if ($result = $conexao->query("SELECT * 
                                                  FROM animal 
                                                  WHERE especie_animal = 'gato' 
                                                    AND (adotado_animal = 'nao_adotado')
                                                    AND (porte_animal = '" . $porte . "' OR '" . $porte . "' ='')
                                                    AND (sexo_animal = '" . $sexo . "' OR '" . $sexo . "' ='')
                                                    " .$cond_idade)) {
                while ($dado = $result->fetch_object()) {
                    echo "<div class='boxAnimais'>
                            <img src='../imgAnimais/".$dado->foto_animal."' class='imgAnimal'>
                            <div class='overlay'>
                                <div class='texto'>
                                <h2 style='font-weight: bold;'>".ucwords($dado->nome_animal)."</h2>";
                                if($dado->sexo_animal == "fêmea") {
                                    echo "<i class='fas fa-venus'></i>";
                                } else {
                                    echo "<i class='fas fa-mars'></i>";
                                }
                                echo "<h5>".ucwords($dado->idade_animal)." ano(s)</h5>
                                <div class='notas'>".$dado->notas_animal."</div>
                                <a href='animal/pagAnimal.php?id_animal=" . $dado->id_animal . "' class='btn btn-dark'>Vem me conhecer!</a>
                                </div>
                            </div>
                        </div>";
                }
            }
            ?>
        </div>
    </section>
    <?php include '../menu/footer.php'; ?>
</body>

<script>
    function exibeTodos() {
        document.getElementById("sexo_animal").selectedIndex = 0;
        document.getElementById("porte_animal").selectedIndex = 0;
        document.getElementById("idade_animal").selectedIndex = 0;
        document.getElementById('formGato').submit()
    }
</script>

</html>