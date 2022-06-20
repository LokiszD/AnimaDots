<!-- Arquivo Delete -->

<?php
    require_once '../classes/conexao.php';
    $a = new conexao();

        if(!$conexao = $a -> conectar()) {
            header("location: excluirAnimal.php");
        }
            if(isset($_POST['acao'])) {
                $acao = $_POST['acao'];
                if($acao == "Excluir") {
                    
                    $id_animal = $_POST['id_animal'];
                    $sql = "DELETE FROM animal WHERE id_animal=" .$id_animal;
                    $sql = mysqli_query($conexao, $sql);
                    mysqli_close($conexao);
                    header("location: gerenciarAnimais.php");
                }
            }
?>
            
        
               