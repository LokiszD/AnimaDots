<!-- Tabelinha de animais (completinha) -->

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
    <title>AnimaDots - Gerenciamento de animais</title>
    <!--Link pro css do Bootstrap5-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!--Link pro css-->
    <link rel="stylesheet" href="../css/gerenciarAnimal.css">
    <!--Link para os icones-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!--Link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <!-- Link para o DataTable -->
    <link rel="stylesheet" href="../datatable/jqueryDataTableMin.css">
    <style>
        .error {
            color: red;
            font-style: italic
        }
    </style>

</head>

<body>
    <?php include '../menu/menuFunc.php'; ?>

    <div class="container-sm">
        <h1 class="lista-animais">Gerenciamento de Animais <i class="fas fa-paw"></i></h1>
    </div>

    <div class="container-sm">
        <div class="table-responsive">
            <table id="lista-animais" class="table table-bordered table-info table-striped table-hover">
                <thead>
                    <tr role="row">
                        <th class="tbl-col-center" rowspan="1" colspan="1">Id</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Nome do Animal</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Espécie</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Raça</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Porte</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCadastro">
                                Adicionar Animal
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$conexao = $a->conectar()) {
                        header("Location: gerenciarAnimais.php");
                    }
                    if ($result = $conexao->query("SELECT * FROM animal ORDER BY id_animal")) {
                        while ($dado = $result->fetch_object()) {
                            echo "<tr class='" . $dado->adotado_animal . "' role='row'>";
                            echo "<td class='tbl-col-center'><b>" . $dado->id_animal . "</b></td>";
                            echo "<td class='tbl-col-center'>" . ucwords($dado->nome_animal) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucfirst($dado->especie_animal) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucfirst($dado->raca_animal) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucfirst($dado->porte_animal) . "</td>";
                            echo "<td class='tbl-col-center'>
                                <button type='button' title='Editar' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalEditar' data-bs-Id=" . $dado->id_animal . "
                                    data-bs-Nome='" . $dado->nome_animal . "' data-bs-Sexo=" . $dado->sexo_animal . " data-bs-Raca='" . $dado->raca_animal . "'
                                    data-bs-Idade='" . $dado->idade_animal . "' data-bs-Vacinado=" . $dado->vacinado_animal . " data-bs-Castrado=" . $dado->castrado_animal . "
                                    data-bs-Vermifugado=" . $dado->vermifugado_animal . " data-bs-Especie=" . $dado->especie_animal . " data-bs-Cor='" . $dado->cor_animal . "'
                                    data-bs-Porte=" . $dado->porte_animal . " data-bs-deficiencia='" . $dado->deficiencia_animal . "' data-bs-Foto ='../imgAnimais/" . $dado->foto_animal . "'
                                    data-bs-video ='../videosAnimais/" . $dado->video_animal . "' data-bs-Adotado=" . $dado->adotado_animal . " data-bs-Notas='" . $dado->notas_animal . "'><i class='fas fa-edit'></i>
                                </button>
                                <button type='button' title='Excluir' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalExcluir' data-bs-id=" . $dado->id_animal . "
                                    data-bs-nome='" . ucwords($dado->nome_animal) . "' data-bs-sexo=" . $dado->sexo_animal . " data-bs-raca='" . ucwords($dado->raca_animal) . "'
                                    data-bs-idade='" . $dado->idade_animal . " ano(s)' data-bs-vacinado=" . $dado->vacinado_animal . " data-bs-castrado=" . $dado->castrado_animal . "
                                    data-bs-vermifugado=" . $dado->vermifugado_animal . " data-bs-especie=" . ucfirst($dado->especie_animal) . " data-bs-cor='" . ucfirst($dado->cor_animal) . "'
                                    data-bs-porte=" . $dado->porte_animal . " data-bs-deficiencia='" . $dado->deficiencia_animal . "' data-bs-foto ='../imgAnimais/" . $dado->foto_animal . "'
                                    data-bs-video ='../videosAnimais/" . $dado->video_animal . "' data-bs-adotado=" . $dado->adotado_animal . " data-bs-notas='" . ucfirst($dado->notas_animal) . "'><i class='fas fa-trash-alt'></i>
                                </button>
                                <button type='button' title='Consultar' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalConsultar' data-bs-id=" . $dado->id_animal . "
                                data-bs-nome='" . ucwords($dado->nome_animal) . "' data-bs-sexo=" . $dado->sexo_animal . " data-bs-raca='" . ucwords($dado->raca_animal) . "'
                                data-bs-idade='" . $dado->idade_animal . " ano(s)' data-bs-vacinado=" . $dado->vacinado_animal . " data-bs-castrado=" . $dado->castrado_animal . "
                                data-bs-vermifugado=" . $dado->vermifugado_animal . " data-bs-especie=" . ucfirst($dado->especie_animal) . " data-bs-cor='" . ucfirst($dado->cor_animal) . "'
                                data-bs-porte=" . $dado->porte_animal . " data-bs-deficiencia='" . $dado->deficiencia_animal . "' data-bs-foto ='../imgAnimais/" . $dado->foto_animal . "'
                                data-bs-video ='../videosAnimais/" . $dado->video_animal . "' data-bs-adotado=" . $dado->adotado_animal . " data-bs-notas='" . ucfirst($dado->notas_animal) . "'>Consultar
                            </button>";
                            echo "</tr>";
                        }
                        $result->free_result();
                    }
                    $conexao->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Cadastro -->
    <div class="modal fade" id="modalCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalCadastroLabel">Adicionar Animal</h3>
                    <button onclick="apagaForm()" id="fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formCadastro" action="cadastrarAnimal.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="pata"><i class="fas fa-paw"></i></span>
                            <span class="pata">Campos de preenchimento obrigatório.</span>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_animal" id="nome_animal" placeholder="Nome do animal" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-venus-mars"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="sexo_animal" id="sexo_animal" value="fêmea" required> Fêmea
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="sexo_animal" id="sexo_animal" value="macho" required> Macho
                                </div>
                            </div>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-paw"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="raca_animal" id="raca_animal" placeholder="Raça" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-birthday-cake"></i></span>
                            <input type="number" autocomplete="off" class="form-control" min="0" name="idade_animal" id="idade_animal" placeholder="Idade" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-syringe"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="vacinado_animal" id="vacinado_animal" value="vacinado" required> Vacinado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="vacinado_animal" id="vacinado_animal" value="nao_vacinado" required> Não vacinado
                                </div>
                            </div>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-heart"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="castrado_animal" id="castrado_animal" value="castrado" required> Castrado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="castrado_animal" id="castrado_animal" value="nao_castrado" required> Não castrado
                                </div>
                            </div>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-capsules"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="vermifugado_animal" id="vermifugado_animal" value="vermifugado" required> Vermifugado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="vermifugado_animal" id="vermifugado_animal" value="nao_vermifugado" required> Não vermifugado
                                </div>
                            </div>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-dog"></i> | <i class="fas fa-cat"></i></span>
                            <select class="form-select" name="especie_animal" id="especie_animal" required>
                                <option selected disabled>Espécie...</option>
                                <option value="cachorro">Cachorro</option>
                                <option value="gato">Gato</option>
                            </select>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tint"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="cor_animal" id="cor_animal" placeholder="Cor do animal" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-ruler-combined"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="pequeno" required> Pequeno
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="médio" required> Médio
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="grande" required> Grande
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="hidden">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-medical"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="deficiencia_animal" id="deficiencia_animal" placeholder="Deficiência (caso tiver)">
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-camera"></i></span>
                            <input type="file" class="form-control" name="foto_animal" id="foto_animal" require>
                        </div>
                        <div class="input-group mb-3">
                            <input type="hidden">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-video"></i></span>
                            <input type="file" class="form-control" name="video_animal" id="video_animal">
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-hand-holding-heart"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="adotado_animal" id="adotado_animal" value="adotado" required> Adotado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="adotado_animal" id="adotado_animal" value="nao_adotado" required> Não adotado
                                </div>
                            </div>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            <textarea style="text-align:justify" rows="5" class="form-control" autocomplete="off" name="notas_animal" id="notas_animal" placeholder="Carta de apresentação do animal" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="apagaForm()" id="cancelar" type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button id="salvarDados" type="submit" name="acao" value="Salvar" class="btn btn-outline-success">Salvar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- #################################################################################################################################### -->

    <!-- Modal Edição -->
    <div class="modal fade" id="modalEditar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalEditarLabel">Editar Animal</h3>
                    <button id="fecharEditar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditar" action="editarAnimal.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">ID</span>
                            <input type="text" id="id_animal" class="form-control" name="id_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" class="form-control" name="nome_animal" id="nome_animal" placeholder="Nome do animal" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-venus-mars"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="sexo_animal" id="sexo_animal" value="fêmea" required> Fêmea
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="sexo_animal" id="sexo_animal" value="macho" required> Macho
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-paw"></i></span>
                            <input type="text" class="form-control" name="raca_animal" id="raca_animal" placeholder="Raça" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-birthday-cake"></i></span>
                            <input type="number" class="form-control" min="0" name="idade_animal" id="idade_animal" placeholder="Idade" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-syringe"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="vacinado_animal" id="vacinado_animal" value="vacinado" required> Vacinado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="vacinado_animal" id="vacinado_animal" value="nao_vacinado" required> Não vacinado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-heart"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="castrado_animal" id="castrado_animal" value="castrado" required> Castrado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="castrado_animal" id="castrado_animal" value="nao_castrado" required> Não castrado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-capsules"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="vermifugado_animal" id="vermifugado_animal" value="vermifugado" required> Vermifugado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="vermifugado_animal" id="vermifugado_animal" value="nao_vermifugado" required> Não vermifugado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-dog"></i> | <i class="fas fa-cat"></i></span>
                            <select class="form-select" name="especie_animal" id="especie_animal" required>
                                <option selected disabled>Espécie...</option>
                                <option value="cachorro">Cachorro</option>
                                <option value="gato">Gato</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tint"></i></span>
                            <input type="text" class="form-control" name="cor_animal" id="cor_animal" placeholder="Cor do animal" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-ruler-combined"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="pequeno" required> Pequeno
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="médio" required> Médio
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="grande" required> Grande
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-medical"></i></span>
                            <input type="text" class="form-control" name="deficiencia_animal" id="deficiencia_animal" placeholder="Deficiência (caso tiver)">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-camera"></i></span>
                            <div class="form-control">
                                <img src="" class="foto_animal" name="foto_animal" id="foto_animal" alt="Nenhuma foto encontrada">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-camera"></i></span>
                            <input type="file" class="form-control" name="foto_animal" id="foto_animal">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-video"></i></span>
                            <div class="form-control">
                                <video controls src="" class="video_animal" name="video_animal" id="video_animal">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-video"></i></span>
                            <input type="file" class="form-control" name="video_animal" id="video_animal">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-hand-holding-heart"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="adotado_animal" id="adotado_animal" value="adotado" required> Adotado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="adotado_animal" id="adotado_animal" value="nao_adotado" required> Não adotado
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            <textarea style="text-align:justify" rows="5" class="form-control" name="notas_animal" id="notas_animal" placeholder="Carta de apresentação do animal" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="cancelarEditar" type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="acao" value="Editar" class="btn btn-outline-success">Salvar Alterações</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- #################################################################################################################################### -->

    <!-- Modal Excluir -->
    <div class="modal fade" id="modalExcluir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalExcluirLabel">Excluir Animal</h3>
                    <button onclick="apagaCheck()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formExcluir" action="excluirAnimal.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">ID</span>
                            <input type="text" id="id_animal" class="form-control" name="id_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" class="form-control" name="nome_animal" id="nome_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-venus-mars"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="sexo_animal" id="sexo_animal" value="fêmea" disabled> Fêmea
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="sexo_animal" id="sexo_animal" value="macho" disabled> Macho
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-paw"></i></span>
                            <input type="text" class="form-control" name="raca_animal" id="raca_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-birthday-cake"></i></span>
                            <input type="text" class="form-control" name="idade_animal" id="idade_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-syringe"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="vacinado_animal" id="vacinado_animal" value="vacinado" disabled> Vacinado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="vacinado_animal" id="vacinado_animal" value="nao_vacinado" disabled> Não vacinado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-heart"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="castrado_animal" id="castrado_animal" value="castrado" disabled> Castrado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="castrado_animal" id="castrado_animal" value="nao_castrado" disabled> Não castrado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-capsules"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="vermifugado_animal" id="vermifugado_animal" value="vermifugado" disabled> Vermifugado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="vermifugado_animal" id="vermifugado_animal" value="nao_vermifugado" disabled> Não vermifugado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-dog"></i> | <i class="fas fa-cat"></i></span>
                            <input type="text" class="form-control" name="especie_animal" id="especie_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tint"></i></span>
                            <input type="text" class="form-control" name="cor_animal" id="cor_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-ruler-combined"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="pequeno" disabled> Pequeno
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="médio" disabled> Médio
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="grande" disabled> Grande
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-medical"></i></span>
                            <input type="text" class="form-control" name="deficiencia_animal" id="deficiencia_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-camera"></i></span>
                            <div class="form-control">
                                <img src="" class="foto_animal" name="foto_animal" id="foto_animal" alt="Nenhuma foto encontrada">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-video"></i></span>
                            <div class="form-control">
                                <video controls src="" class="video_animal" name="video_animal" id="video_animal" alt="Nenhum vídeo encontrado">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-hand-holding-heart"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="adotado_animal" id="adotado_animal" value="adotado" disabled> Adotado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="adotado_animal" id="adotado_animal" value="nao_adotado" disabled> Não adotado
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            <textarea style="text-align:justify" rows="5" class="form-control" name="notas_animal" id="notas_animal" readonly></textarea>
                        </div>
                        <div class="confExcluir">
                            <div class="form-check">
                                <input id="checkExcluir" class="form-check-input" type="checkbox" name="check" required>
                                <label class="form-check-label" for="invalidCheck">
                                    <b>Estou ciente dessa exclusão.</b>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button onclick="apagaCheck()" type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="acao" value="Excluir" class="btn btn-outline-danger">Excluir</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- #################################################################################################################################### -->

    <!-- Modal Consultar -->
    <div class="modal fade" id="modalConsultar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalConsultarLabel">Consultar Animal</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formConsultar" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">ID</span>
                            <input type="text" id="id_animal" class="form-control" name="id_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" class="form-control" name="nome_animal" id="nome_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-venus-mars"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="sexo_animal" id="sexo_animal" value="fêmea" disabled> Fêmea
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="sexo_animal" id="sexo_animal" value="macho" disabled> Macho
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-paw"></i></span>
                            <input type="text" class="form-control" name="raca_animal" id="raca_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-birthday-cake"></i></span>
                            <input type="text" class="form-control" name="idade_animal" id="idade_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-syringe"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="vacinado_animal" id="vacinado_animal" value="vacinado" disabled> Vacinado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="vacinado_animal" id="vacinado_animal" value="nao_vacinado" disabled> Não vacinado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-heart"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="castrado_animal" id="castrado_animal" value="castrado" disabled> Castrado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="castrado_animal" id="castrado_animal" value="nao_castrado" disabled> Não castrado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-capsules"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="vermifugado_animal" id="vermifugado_animal" value="vermifugado" disabled> Vermifugado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="vermifugado_animal" id="vermifugado_animal" value="nao_vermifugado" disabled> Não vermifugado
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-dog"></i> | <i class="fas fa-cat"></i></span>
                            <input type="text" class="form-control" name="especie_animal" id="especie_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-tint"></i></span>
                            <input type="text" class="form-control" name="cor_animal" id="cor_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-ruler-combined"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="pequeno" disabled> Pequeno
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="médio" disabled> Médio
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="grande" disabled> Grande
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-medical"></i></span>
                            <input type="text" class="form-control" name="deficiencia_animal" id="deficiencia_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-camera"></i></span>
                            <div class="form-control">
                                <img src="" class="foto_animal" name="foto_animal" id="foto_animal" alt="Nenhuma foto encontrada">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-video"></i></span>
                            <div class="form-control">
                                <video controls src="" class="video_animal" name="video_animal" id="video_animal">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-hand-holding-heart"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="adotado_animal" id="adotado_animal" value="adotado" disabled> Adotado
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="adotado_animal" id="adotado_animal" value="nao_adotado" disabled> Não adotado
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                            <textarea style="text-align:justify" rows="5" class="form-control" name="notas_animal" id="notas_animal" readonly></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <?php include '../menu/footer.php' ?>

    <!-- Link para as coisas do JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <!-- Link para validação do cadastro e exclusão de animais -->
    <script src="../js/validaForm.js"></script>
    <!-- Link para o Js que carrega os dados nos modais -->
    <script src="../js/carregarDados.js"></script>
    <!-- Link para o DataTable -->
    <script src="../datatable/jquery351.js"></script>
    <script src="../datatable/jqueryDataTableMin.js"></script>
    <script>
        $(document).ready(function() {
            $('#lista-animais').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
                },
                "pageLength": 5,
                "lengthMenu": [
                    [1, 5, 10, 25, 50, 100, -1],
                    [1, 5, 10, 25, 50, 100, "Todos"]
                ]
            })
        });
    </script>
</body>

</html>