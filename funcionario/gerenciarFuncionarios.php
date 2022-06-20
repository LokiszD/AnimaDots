<?php
require_once '../classes/funcionario.php';
$f = new funcionario();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimaDots - Gerenciamento de funcionários</title>
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
        <h1 class="lista-animais">Gerenciamento de Funcionários <i class="fas fa-users"></i></h1>
    </div>

    <div class="container-sm">
        <div class="table-responsive">
            <table id="lista-animais" class="table table-bordered table-info table-striped table-hover">
                <thead>
                    <tr role="row">
                        <th class="tbl-col-center" rowspan="1" colspan="1">Id</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Nome do Funcionário</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">RG</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Telefone</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1">Nível</th>
                        <th class="tbl-col-center" rowspan="1" colspan="1"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCadastroFunc">
                                Adicionar Funcionário
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$conexao = $f->conectar()) {
                        header("Location: gerenciarFuncionarios.php");
                    }
                    if ($result = $conexao->query("SELECT * FROM funcionario ORDER BY id_funcionario")) {
                        while ($dado = $result->fetch_object()) {
                            echo "<tr role='row'>";
                            echo "<td class='tbl-col-center'><b>" . $dado->id_funcionario . "</b></td>";
                            echo "<td class='tbl-col-center'>" . ucwords($dado->nome_funcionario) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucfirst($dado->rg_funcionario) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucfirst($dado->telefone_funcionario) . "</td>";
                            echo "<td class='tbl-col-center'>" . ucfirst($dado->nivel_funcionario) . "</td>";
                            echo "<td class='tbl-col-center'>
                                <button type='button' title='Editar' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalEditarFunc' 
                                    data-bs-id='" . $dado->id_funcionario . "' data-bs-nome='" . $dado->nome_funcionario . "' data-bs-rg='" . $dado->rg_funcionario . "'
                                    data-bs-cpf='" . $dado->cpf_funcionario . "' data-bs-telefone='" . $dado->telefone_funcionario . "' data-bs-login='" . $dado->login_funcionario . "'
                                    data-bs-senha='" . $dado->senha_funcionario . "' data-bs-endereco='" . $dado->endereco_funcionario . "' data-bs-nivel='" . $dado->nivel_funcionario . "'>
                                    <i class='fas fa-edit'></i>
                                </button>
                                <button type='button' title='Excluir' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#modalExcluirFunc'
                                    data-bs-Id='" . $dado->id_funcionario . "' data-bs-Nome='" . $dado->nome_funcionario . "' data-bs-Rg='" . $dado->rg_funcionario . "'
                                    data-bs-Cpf='" . $dado->cpf_funcionario . "' data-bs-Telefone='" . $dado->telefone_funcionario . "' data-bs-Login='" . $dado->login_funcionario . "'
                                    data-bs-Senha='" . $dado->senha_funcionario . "' data-bs-Endereco='" . $dado->endereco_funcionario . "' data-bs-Nivel='" . $dado->nivel_funcionario . "'>
                                    <i class='fas fa-trash-alt'></i>
                                </button>
                                <button type='button' title='Consultar' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalConsultarFunc'
                                    data-bs-id='" . $dado->id_funcionario . "' data-bs-nome='" . $dado->nome_funcionario . "' data-bs-rg='" . $dado->rg_funcionario . "'
                                    data-bs-cpf='" . $dado->cpf_funcionario . "' data-bs-telefone='" . $dado->telefone_funcionario . "' data-bs-login='" . $dado->login_funcionario . "'
                                    data-bs-senha='" . $dado->senha_funcionario . "' data-bs-endereco='" . $dado->endereco_funcionario . "' data-bs-nivel='" . $dado->nivel_funcionario . "'>
                                    Consultar
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
    <div class="modal fade" id="modalCadastroFunc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalCadastroLabel">Adicionar Funcionário</h3>
                    <button onclick="apagaForm()" id="fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formCadastroFunc" action="cadastrarFuncionario.php" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="pata"><i class="fas fa-paw"></i></span>
                            <span class="pata">Campos de preenchimento obrigatório.</span>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_funcionario" id="nome_funcionario" placeholder="Nome do Funcionário" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="rg_funcionario" id="rg_funcionario" placeholder="RG do Funcionário" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="cpf_funcionario" id="cpf_funcionario" placeholder="CPF do Funcionário" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="telefone_funcionario" id="telefone_funcionario" placeholder="Telefone do Funcionário" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="login_funcionario" id="login_funcionario" placeholder="Login do Funcionário" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            <input type="password" autocomplete="off" class="form-control" name="senha_funcionario" id="senha_funcionario" placeholder="Senha do Funcionário" required>
                            <i id='mostraSenha' class='fas fa-eye'></i>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-location-arrow"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="endereco_funcionario" id="endereco_funcionario" placeholder="Endereço do Funcionário" required>
                        </div>
                        <span class="pata"><i class="fas fa-paw"></i></span>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-chart-line"></i></span>
                            <select class="form-select" name="nivel_funcionario" id="nivel_funcionario" required>
                                <option selected disabled>Nível do funcionário</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Funcionário">Funcionário</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button onclick="apagaForm()" id="cancelar" type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button id="salvarDados" type="submit" name="acao" value="Salvar" class="btn btn-outline-success">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edição -->
    <div class="modal fade" id="modalEditarFunc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalEditarLabel">Alterar Funcionário</h3>
                    <button onclick="apagaForm()" id="fecharEditar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditarFunc" action="editarFuncionario.php" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">ID</span>
                            <input type="text" autocomplete="off" class="form-control" name="id_funcionario" id="id_funcionario" placeholder="ID do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_funcionario" id="nome_funcionario" placeholder="Nome do Funcionário" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="rg_funcionario" id="rg_funcionario" placeholder="RG do Funcionário" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="cpf_funcionario" id="cpf_funcionario" placeholder="CPF do Funcionário" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="telefone_funcionario" id="telefone_funcionario" placeholder="Telefone do Funcionário" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="login_funcionario" id="login_funcionario" placeholder="Login do Funcionário" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            <input type="password" autocomplete="off" class="form-control" name="senha_funcionario2" id="senha_funcionario2" placeholder="Senha do Funcionário" required>
                            <i id='mostraSenha2' class='fas fa-eye'></i>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-location-arrow"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="endereco_funcionario" id="endereco_funcionario" placeholder="Endereço do Funcionário" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-chart-line"></i></span>
                            <select class="form-select" name="nivel_funcionario" id="nivel_funcionario" required>
                                <option selected disabled>Nível do funcionário</option>
                                <option value="Supervisor">Supervisor</option>
                                <option value="Funcionário">Funcionário</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button onclick="apagaForm()" id="cancelarEditar" type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button id="salvarDados" type="submit" name="acao" value="Editar" class="btn btn-outline-success">Salvar Alterações</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Exclusão -->
    <div class="modal fade" id="modalExcluirFunc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalCadastroLabel">Excluir Funcionário</h3>
                    <button onclick="apagaCheck()" id="fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formExcluirFunc" action="excluirFuncionario.php" method="post">
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">ID</span>
                            <input type="text" autocomplete="off" class="form-control" name="id_funcionario" id="id_funcionario" placeholder="ID do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_funcionario" id="nome_funcionario" placeholder="Nome do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="rg_funcionario" id="rg_funcionario" placeholder="RG do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="cpf_funcionario" id="cpf_funcionario" placeholder="CPF do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="telefone_funcionario" id="telefone_funcionario" placeholder="Telefone do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="login_funcionario" id="login_funcionario" placeholder="Login do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            <input type="password" autocomplete="off" class="form-control" name="senha_funcionario" id="senha_funcionario" placeholder="Senha do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-location-arrow"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="endereco_funcionario" id="endereco_funcionario" placeholder="Endereço do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-chart-line"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nivel_funcionario" id="nivel_funcionario" placeholder="Nível do Funcionário" readonly>
                        </div>
                        <div class="confExcluir">
                            <div class="form-check">
                                <input id="checkExcluir" class="form-check-input" type="checkbox" name="check" required>
                                <label class="form-check-label" for="invalidCheck">
                                    <b>Estou ciente dessa exclusão.</b>
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="apagaCheck()" type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button id="excluir" type="submit" name="acao" value="Excluir" class="btn btn-outline-danger">Excluir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal Consulta -->
    <div class="modal fade" id="modalConsultarFunc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalCadastroLabel">Consultar Funcionário</h3>
                    <button onclick="apagaForm()" id="fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">ID</span>
                            <input type="text" autocomplete="off" class="form-control" name="id_funcionario" id="id_funcionario" placeholder="ID do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card-alt"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nome_funcionario" id="nome_funcionario" placeholder="Nome do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="rg_funcionario" id="rg_funcionario" placeholder="RG do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-address-card"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="cpf_funcionario" id="cpf_funcionario" placeholder="CPF do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="telefone_funcionario" id="telefone_funcionario" placeholder="Telefone do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="login_funcionario" id="login_funcionario" placeholder="Login do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            <input type="password" autocomplete="off" class="form-control" name="senha_funcionario" id="senha_funcionario" placeholder="Senha do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-location-arrow"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="endereco_funcionario" id="endereco_funcionario" placeholder="Endereço do Funcionário" readonly>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-chart-line"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nivel_funcionario" id="nivel_funcionario" placeholder="Nível do Funcionário" readonly>
                        </div>
                        <div class="modal-footer">
                            <button onclick="apagaForm()" id="cancelar" type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?php include '../menu/footer.php' ?>

    <!-- Link para as coisas do JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdn.es.gov.br/scripts/jquery/jquery-maskedinput/1.4.1/jquery.maskedinput-1.4.1.min.js"></script>
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
    <script>
        $((e) => {
            $("#mostraSenha").on('click', e => {
                //alternando entre mostrar e ocultar a senha
                e.currentTarget.classList.toggle('fa-eye-slash');
                const campoSenha = $('#senha_funcionario').get(0);

                if (campoSenha.type === 'password')
                    campoSenha.type = 'text';
                else
                    campoSenha.type = 'password';
            })
        });
        $((e) => {
            $("#mostraSenha2").on('click', e => {
                //alternando entre mostrar e ocultar a senha
                e.currentTarget.classList.toggle('fa-eye-slash');
                const campoSenha = $('#senha_funcionario2').get(0);

                if (campoSenha.type === 'password')
                    campoSenha.type = 'text';
                else
                    campoSenha.type = 'password';
            })
        });
    </script>
</body>

</html>