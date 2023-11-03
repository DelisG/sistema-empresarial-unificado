<?php
require 'banco.php';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeErro = null;
    $sobrenomeErro = null;
    $data_nascErro = null;
    $telefoneErro = null;
    $emailErro = null;
    $enderecoErro = null;
    $cpfErro = null;
    $id_funcaoErro = null;

    if (!empty($_POST)) {
        $validacao = True;
        $novoUsuario = False;
        if (!empty($_POST['nome'])) {
            $nome = $_POST['nome'];
        } else {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = False;
        }


        if (!empty($_POST['sobrenome'])) {
            $sobrenome = $_POST['sobrenome'];
        } else {
            $sobrenomeErro = 'Por favor digite o seu sobrenome!';
            $validacao = False;
        }


        if (!empty($_POST['data_nasc'])) {
            $data_nasc = $_POST['data_nasc'];
        } else {
            $data_nascErro = 'Por favor digite sua data de nascimento!';
            $validacao = False;
        }


        if (!empty($_POST['telefone'])) {
            $telefone = $_POST['telefone'];
            if (!filter_var($_POST['telefone'])) {
                $telefoneErro = 'Por favor digite o telefone!';
                $validacao = False;
            }
        }


        if (!empty($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $emailErro = 'Por favor digite o E-mail!';
            $validacao = False;
        }

        if (!empty($_POST['endereco'])) {
            $endereco = $_POST['endereco'];
        } else {
            $enderecoErro = 'Por favor digite o Endereço!';
            $validacao = False;
        }

        if (!empty($_POST['cpf'])) {
            $cpf = $_POST['cpf'];
        } else {
            $cpfErro = 'Por favor digite o CPF!';
            $validacao = False;
        }

        if (!empty($_POST['id_funcao'])) {
            $id_funcao = $_POST['id_funcao'];
        } else {
            $id_funcaoErro = 'Por favor selecione um campo!';
            $validacao = False;
        }

        
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO funcionario (nome, sobrenome, data_nasc, telefone, email, endereco, cpf, id_funcao) VALUES(?,?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nome, $sobrenome, $data_nasc, $telefone, $email, $endereco, $cpf, $id_funcao));
        Banco::desconectar();
        header("Location: funcionarios.php");
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Adicionar Funcionarios</title>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-2 bg-dark">    
                <a href="index.php"><h5 class="text-light text-center py-4">Sistema Empresarial Unificado</h5></a>
                <div class="d-flex flex-column my-3">
                    <a href="index.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-house-chimney mr-2"></i>Inicio</a>
                    <a href="funcionarios.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-user-group mr-2"></i>Listar Funcionários</button></a>
                    <a href="create-funcionario.php" class="mb-3 btn btn-secondary text-left"><i class="fa-solid fa-user-plus mr-2"></i>Adicionar Funcionário</button></a>
                    <a href="cargos.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file mr-2"></i>Listar Cargos</button></a>
                    <a href="create-cargo.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file-circle-plus mr-2"></i>Adicionar Cargo</button></a>                
                </div>                 
            </div>
            <div class="col-md mt-4">
                <h5>Adicionar Funcionários</h5>
            <div class="card-body">
                <form class="form-horizontal" action="create-funcionario.php" method="post">


                    <div class="row">                    
                        <div class="col-sm-6 control-group  <?php echo !empty($nomeErro) ? 'error ' : ''; ?>">
                            <label>Nome</label>
                            <div class="controls">
                                <input size="50" class="form-control" name="nome" type="text" placeholder="Nome"
                                    value="<?php echo !empty($nome) ? $nome : ''; ?>">
                                <?php if (!empty($nomeErro)): ?>
                                    <span class="text-danger"><?php echo $nomeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-6 control-group <?php echo !empty($sobrenomeErro) ? 'error ' : ''; ?>">
                            <label>Sobrenome</label>
                            <div class="controls">
                                <input size="80" class="form-control" name="sobrenome" type="text" placeholder="Sobrenome"
                                    value="<?php echo !empty($sobrenome) ? $sobrenome : ''; ?>">
                                <?php if (!empty($sobrenomeErro)): ?>
                                    <span class="text-danger"><?php echo $sobrenomeErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-4 control-group <?php echo !empty($cpfErro) ? 'error ' : ''; ?>">
                            <label>CPF</label>
                            <div class="controls">
                                <input size="80" class="form-control" name="cpf" type="text" placeholder="cpf"
                                    value="<?php echo !empty($cpf) ? $cpf : ''; ?>">
                                <?php if (!empty($cpfErro)): ?>
                                    <span class="text-danger"><?php echo $cpfErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    
                        <div class="col-sm-4 control-group <?php echo !empty($data_nascErro) ? 'error ' : ''; ?>">
                            <label>Data de Nascimento</label>
                            <div class="controls">
                                <input size="35" class="form-control" name="data_nasc" type="date" placeholder="DD/MM/AAAA"
                                    value="<?php echo !empty($data_nasc) ? $data_nasc : ''; ?>">
                                <?php if (!empty($data_nascErro)): ?>
                                    <span class="text-danger"><?php echo $data_nascErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-4 control-group <?php !empty($telefoneErro) ? '$telefoneErro ' : ''; ?>">
                            <label>Telefone</label>
                            <div class="controls">
                                <input size="40" class="form-control" name="telefone" type="number" placeholder="Telefone"
                                    value="<?php echo !empty($telefone) ? $telefone : ''; ?>">
                                <?php if (!empty($telefoneErro)): ?>
                                    <span class="text-danger"><?php echo $telefoneErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 control-group <?php echo !empty($emailErro) ? 'error ' : ''; ?>">
                            <label>Email</label>
                            <div class="controls">
                                <input size="80" class="form-control" name="email" type="text" placeholder="email"
                                    value="<?php echo !empty($email) ? $email : ''; ?>">
                                <?php if (!empty($emailErro)): ?>
                                    <span class="text-danger"><?php echo $emailErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 control-group <?php echo !empty($enderecoErro) ? 'error ' : ''; ?>">
                            <label>Endereco</label>
                            <div class="controls">
                                <input size="80" class="form-control" name="endereco" type="text" placeholder="endereco"
                                    value="<?php echo !empty($endereco) ? $endereco : ''; ?>">
                                <?php if (!empty($enderecoErro)): ?>
                                    <span class="text-danger"><?php echo $enderecoErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>                        
                    </div>                        


                    <div class="control-group mt-1 <?php !empty($emailErro) ? 'echo($emailErro)' : ''; ?>">
                        <label>Função</label>
                        <div class="d-flex row px-3">
                            <div class="form-check col">
                                <p class="form-check-label">
                                    <input class="form-check-input" type="radio" name="id_funcao" id="id_funcao"
                                           value="1" <?php isset($_POST["id_funcao"]) && $_POST["id_funcao"] == "1" ? "checked" : null; ?>/>
                                    Analista</p>
                            </div>
                            <div class="form-check col">
                                <p class="form-check-label">
                                    <input class="form-check-input" id="id_funcao" name="id_funcao" type="radio"
                                           value="3" <?php isset($_POST["id_funcao"]) && $_POST["id_funcao"] == "3" ? "checked" : null; ?>/>
                                    Atendente</p>
                            </div>
                            <div class="form-check col">
                                <p class="form-check-label">
                                    <input class="form-check-input" id="id_funcao" name="id_funcao" type="radio"
                                           value="4" <?php isset($_POST["id_funcao"]) && $_POST["id_funcao"] == "4" ? "checked" : null; ?>/>
                                    Supervisão</p>
                            </div>
                            <div class="form-check col">
                                <p class="form-check-label">
                                    <input class="form-check-input" id="id_funcao" name="id_funcao" type="radio"
                                           value="5" <?php isset($_POST["id_funcao"]) && $_POST["id_funcao"] == "5" ? "checked" : null; ?>/>
                                    Recepção</p>
                            </div>
                            <div class="form-check col">
                                <p class="form-check-label">
                                    <input class="form-check-input" id="id_funcao" name="id_funcao" type="radio"
                                           value="2" <?php isset($_POST["id_funcao"]) && $_POST["id_funcao"] == "2" ? "checked" : null; ?>/>
                                    Gerente</p>
                            </div>
                            <div class="form-check col">
                                <p class="form-check-label">
                                    <input class="form-check-input" id="id_funcao" name="id_funcao" type="radio"
                                           value="6" <?php isset($_POST["id_funcao"]) && $_POST["id_funcao"] == "6" ? "checked" : null; ?>/>
                                    Designer</p>
                            </div>
                            
                            <?php if (!empty($id_funcaoErro)): ?>
                                <span class="help-inline text-danger"><?php echo $id_funcaoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-dark">Adicionar</button>
                        <a href="funcionarios.php" type="btn" class="btn btn-outline-dark">Voltar</a>
                    </div>
                </form>
            </div>
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

