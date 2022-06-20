<!--arquivo para finalizar a sessao do funcionario-->

<?php
    session_start();
    unset($_SESSION['id_funcionario']);
    header("location: loginFunc.php");
?>


