<?php

require_once '../classes/conexao.php';
$a = new conexao();

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimaDots - Análise de Adoções</title>
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
        <h1 class="lista-animais">Análise de Adoções <i class="fas fa-hand-holding-heart"></i></h1>
    </div>

    <div class="container-sm">
        <div class="table-responsive">
            <table id="lista-adocoes" class="table table-bordered table-info table-striped table-hover">
                <thead>
                    <tr role="row">
                        <th class="tbl-col-center" rowspan="1" colspan="1">Id</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Nome do Adotante</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Nome do Animal</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Espécie</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Status</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Operações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$conexao = $a->conectar()) {
                        header("Location: gerenciarAnimais.php");
                    }
                    if ($result = $conexao->query("SELECT adocao.*, animal.*, internauta.*, funcionario.nome_funcionario
                                                FROM adocao INNER JOIN animal ON adocao.animalId_animal= animal.id_animal 
                                                INNER JOIN internauta ON adocao.internautaId_internauta= internauta.id_internauta
                                                LEFT JOIN funcionario ON adocao.funcionarioId_funcionario= funcionario.id_funcionario")) {
                        while ($dado = $result->fetch_object()) {
                            echo "<tr class='" . $dado->status_adocao . "' role='row'>";
                            echo "<td class='tbl-col-center'><b>" . $dado->id_adocao . "</b></td>";
                            echo "<td class='tbl-col-center'>" . ucwords($dado->nome_internauta) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucwords($dado->nome_animal) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucfirst($dado->especie_animal) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucfirst($dado->status_adocao) . "</td>";
                            echo "<td class='tbl-col-center'>";
                            if($dado->status_adocao == "pendente") {
                                echo "<button id='botaoResponder' type='button' class='btn btn-light' data-bs-toggle='modal' data-bs-target='#modalResponderAdocao' data-bs-idA= 'Pedido de Adoção nº " . $dado->id_adocao . "' data-bs-nomeInternauta='" . ucwords($dado->nome_internauta) . "'
                                data-bs-idadeInternauta='" . $dado->idade_internauta . " anos' data-bs-rg=" . $dado->rg_internauta . " data-bs-cpf=" . $dado->cpf_internauta . " data-bs-telefone=" . $dado->telefone_internauta . " data-bs-email='" . $dado->email_internauta . "' 
                                data-bs-endereco='" . $dado->endereco_internauta . ", nº " . $dado->numeroCasa_internauta . "' data-bs-complemento='" . $dado->complemento_internauta . "' data-bs-bairro='" . $dado->bairro_internauta . "' data-bs-cep='" . $dado->cep_internauta . "'
                                data-bs-residencia='" . ucfirst($dado->residencia_internauta) . "' data-bs-cidade='" . ucwords($dado->cidade_internauta) . "' data-bs-preferencia='" . $dado->preferenciaAnimal_internauta . "'
                                data-bs-nomeAnimal='" . ucwords($dado->nome_animal) . "' data-bs-sexo=" . $dado->sexo_animal . " data-bs-raca='" . ucwords($dado->raca_animal) . "'
                                data-bs-idade='" . $dado->idade_animal . " ano(s)' data-bs-vacinado=" . $dado->vacinado_animal . " data-bs-castrado=" . $dado->castrado_animal . "
                                data-bs-vermifugado=" . $dado->vermifugado_animal . " data-bs-especie=" . ucfirst($dado->especie_animal) . " data-bs-cor='" . ucfirst($dado->cor_animal) . "'
                                data-bs-porte=" . $dado->porte_animal . " data-bs-deficiencia='" . $dado->deficiencia_animal . "' data-bs-foto ='../imgAnimais/" . $dado->foto_animal . "'
                                data-bs-adotado=" . $dado->adotado_animal . " data-bs-notas='" . ucfirst($dado->notas_animal) . "'
                                data-bs-idAdocao= " . $dado->id_adocao . " data-bs-idAnimal= " . $dado->id_animal . ">Responder
                            </button>";
                            } else  {
                                echo "<button id='botaoConsultar' type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#modalConsultarAdocao' data-bs-idAdocao= 'Pedido de Adoção nº " . $dado->id_adocao . "' data-bs-nomeInt='" . ucwords($dado->nome_internauta) . "'
                                data-bs-nomeAni='" . ucwords($dado->nome_animal) . "' data-bs-fotoAni ='../imgAnimais/" . $dado->foto_animal . "' data-bs-dataCriacao='" .ucfirst(strftime('%A, %d de %B de %Y', strtotime($dado->data_criacao_adocao))) . "' 
                                data-bs-dataModificacao='" . ucfirst(strftime('%A, %d de %B de %Y', strtotime($dado->data_modificacao_adocao))) . "' data-bs-status='" . ucfirst($dado->status_adocao) . "' data-bs-funcionario='".ucwords($dado->nome_funcionario)."'>Consultar
                                </button>";
                            }
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

    <!-- Modal de Resposta -->
    <div class="modal fade" id="modalResponderAdocao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal-title"></h3>
                    <button onclick="apagaConfirma()" id="fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formAnaliseAdocao" action="respostaAdocao.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <h5 class="modal-title" id="infoAdocao">Sobre o adotante</h5>
                        <input type="hidden" name="id_adocao" id="id_adocao">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_internauta" id="nome_internauta" placeholder="Nome completo" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-birthday-cake"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="idade_internauta" id="idade_internauta" placeholder="Idade" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="rg_internauta" id="rg_internauta" placeholder="RG" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="cpf_internauta" id="cpf_internauta" placeholder="CPF" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="telefone_internauta" id="telefone_internauta" placeholder="Telefone" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            <input type="email" autocomplete="off" class="form-control" name="email_internauta" id="email_internauta" placeholder="E-mail" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-location-arrow"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="endereco_internauta" id="endereco_internauta" placeholder="Endereço" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-plus"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="complemento_internauta" id="complemento_internauta" placeholder="Complemento" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marked-alt"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="bairro_internauta" id="bairro_internauta" placeholder="Bairro" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-compass"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="cep_internauta" id="cep_internauta" placeholder="CEP" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-home"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="residencia_internauta" id="residencia_internauta" placeholder="Tipo de residência (Ex: casa, apartamento, etc.)" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-city"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="cidade_internauta" id="cidade_internauta" placeholder="Cidade" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-dog"></i> | <i class="fas fa-cat"></i></span>
                            <div class="form-control animal-input-radio">
                                <div>
                                    <input type="radio" class="form-check-input" name="preferenciaAnimal_internauta" id="preferenciaAnimal_internauta" value="cachorro" disabled> Cachorro
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="preferenciaAnimal_internauta" id="preferenciaAnimal_internauta" value="gato" disabled> Gato
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="preferenciaAnimal_internauta" id="preferenciaAnimal_internauta" value="indiferente" disabled> Indiferente
                                </div>
                            </div>
                        </div>
                        <h5 class="modal-title" id="infoAdocao">Sobre o animal</h5>
                        <input type="hidden" name="id_animal" id="id_animal">
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
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="medio" disabled> Médio
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="porte_animal" id="porte_animal" value="grande" disabled> Grande
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-medical"></i></span>
                            <input type="text" class="form-control" name="deficiencia_animal" id="deficiencia_animal" placeholder="Deficiência (caso tiver)" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-camera"></i></span>
                            <div class="form-control">
                                <img src="" class="foto_animal" name="foto_animal" id="foto_animal" alt="Nenhuma foto encontrada">
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
                        <div class="confirmar">
                            <div class="form-check">
                                <input id="checkExcluir" class="form-check-input" type="checkbox" name="check" required>
                                <label class="form-check-label" for="invalidCheck">
                                    <b>Estou ciente desta ação.</b>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="negar" type="submit" name="acao" value="Negar" class="btn btn-outline-danger">Negar Adoção</button>
                        <button id="adotar" type="submit" name="acao" value="Adotar" class="btn btn-outline-success">Aprovar Adoção</button>
                    </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Modal de Consulta -->
    <div class="modal fade" id="modalConsultarAdocao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalConsulta-title"></h3>
                    <button id="fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formConsultaAdocao">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><strong>Nome do adotante</strong></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_internauta" id="nome_internauta" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><strong>Nome do animal</strong></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_animal" id="nome_animal" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-camera"></i></span>
                            <div class="form-control">
                                <img src="" class="foto_animal" name="foto_animal" id="foto_animal" alt="Nenhuma foto encontrada">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><strong>Data do pedido</strong></span>
                            <input type="text" autocomplete="off" class="form-control" name="data_criacao" id="data_criacao" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><strong>Data da resposta</strong></span>
                            <input type="text" autocomplete="off" class="form-control" name="data_modificacao" id="data_modificacao" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><strong>Status</strong></span>
                            <input type="text" autocomplete="off" class="form-control" name="status_adocao" id="status_adocao" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><strong>Funcionário responsável</strong></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_funcionario" id="nome_funcionario" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include '../menu/footer.php'; ?>

    <!-- Link para as coisas do JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <!-- Link para validação do formulário -->
    <script src="../js/validaForm.js"></script>
    <!-- Link para o Js que carrega os dados nos modais -->
    <script src="../js/carregarDados.js"></script>
    <!-- Link para o DataTable -->
    <script src="../datatable/jquery351.js"></script>
    <script src="../datatable/jqueryDataTableMin.js"></script>
    <script>
        $(document).ready(function() {
            $('#lista-adocoes').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.4/i18n/pt_br.json"
                },
                "pageLength": 5,
                "lengthMenu": [
                    [1, 5, 10, 25, 50, 100, -1],
                    [1, 5, 10, 25, 50, 100, "Todos"]
                ],
                order: [
                    [4, 'desc']
                ]
            })
        });
    </script>
</body>