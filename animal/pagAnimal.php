<!-- Arquivo Read -->

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
    <link rel="stylesheet" href="../css/pagAnimal.css">
    <link rel="stylesheet" href="../css/gerenciarAnimal.css">
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

    echo "<div class='container-sm'> 
                        <div class='row g-0'>
                            <div class='col-md-6'>
                                <img src='../imgAnimais/" . $dado->foto_animal . "' class='foto-animal' alt='...'>
                            </div>
                            <div class='col-md-6'>
                                <h2 class='nome'><b>" . ucwords($dado->nome_animal) . "</b></h2>
                                <br><br><br>
                                <div class='infoAnimal'>
                                    <p> <span>-" . ucfirst($dado->sexo_animal) . " </span></p>
                                    <p> <span>-Porte " . $dado->porte_animal . " </span></p>
                                    <p> <span>-" . ucfirst($dado->raca_animal) . " </span></p>
                                    <p> <span>-" . ucfirst($dado->cor_animal) . " </span></p>
                                    <p> <span>-Idade aproximada: " . $dado->idade_animal . " ano(s)</span></p>
                                </div>
                                <div class='descricao'>
                                    <p>" . $dado->notas_animal . "</p>
                                </div>
                                <div class='botao'>
                                    <a href='' type='button' data-bs-toggle='modal' data-bs-target='#modalAdocao'><img src='../assets/patinha.webp'/></a>
                                    <p><b>QUERO ADOTAR!</b></p> 
                                </div>
                            </div>
                        </div>
                    </div>";
    ?>

    <div class="modal fade" id="modalAdocao">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalCadastroLabel">Critérios para a adoção</h3>
                    <button onclick="apagaForm()" id="fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="color:black; text-align:justify">
                    1 - Ser maior de 18 anos; <br><br>
                    2 - Trazer CÓPIA do comprovante de residência do último mês e em seu nome; (o original deverá ser apresentado para comprovação) tempo de residência: mínimo 12 meses.<br><br>
                    3 - Trazer CÓPIA de um documento pessoal de identificação; (o original deverá ser apresentado para comprovação).<br><br>
                    4 - Ser o responsável financeiro pela residência – caso o adotante não seja o responsável financeiro pela residência, o responsável (pai/mãe e responsável legal) deverá estar presente no ato da adoção e assinar o termo de adoção juntamente com o adotante como “anuente”.<br><br>
                    5 - NÃO SERÁ FEITA ADOÇÃO EM NOME DE “TERCEIROS”, ou seja, para outra pessoa que não esteja presente no local;<br><br>
                    6 - Não fazemos doação de animais de grande porte para serem cães de guarda e etc.;<br><br>
                    7 - ANTES DA ADOÇÃO SERÁ FEITA UMA ENTREVISTA para verificar se as condições do adotante são compatíveis com as necessidades e perfil o animal que ele está adotando (Entrevista com a família, breve histórico e estudo preliminar do perfil da dinâmica da família para adequação ao perfil do peludo a ser adotado);<br><br>
                    8 - A família e o tutor tem que ter ciência de que A POSSE RESPONSÁVEL deste novo membro implica:<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&bull; Em entender que um animal doméstico (cão ou gato) VIVE EM MÉDIA 15 ANOS e em alguns casos muito mais que isso, portanto tenha em mente que você terá responsabilidade durante todo esse período de tempo;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&bull; Em impactos financeiros, uma vez que terão despesas mensais de alimentação e antiparasitários, cuidados veterinários anuais (vacinação) e outras devido à intercorrências inesperadas;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&bull; Em mudanças na sua rotina, em entender que este novo membro da família é uma vida e precisa estar incluso nos planos para todas as situações rotineiras, imprevistos, doenças, férias, viagens, mudanças, nascimento de filhos etc. ANIMAIS NÃO SÃO DESCARTÁVEIS;<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&bull; Em ter paciência e entender que este ser é uma espécie diferente da sua e traz consigo especificidades e necessidades particulares, em desprendimento do seu tempo e do seu espaço. Ex: Os cães latem, choram, mordem e destroem coisas, cavam, precisam de exercícios constantes, etc... e os gatos miam, também precisam de estímulos, sobem e arranham móveis e como são animais noturnos, costumam a perambular pela casa à noite.<br>
                    <div class="modal-footer">
                        <button id="cancelar" type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                        <?php echo "<a href='formAdocao.php?id_animal=" . $dado->id_animal . "' class='btn btn-outline-success'>Continuar adoção</a>" ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include '../menu/footer.php' ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../js/validaForm.js"></script>
</body>

</html>