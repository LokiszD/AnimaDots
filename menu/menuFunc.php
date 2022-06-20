<!-- Nav funcionário -->

<?php
session_start(); //mexendo com as coisas da sessão
if (!isset($_SESSION['id_funcionario'])) {
  header("location: ../login/loginFunc.php");
  exit;
}

require_once '../classes/funcionario.php';
$f = new funcionario();
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AnimaDots - Gerenciamento de animais</title>
  <!--Link pro css do Bootstrap5-->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
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
        <a href="gerenciarAnimais.php"><img src="../assets/logo.png" alt="logo"></a>
      </label>

      <div id="menu-opener" onclick="barOpener()">
        <i class="fas fa-bars"></i>
        <!--Abrir barra de navegacao quando estiver no celular-->
      </div>

      <nav>
        <ul class="list-inline">
          <li class="list-inline-item nav-li">
            <a href="gerenciarAnimais.php"><strong>Gerenciamento de animais</strong> <i class="fas fa-paw"></a></i>
          </li>
          <li class="list-inline-item nav-li">
            <a href="analisarAdocao.php"><strong>Analisar adoção</strong> <i class="fas fa-hand-holding-heart"></a></i>
          </li>
          <li class="list-inline-item nav-li">
            <a href="#" onclick="sair()"><strong>Finalizar sessão</strong> <i class="fas fa-sign-out-alt"></a></i>
          </li>
          <li class="list-inline-item nav-li">
            <?php
            if (!$conexao = $f->conectar()) {
              header("Location: menuFunc.php");
            }
            if ($result = $conexao->query("SELECT * FROM funcionario WHERE id_funcionario=" . $_SESSION['id_funcionario'])) {
              while ($dado = $result->fetch_object()) {
                if ($dado->nivel_funcionario == "Supervisor") {
                  echo "<div class='dropdown'>

                  <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-user-circle'></i>
                  </a>
    
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='perfilFuncionario.php'>Meu Perfil</a>
                    <a class='dropdown-item' href='gerenciarFuncionarios.php'>Gerenciar Funcionários</a>
                  </div>
                </div>";
                } else {
                  echo "<div class='dropdown'>

                  <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-user-circle'></i>
                  </a>
    
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                    <a class='dropdown-item' href='perfilFuncionario.php'>Meu Perfil</a>
                  </div>
                </div>";
                }
              }
            }
            ?>

          </li>
        </ul>
      </nav>

      <aside id="nav-aside">
        <div id="menu-area">
          <ul>
            <li><a href="gerenciarAnimais.php"><strong>Gerenciamento de animais</strong> <i class="fas fa-paw"></a></i></li>
            <li><a href="analisarAdocao.php"><strong>Analisar adoção</strong> <i class="fas fa-hand-holding-heart"></a></i></li>
            <li><a href="#" onclick="sair()"><strong>Finalizar sessão</strong> <i class="fas fa-sign-out-alt"></a></i></li>
            <li>
              <?php
              if (!$conexao = $f->conectar()) {
                header("Location: menuFunc.php");
              }
              if ($result = $conexao->query("SELECT * FROM funcionario WHERE id_funcionario=" . $_SESSION['id_funcionario'])) {
                while ($dado = $result->fetch_object()) {
                  if ($dado->nivel_funcionario == "Supervisor") {
                    echo "<div class='dropdown'>

                            <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink1' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                              <i class='fas fa-user-circle'></i>
                            </a>
              
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuLink1'>
                              <a class='dropdown-item' href='perfilFuncionario.php'>Meu Perfil</a>
                              <a class='dropdown-item' href='gerenciarFuncionarios.php'>Gerenciar Funcionários</a>
                            </div>
                          </div>";
                  } else {
                    echo "<div class='dropdown'>

                            <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink1' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                              <i class='fas fa-user-circle'></i>
                            </a>
              
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuLink1'>
                              <a class='dropdown-item' href='perfilFuncionario.php'>Meu Perfil</a>
                            </div>
                          </div>";
                  }
                }
              }
              ?>
            </li>
          </ul>
        </div>
      </aside>

  </header>

  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../js/index.js"></script>
  <script src="../js/loginSair.js"></script>

</body>

</html>