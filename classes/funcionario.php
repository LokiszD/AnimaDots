<!-- Arquivo pra conexão do funcionario -->

<?php
    require_once '../classes/conexao.php';    

    class funcionario{
        
        public function conectar(){ //função pra conexão
            $conexao = new conexao();
            return $conexao -> conectar();
        }
        
        public function logar($login_funcionario, $senha_funcionario){ //função pra logar no site
            if(!$conexao = $this -> conectar()){ 
                return false;
            }
            
            $ret = false; 
            
            $sql =  "SELECT id_funcionario FROM funcionario WHERE login_funcionario ='" .$login_funcionario. "' AND senha_funcionario ='" .$senha_funcionario. "'";
            if ($result = $conexao -> query($sql)) {
                $dado = $result -> fetch_object();
                
                if($dado){
                    session_start();
                    $_SESSION['id_funcionario'] = $dado -> id_funcionario;
                    $ret = true; //logado com sucesso
                }
                                
                $result -> free_result(); 
            }
            
            $conexao -> close(); 
            return $ret;
        }
    }
?>
