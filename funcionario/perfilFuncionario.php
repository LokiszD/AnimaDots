<?php
require_once '../classes/funcionario.php';
$f = new funcionario();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnimaDots - Meu Perfil</title>
    <!--Link pro css do Bootstrap5-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!--Link pro css-->
    <link rel="stylesheet" href="../css/perfilFuncionario.css">
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
    <?php include_once '../menu/menuFunc.php'; ?>

    <div class="container-sm">
        <h1 class="lista-animais">Meu perfil <i class="fas fa-user-circle"></i></h1>
    </div>

    <div class="container-sm">
        <?php
        if (!$conexao = $f->conectar()) {
            header("Location: perfilFuncionario.php");
        }
        if ($result = $conexao->query("SELECT * FROM funcionario WHERE id_funcionario=" . $_SESSION['id_funcionario'])) {
            while ($dado = $result->fetch_object()) {
                echo "<div class='col-6'>
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'><i class='fas fa-id-card-alt'></i></span>
                                <input type='text' autocomplete='off' class='form-control' name='nome_funcionario' id='nome_funcionario' placeholder='Meu nome' value='" . ucwords($dado->nome_funcionario) . "' readonly> 
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'><i class='fas fa-address-card'></i></span>
                                <input type='text' autocomplete='off' class='form-control' name='rg_funcionario' id='rg_funcionario' placeholder='Meu RG' value='" . ucwords($dado->rg_funcionario) . "' readonly> 
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'><i class='fas fa-address-card'></i></span>
                                <input type='text' autocomplete='off' class='form-control' name='cpf_funcionario' id='cpf_funcionario' placeholder='Meu CPF' value='" . ucwords($dado->cpf_funcionario) . "' readonly> 
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'><i class='fas fa-phone'></i></span>
                                <input type='text' autocomplete='off' class='form-control' name='telefone_funcionario' id='telefone_funcionario' placeholder='Meu telefone' value='" . ucwords($dado->telefone_funcionario) . "' readonly> 
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'><i class='fas fa-at'></i></span>
                                <input type='text' autocomplete='off' class='form-control' name='login_funcionario' id='login_funcionario' placeholder='Meu login' value='" . $dado->login_funcionario . "' readonly> 
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'><i class='fas fa-lock'></i></span>
                                <input type='password' autocomplete='off' class='form-control' name='senha_funcionario' id='senha_funcionario' placeholder='Minha senha' value='" . $dado->senha_funcionario . "' readonly> 
                                <i id='mostraSenha' class='fas fa-eye'></i>
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'><i class='fas fa-location-arrow'></i></span>
                                <input type='text' autocomplete='off' class='form-control' name='endereco_funcionario' id='endereco_funcionario' placeholder='Meu endereço' value='" . ucwords($dado->endereco_funcionario) . "' readonly> 
                            </div>
                        </div>
                        <div class='col-6'>
                            <div class='input-group mb-3'>
                                <span class='input-group-text' id='basic-addon1'><i class='fas fa-chart-line'></i></span>
                                <input type='text' autocomplete='off' class='form-control' name='nivel_funcionario' id='nivel_funcionario' placeholder='Meu nome' value='" . ucwords($dado->nivel_funcionario) . "' readonly> 
                            </div>
                        </div>
                        <div class='col-6'>
                            <button id='alterarDados' type='button' title='Editar' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modalEditarPerfil' 
                                data-bs-id='" . $dado->id_funcionario . "' data-bs-nome='" . $dado->nome_funcionario . "' data-bs-rg='" . $dado->rg_funcionario . "'
                                data-bs-cpf='" . $dado->cpf_funcionario . "' data-bs-telefone='" . $dado->telefone_funcionario . "' data-bs-login='" . $dado->login_funcionario . "'
                                data-bs-senha='" . $dado->senha_funcionario . "' data-bs-endereco='" . $dado->endereco_funcionario . "' data-bs-nivel='" . $dado->nivel_funcionario . "'>
                                Editar Dados
                            </button>
                        </div>";
            }
        }
        ?>
    </div>

    <!-- Modal Edição -->
    <div class="modal fade" id="modalEditarPerfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalEditarLabel">Editar Dados</h3>
                    <button onclick="apagaForm()" id="fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formEditarPerfil" action="editaPerfil.php" method="post">
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
                            <input type="text" autocomplete="off" class="form-control" name="senha_funcionario" id="senha_funcionario" placeholder="Senha do Funcionário" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-location-arrow"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="endereco_funcionario" id="endereco_funcionario" placeholder="Endereço do Funcionário" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-chart-line"></i></span>
                            <input type="text" autocomplete="off" class="form-control" name="nivel_funcionario" id="nivel_funcionario" placeholder="Nível do Funcionário" readonly>
                        </div>
                        <div class="modal-footer">
                            <button onclick="apagaForm()" id="cancelar" type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button id="salvarDados" type="submit" name="acao" value="Editar" class="btn btn-outline-success">Salvar Alterações</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <?php include_once '../menu/footer.php'; ?>
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
    </script>
</body>

</html>