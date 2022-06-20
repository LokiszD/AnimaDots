<?php
require_once 'classes/conexao.php';
$a = new conexao();

$especie = (isset($_POST['especie']) ? $_POST['especie'] : "");
$porte = (isset($_POST['porte']) ? $_POST['porte'] : "");
$sexo = (isset($_POST['sexo']) ? $_POST['sexo'] : "");
$idade = (isset($_POST['idade']) ? $_POST['idade'] : "");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimaDots</title>

    <!--Link pro css do Bootstrap5-->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <!--Link pro css-->
    <link rel="stylesheet" href="./css/style.css">
    <!--Link para os icones-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!--Link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

</head>

<body>

    <!--Barra de navegacao-->
    <header>

        <div class="container d-flex justify-content-between">

            <label class="logo">
                <a href="index.php"><img src="assets/logo.png" alt="logo"></a>
            </label>

            <div id="menu-opener" onclick="barOpener()">
                <i class="fas fa-bars"></i>
                <!--Abrir barra de navegacao quando estiver no celular-->
            </div>

            <nav>
                <ul class="list-inline">
                    <li class="list-inline-item nav-li">
                        <a href="animal/adoteCachorro.php"><strong>Adote um cachorro</strong> <i class="fas fa-dog"></a></i>
                    </li>
                    <li class="list-inline-item nav-li">
                        <a href="animal/adoteGato.php"><strong>Adote um gato</strong> <i class="fas fa-cat"></a></i>
                    </li>
                    <li class="list-inline-item nav-li">
                        <a href="animal/colabore.php"><strong>Colabore</strong> <i class="fas fa-hand-holding-heart"></a></i>
                    </li>
                    <li class="list-inline-item nav-li">
                        <a href="animal/sobre.php"><strong>Sobre nós</strong> <i class="fas fa-address-card"></a></i>
                    </li>
                </ul>
            </nav>

        </div>

        <aside id="nav-aside">

            <div id="menu-area">
                <ul>
                    <li><a href="animal/adoteCachorro.php"><strong>Adote um cachorro</strong> <i class="fas fa-dog"></a></i>
                    </li>
                    <li><a href="animal/adoteGato.php"><strong>Adote um gato</strong> <i class="fas fa-cat"></a></i>
                    </li>
                    <li><a href="animal/colabore.php"><strong>Colabore</strong> <i class="fas fa-hand-holding-heart"></a></i>
                    </li>
                    <li><a href="animal/sobre.php"><strong>Sobre nós</strong> <i class="fas fa-address-card"></a></i>
                    </li>
                </ul>
            </div>

        </aside>

    </header>

    <!--Breve info sobre o site-->
    <div class="geral">
        <div class="container">
            <h2 style="font-weight: bold;">Adoção <i class="fas fa-heart"></i></h2>
            <p class="h5">Procure seu próximo pet em nosso site, após escolher algum desses animaizinhos que precisam de um lar, preencha nosso formulario e algum funcionário da ONG entrará em contato com você!</p>
        </div>
    </div>

    <!--Filtro de animais-->
    <section class="container filtro">

        <h4>Filtre por</h4><br>
        <form method="POST" id="formAnimal">
            <div class="row">

                <div class="col-xl col-lg-4 col-md-6 col-sm-12">
                    <select name="especie" id="especie_animal">
                        <option disabled selected value="especie">Espécie</option>
                        <option value="cachorro" <?php echo ($especie == 'cachorro' ? 'selected' : '') ?>>Cachorro</option>
                        <option value="gato" <?php echo ($especie == 'gato' ? 'selected' : '') ?>>Gato</option>
                    </select>
                </div>

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

                <div class="d-flex justify-content-center">
                    <input class="btn-filtro" type="submit" value="Buscar">
                    <input class="btn-filtro" type="button" value="Mostrar Todos" onclick="exibeTodos()">
                </div>
            </div>
        </form>

    </section>

    <!--Carousel de gatos e cachorros-->
    <section class="container slider">

        <div class="row">
            <div class="col-12 m-3 col-lg">
                <!--dog-->
                <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        if (!$conexao = $a->conectar()) {
                            header("Location: index.php");
                        }
                        if ($result = $conexao->query("SELECT * FROM animal WHERE especie_animal = 'cachorro' 
                                                                            AND adotado_animal = 'nao_adotado'
                                                                            LIMIT 1")) {
                            while ($dado = $result->fetch_object()) {
                                echo "<div class='carousel-item active'>
                                    <img src='imgAnimais/" . $dado->foto_animal . "' class='d-block w-100' alt='...' style='height:500px'>
                                    <div class='carousel-caption d-none d-md-block info'>
                                    <h5>" . ucwords($dado->nome_animal) . "</h5>
                                    <p>" . ucfirst($dado->raca_animal) . "</p>
                                    <a href='animal/pagAnimal.php?id_animal=" . $dado->id_animal . "' class='btn btn-secondary'>Ver mais...</a>
                                </div>
                            </div>";
                            }
                        }
                        if ($result = $conexao->query("SELECT * FROM animal WHERE especie_animal = 'cachorro' 
                                                                            AND adotado_animal = 'nao_adotado'
                                                                            ORDER BY id_animal DESC LIMIT 2")) {
                            while ($dado = $result->fetch_object()) {
                                echo "<div class='carousel-item'>
                                    <img src='imgAnimais/" . $dado->foto_animal . "' class='d-block w-100' alt='...' style='height:500px'>
                                    <div class='carousel-caption d-none d-md-block info'>
                                    <h5>" . ucwords($dado->nome_animal) . "</h5>
                                    <p>" . ucfirst($dado->raca_animal) . "</p>
                                    <a href='animal/pagAnimal.php?id_animal=" . $dado->id_animal . "' class='btn btn-secondary'>Ver mais...</a>
                                </div>
                            </div>";
                            }
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 m-3 col-lg">
                <!--cat-->
                <div id="carouselExampleCaptions2" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        if (!$conexao = $a->conectar()) {
                            header("Location: index.php");
                        }
                        if ($result = $conexao->query("SELECT * FROM animal WHERE especie_animal = 'gato' 
                                                                                AND adotado_animal = 'nao_adotado'
                                                                                LIMIT 1")) {
                            while ($dado = $result->fetch_object()) {
                                echo "<div class='carousel-item active'>
                                        <img src='imgAnimais/" . $dado->foto_animal . "' class='d-block w-100' alt='...' style='height:500px'>
                                        <div class='carousel-caption d-none d-md-block info'>
                                        <h5>" . ucwords($dado->nome_animal) . "</h5>
                                        <p>" . ucfirst($dado->raca_animal) . "</p>
                                        <a href='animal/pagAnimal.php?id_animal=" . $dado->id_animal . "' class='btn btn-secondary'>Ver mais...</a>
                                    </div>
                                </div>";
                            }
                        }
                        if ($result = $conexao->query("SELECT * FROM animal WHERE especie_animal = 'gato' 
                                                                                AND adotado_animal = 'nao_adotado' 
                                                                                ORDER BY id_animal DESC LIMIT 2")) {
                            while ($dado = $result->fetch_object()) {
                                echo "<div class='carousel-item'>
                                        <img src='imgAnimais/" . $dado->foto_animal . "' class='d-block w-100' alt='...' style='height:500px'>
                                        <div class='carousel-caption d-none d-md-block info'>
                                        <h5>" . ucwords($dado->nome_animal) . "</h5>
                                        <p>" . ucfirst($dado->raca_animal) . "</p>
                                        <a href='animal/pagAnimal.php?id_animal=" . $dado->id_animal . "' class='btn btn-secondary'>Ver mais...</a>
                                    </div>
                                </div>";
                            }
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

    </section>

    <!--Card dos animais-->
    <section class="container card-animal">

        <div class="row">
            <?php

            $cond_idade = '';

            if ($idade == '0-3') $cond_idade  = 'AND (idade_animal <= 3)';
            else if ($idade == '3-6') $cond_idade = 'AND (idade_animal between 3 and 6)';
            else if ($idade == '6-10') $cond_idade = 'AND (idade_animal between 6 and 10)';
            else if ($idade == '10') $cond_idade = 'AND (idade_animal >=10)';

            if ($result = $conexao->query("SELECT * 
            FROM animal 
            WHERE adotado_animal = 'nao_adotado' 
                AND (especie_animal = '" . $especie . "' OR '" . $especie . "' ='') 
                AND (porte_animal = '" . $porte . "' OR '" . $porte . "' ='')
                AND (sexo_animal = '" . $sexo . "' OR '" . $sexo . "' ='')
                " .$cond_idade)) {
                while ($dado = $result->fetch_object()) {
                    echo "<div class='boxAnimais'>
                            <img src='imgAnimais/".$dado->foto_animal."' class='imgAnimal'>
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

    <div class="scrollup" onclick="scrollUp()"><i class="fas fa-arrow-alt-circle-up"></i></div><br>
    <!--Voltar ao topo da página-->
    <!--Footer-->
    <footer class="text-center text-white" style="background-color: rgb(21, 21, 21);">

        <div class="container p-4 pb-0">

            <h3>AnimaDots</h3><br>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus quas reprehenderit, deleniti debitis et dolorum, </p>
            <p>suscipit ipsam commodi voluptas, nesciunt autem! Ipsa libero error est rerum ullam. Iure, numquam illum.</p>
            <br>
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-3" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-3" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                <!-- WhatsApp -->
                <a class="btn btn-outline-light btn-floating m-3" href="#!" role="button"><i class="fab fa-whatsapp"></i></a>
            </section><br>

        </div>

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.768);">
            <p>Copyright &copy; 2021 AnimaDots. designed by <a href="#"><span class="text-white-50">EQUIPE ANIMADOTS</span></a> </p>
        </div>

    </footer>

    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/index.js"></script>
</body>

<script>
    function exibeTodos() {
        document.getElementById("sexo_animal").selectedIndex = 0;
        document.getElementById("porte_animal").selectedIndex = 0;
        document.getElementById("especie_animal").selectedIndex = 0;
        document.getElementById("idade_animal").selectedIndex = 0;
        document.getElementById('formAnimal').submit()
    }
</script>

</html>