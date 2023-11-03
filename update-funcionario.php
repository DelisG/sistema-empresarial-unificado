<?php

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: funcionarios.php");
}

if (!empty($_POST)) {

    $nomeErro = null;
    $sobrenomeErro = null;
    $data_nascErro = null;
    $telefoneErro = null;
    $emailErro = null;
    $enderecoErro = null;
    $cpfErro = null;
    $id_funcaoErro = null;

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $data_nasc = $_POST['data_nasc'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];
    $id_funcao = $_POST['id_funcao'];

    //Validação
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o Nome!';
        $validacao = false;
    }

    if (empty($sobrenome)) {
        $sobrenomeErro = 'Por favor digite o Sobrenome!';
        $validacao = false;
    }

    if (empty($data_nasc)) {
        $data_nascErro = 'Por favor digite a data de Nascimento!';
        $validacao = false;
    }


    if (empty($telefone)) {
        $telefoneErro = 'Por favor digite o telefone!';
        $validacao = false;
    }

    if (empty($email)) {
        $emailErro = 'Por favor preencha com o email!';
        $validacao = false;
    }

     if (empty($endereco)) {
        $enderecoErro = 'Por favor preencha com o Endereco!';
        $validacao = false;
    }

     if (empty($cpf)) {
        $cpfErro = 'Por favor preencha com o CPF!';
        $validacao = false;
    }

     if (empty($id_funcao)) {
        $id_funcaoErro = 'Por favor selecione um Cargo!';
        $validacao = false;
    }

    

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE funcionario  set nome = ?, sobrenome = ?, telefone = ?, data_nasc = ?, email = ?, endereco = ?, cpf = ?, id_funcao = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $sobrenome, $telefone, $data_nasc, $email, $endereco, $cpf, $id_funcao, $id));
        Banco::desconectar();
        header("Location: funcionarios.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM funcionario where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $sobrenome = $data['sobrenome'];
    $telefone = $data['telefone'];
    $data_nasc = $data['data_nasc'];
    $email = $data['email'];
    $endereco = $data['endereco'];
    $cpf = $data['cpf'];
    $id_funcao = $data['id_funcao'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Atualizar Funcionario</title>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-2 bg-dark">    
                <a href="index.php"><h5 class="text-light text-center py-4">Sistema Empresarial Unificado</h5></a>
                <div class="d-flex flex-column my-3">
                    <a href="index.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-house-chimney mr-2"></i>Inicio</a>
                    <a href="funcionarios.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-user-group mr-2"></i>Listar Funcionários</button></a>
                    <a href="create-funcionario.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-user-plus mr-2"></i>Adicionar Funcionário</button></a>
                    <a href="cargos.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file mr-2"></i>Listar Cargos</button></a>
                    <a href="create-cargo.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file-circle-plus mr-2"></i>Adicionar Cargo</button></a>                
                </div>                 
            </div>
            <div class="col-md mt-4">
                <h5>Atualizar Funcionário</h5> 
                <div class="card-body">
                    <form class="row" action="update-funcionario.php?id=<?php echo $id ?>" method="post">

                        <div class="col-sm-6 control-group <?php echo !empty($nomeErro) ? 'error' : ''; ?>">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input name="nome" class="form-control" size="50" type="text" placeholder="Nome"
                                    value="<?php echo !empty($nome) ? $nome : ''; ?>">
                                <?php if (!empty($nomeErro)): ?>
                                    <span class="text-danger"><?php echo $nomeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-6 control-group <?php echo !empty($nomeErro) ? 'error' : ''; ?>">
                            <label class="control-label">Sobrenome</label>
                            <div class="controls">
                                <input name="sobrenome" class="form-control" size="50" type="text" placeholder="sobreNome"
                                    value="<?php echo !empty($sobrenome) ? $sobrenome : ''; ?>">
                                <?php if (!empty($sobrenomeErro)): ?>
                                    <span class="text-danger"><?php echo $sobrenomeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-4 control-group <?php echo !empty($cpfErro) ? 'error' : ''; ?>">
                            <label class="control-label">CPF</label>
                            <div class="controls">
                                <input name="cpf" class="form-control" size="30" type="text" placeholder="cpf"
                                    value="<?php echo !empty($cpf) ? $cpf : ''; ?>">
                                <?php if (!empty($cpfErro)): ?>
                                    <span class="text-danger"><?php echo $cpfErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-4 control-group <?php echo !empty($data_nascErro) ? 'error' : ''; ?>">
                            <label class="control-label">Data de Nascimento</label>
                            <div class="controls">
                                <input name="data_nasc" class="form-control" size="40" type="text" placeholder="data_nasc"
                                    value="<?php echo !empty($data_nasc) ? date('d/m/Y', strtotime($data['data_nasc'])) : ''; ?>">
                                <?php if (!empty($data_nascErro)): ?>
                                    <span class="text-danger"><?php echo $data_nascErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-4 control-group <?php echo !empty($telefoneErro) ? 'error' : ''; ?>">
                            <label class="control-label">Telefone</label>
                            <div class="controls">
                                <input name="telefone" class="form-control" size="30" type="text" placeholder="telefone"
                                    value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
                                <?php if (!empty($telefoneErro)): ?>
                                    <span class="text-danger"><?php echo $telefoneErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 control-group <?php echo !empty($emailErro) ? 'error' : ''; ?>">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input name="email" class="form-control" size="30" type="text" placeholder="email"
                                    value="<?php echo !empty($email) ? $email : ''; ?>">
                                <?php if (!empty($emailErro)): ?>
                                    <span class="text-danger"><?php echo $emailErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 control-group <?php echo !empty($enderecoErro) ? 'error' : ''; ?>">
                            <label class="control-label">Endereco</label>
                            <div class="controls">
                                <input name="endereco" class="form-control" size="30" type="text" placeholder="endereco"
                                    value="<?php echo !empty($endereco) ? $endereco : ''; ?>">
                                <?php if (!empty($enderecoErro)): ?>
                                    <span class="text-danger"><?php echo $enderecoErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-12 control-group <?php echo !empty($id_funcaoErro) ? 'error' : ''; ?>">
                            <label class="control-label">Função</label>
                            <div class="row px-3">
                                <div class="form-check col">
                                    <p class="form-check-label">
                                        <input class="form-check-input" type="radio" name="id_funcao" id="id_funcao"
                                            value="1" <?php echo ($id_funcao == "1") ? "checked" : null; ?>/> Analista
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="id_funcao" id="id_funcao"
                                        value="2" <?php echo ($id_funcao == "2") ? "checked" : null; ?>/> Gerente
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="id_funcao" id="id_funcao"
                                        value="3" <?php echo ($id_funcao == "3") ? "checked" : null; ?>/> Programador
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="id_funcao" id="id_funcao"
                                        value="4" <?php echo ($id_funcao == "4") ? "checked" : null; ?>/> Supervisão
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="id_funcao" id="id_funcao"
                                        value="5" <?php echo ($id_funcao == "5") ? "checked" : null; ?>/> Recepcionista
                                </div>
                                <div class="form-check col">
                                    <input class="form-check-input" type="radio" name="id_funcao" id="id_funcao"
                                        value="6" <?php echo ($id_funcao == "6") ? "checked" : null; ?>/> Designer
                                </div>
                                </p>
                                <?php if (!empty($tid_funcaoErro)): ?>
                                    <span class="text-danger"><?php echo $tid_funcaoErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <br/>
                        <div class="form-actions mt-2">
                            <button type="submit" class="btn btn-dark">Atualizar</button>
                            <a href="funcionarios.php" type="btn" class="btn btn-outline-dark">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>

</body>

</html>
