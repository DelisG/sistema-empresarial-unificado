<?php
require 'banco.php';
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: funcionarios.php");
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT funcionario.*, funcao.setor, funcao.salario, funcao.descricao
            FROM funcionario
            JOIN funcao ON funcionario.id_funcao = funcao.id
            WHERE funcionario.id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Informações do Funcionario</title>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-3 col-md-4 bg-dark">    
                <a href="index.php"><h5 class="text-light text-center py-4">Sistema Empresarial Unificado</h5></a>
                <div class="d-flex flex-column my-3">
                    <a href="index.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-house-chimney mr-2"></i>Inicio</a>
                    <a href="funcionarios.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-user-group mr-2"></i>Listar Funcionários</button></a>
                    <a href="create-funcionario.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-user-plus mr-2"></i>Adicionar Funcionário</button></a>
                    <a href="cargos.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file mr-2"></i>Listar Cargos</button></a>
                    <a href="create-cargo.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file-circle-plus mr-2"></i>Adicionar Cargo</button></a>                
                </div>               
            </div>
            <div class="col-md">
                <div class="d-flex flex-row justify-content-between align-items-center mt-4 mr-2">
                    <h5>Informações do Funcionario</h5>  
                    <a href="update-funcionario.php?id=<?php echo $id; ?>" class="btn btn-outline-dark"><i class="fa-solid fa-pencil"></i></a>
                </div>
                <div class="p-2 my-3 row">

                    <div class="col-sm-6 control-group">
                        <label class="control-label">Nome</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['nome']; ?>
                            </label>
                        </div>
                    </div>             

                    <div class="col-sm-6 control-group">
                        <label class="control-label">Sobrenome</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['sobrenome']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-4 control-group">
                        <label class="control-label">CPF</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['cpf']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-4 control-group">
                        <label class="control-label">Data de Nascimento</label>
                        <div class="form-control">
                            <label class="carousel-inner">
                                <?php echo date('d/m/Y', strtotime($data['data_nasc'])); ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-4 control-group">
                        <label class="control-label">Telefone</label>
                        <div class="controls form-control">
                            <label class="carousel-inner">
                                <?php echo $data['telefone']; ?>
                            </label>
                        </div>
                    </div>
                
                    <div class="col-md-6 control-group">
                        <label class="control-label">E-mail</label>
                        <div class="form-control">
                            <label class="carousel-inner">
                                <?php echo $data['email']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6 control-group">
                        <label class="control-label">Endereço</label>
                        <div class="form-control">
                            <label class="carousel-inner">
                                <?php echo $data['endereco']; ?>
                            </label>
                        </div>
                    </div>                

                    <div class="col-sm-5 control-group">
                        <label class="control-label">Cargo</label>
                        <div class="form-control">
                            <label class="carousel-inner">
                                <?php echo $data['descricao']; ?>
                            </label>
                        </div>
                    </div>

                    <div class="col-sm-4 control-group">
                        <label class="control-label">Setor</label>
                        <div class="form-control">
                            <label class="carousel-inner">
                                <?php echo $data['setor']; ?>
                            </label>
                        </div>
                    </div>                  
                                        
                    <div class="col-sm-3 control-group">
                        <label class="control-label">Salario</label>
                        <div class="form-control">
                        <label class="carousel-inner">
                            <?php echo $data['salario']; ?>
                        </label>
                    </div>
                        
                </div>

                <div class="form-actions m-3">
                    <a href="funcionarios.php" type="btn" class="btn btn-dark">Voltar</a>
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
