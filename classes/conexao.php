<!-- Arquivo de conexão com o banco de dados -->

<?php

    class conexao{

        public function conectar(){

            $conexao = new mysqli("localhost", "root", "", "animadots");

            if($conexao -> connect_errno){
                echo "Falha ao conectar no Banco de Dados : " .$conexao -> connect_error;
                return false;
            }

            return $conexao;
        }
    }    
?>    