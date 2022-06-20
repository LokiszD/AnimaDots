<!-- Arquivo Update -->

<?php
require_once '../classes/conexao.php';
$a = new conexao();

if (!$conexao = $a->conectar()) {
    header("location: editarAnimal.php");
}

if (isset($_POST['acao'])) {
    $acao = $_POST['acao'];
    if ($acao == "Editar") {

        $id_animal = $_POST['id_animal'];
        $nome_animal = $_POST['nome_animal'];
        $sexo_animal = $_POST['sexo_animal'];
        $raca_animal = $_POST['raca_animal'];
        $idade_animal = $_POST['idade_animal'];
        $vacinado_animal = $_POST['vacinado_animal'];
        $castrado_animal = $_POST['castrado_animal'];
        $vermifugado_animal = $_POST['vermifugado_animal'];
        $especie_animal = $_POST['especie_animal'];
        $cor_animal = $_POST['cor_animal'];
        $porte_animal = $_POST['porte_animal'];
        $deficiencia_animal = $_POST['deficiencia_animal'];
        $foto_animal = $_FILES['foto_animal'];
        $video_animal = $_FILES['video_animal'];
        $adotado_animal = $_POST['adotado_animal'];
        $notas_animal = $_POST['notas_animal'];


        if ($_FILES['foto_animal']['name'] != "") {

            // Largura máxima em pixels 
            $largura = 1500;
            // Altura máxima em pixels
            $altura = 1800;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 1000000;

            $error = array();

            // Verifica se o arquivo é uma imagem
            if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp|webp)$/", $foto_animal["type"])) {
                $error[1] = "Isso não é uma imagem.";
            }

            // Pega as dimensões da imagem
            $dimensoes = getimagesize($foto_animal["tmp_name"]);

            // Verifica se a largura da imagem é maior que a largura permitida
            if ($dimensoes[0] > $largura) {
                $error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
            }

            // Verifica se a altura da imagem é maior que a altura permitida
            if ($dimensoes[1] > $altura) {
                $error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
            }

            // Verifica se o tamanho da imagem é maior que o tamanho permitido
            if ($foto["size"] > $tamanho) {
                $error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
            }

            // Se não houver nenhum erro
            if (count($error) == 0) {

                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto_animal["name"], $ext);

                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                // Caminho de onde ficará a imagem
                $caminho_imagem = "../imgAnimais/" . $nome_imagem;

                // Faz o upload da imagem para seu respectivo caminho
                move_uploaded_file($foto_animal["tmp_name"], $caminho_imagem);
            }
            $sql = "UPDATE animal 
                        SET nome_animal= '$nome_animal', sexo_animal= '$sexo_animal', raca_animal= '$raca_animal', idade_animal= '$idade_animal', vacinado_animal= '$vacinado_animal', castrado_animal= '$castrado_animal', vermifugado_animal= '$vermifugado_animal', especie_animal= '$especie_animal', cor_animal= '$cor_animal', porte_animal= '$porte_animal', deficiencia_animal= '$deficiencia_animal', foto_animal= '$nome_imagem', adotado_animal= '$adotado_animal', notas_animal= '$notas_animal' 
                        WHERE id_animal =" . $id_animal;

            $sql = mysqli_query($conexao, $sql);

            header("location: gerenciarAnimais.php");
        } 

        if ($_FILES['video_animal']['name'] != "") {

            // Largura máxima em pixels
            $largura = 1500;
            // Altura máxima em pixels
            $altura = 1800;
            // Tamanho máximo do arquivo em bytes
            $tamanho = 1000000;

            $error = array();

            // Verifica se o arquivo é um vídeo
            if (!preg_match("/^video\/(asf|avi|mp4|m4v|mov|mpg|mpeg|wmv)$/", $video_animal["type"])) {
                $error[1] = "Isso não é um vídeo.";
            }

            // Pega as dimensões do vídeo
            $dimensoes = getimagesize($video_animal["tmp_name"]);

            // Se não houver nenhum erro
            if (count($error) == 0) {

                // Pega extensão do vídeo
                preg_match("/\.(asf|avi|mp4|m4v|mov|mpg|mpeg|wmv){1}$/i", $video_animal["name"], $ext);

                // Gera um nome único para o vídeo
                $nome_video = md5(uniqid(time())) . "." . $ext[1];

                // Caminho de onde ficará o vídeo
                $caminho_video = "../videosAnimais/" . $nome_video;

                // Faz o upload do vídeo para seu respectivo caminho
                move_uploaded_file($video_animal["tmp_name"], $caminho_video);
            }

            $sql = "UPDATE animal 
                    SET nome_animal= '$nome_animal', sexo_animal= '$sexo_animal', raca_animal= '$raca_animal', idade_animal= '$idade_animal', vacinado_animal= '$vacinado_animal', castrado_animal= '$castrado_animal', vermifugado_animal= '$vermifugado_animal', especie_animal= '$especie_animal', cor_animal= '$cor_animal', porte_animal= '$porte_animal', deficiencia_animal= '$deficiencia_animal', video_animal= '$nome_video', adotado_animal= '$adotado_animal', notas_animal= '$notas_animal' 
                    WHERE id_animal =" . $id_animal;

            $sql = mysqli_query($conexao, $sql);

            header("location: gerenciarAnimais.php");
        }
        
        if (!empty('nome_animal')) {

            $sql = "UPDATE animal 
            SET nome_animal= '$nome_animal', sexo_animal= '$sexo_animal', raca_animal= '$raca_animal', idade_animal= '$idade_animal', vacinado_animal= '$vacinado_animal', castrado_animal= '$castrado_animal', vermifugado_animal= '$vermifugado_animal', especie_animal= '$especie_animal', cor_animal= '$cor_animal', porte_animal= '$porte_animal', deficiencia_animal= '$deficiencia_animal', adotado_animal= '$adotado_animal', notas_animal= '$notas_animal' 
            WHERE id_animal =" . $id_animal;

            $sql = mysqli_query($conexao, $sql);

            header("location: gerenciarAnimais.php");
        }
    }
}
?>