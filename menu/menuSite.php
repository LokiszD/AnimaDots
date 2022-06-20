<!-- Nav do site principal -->

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimaDots</title>
    
    <!--Link pro css do Bootstrap5-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!--Link pro css-->
    <link rel="stylesheet" href="../css/style.css">
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
                <a href="../index.php"><img src="../assets/logo.png" alt="logo"></a>
            </label>
            
            <div id="menu-opener" onclick="barOpener()" >
              <i class="fas fa-bars"></i> <!--Abrir barra de navegacao quando estiver no celular-->
            </div>

            <nav>
                <ul class="list-inline">
                    <li class="list-inline-item nav-li">
                        <a href="../animal/adoteCachorro.php"><strong>Adote um cachorro</strong> <i class="fas fa-dog"></a></i>
                    </li>
                    <li class="list-inline-item nav-li">
                        <a href="../animal/adoteGato.php"><strong>Adote um gato</strong> <i class="fas fa-cat"></a></i>
                    </li>
                    <li class="list-inline-item nav-li">
                        <a href="../animal/colabore.php"><strong>Colabore</strong> <i class="fas fa-hand-holding-heart"></a></i>
                    </li>
                    <li class="list-inline-item nav-li">
                        <a href="../animal/sobre.php"><strong>Sobre nós</strong> <i class="fas fa-address-card"></a></i>
                    </li>
                </ul>
            </nav>

        </div>

        <aside id="nav-aside">

          <div id="menu-area">
            <ul>
              <li><a href="../animal/adoteCachorro.php"><strong>Adote um cachorro</strong> <i class="fas fa-dog"></a></i></li>
              <li><a href="../animal/adoteGato.php"><strong>Adote um gato</strong> <i class="fas fa-cat"></a></i></li>
              <li><a href="../animal/colabore.php"><strong>Colabore</strong> <i class="fas fa-hand-holding-heart"></a></i></li>
              <li><a href="../animal/sobre.php"><strong>Sobre nós</strong> <i class="fas fa-address-card"></a></i></li>
            </ul>
          </div>

        </aside>

  </header>

  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/index.js"></script>
</body>
</html>