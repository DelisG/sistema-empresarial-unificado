<?php

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: cargos.php");
}

if (!empty($_POST)) {

    $descricaoErro = null;
    $salarioErro = null;
    $setorErro = null;
   
    $descricao = $_POST['descricao'];
    $salario = $_POST['salario'];
    $setor = $_POST['setor'];
   
    //Validação
    $validacao = true;
    if (empty($descricao)) {
        $descricaoErro = 'Por favor digite o Cargo!';
        $validacao = false;
    }
     if (empty($salario)) {
        $salarioErro = 'Por favor digite o Salario!';
        $validacao = false;
    }
     if (empty($setor)) {
        $setorErro = 'Por favor digite o Setor!';
        $validacao = false;
    }

    
    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE funcao  set descricao = ?, salario = ?, setor = ?  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($descricao, $salario, $setor, $id));
        Banco::desconectar();
        header("Location: cargos.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM funcao where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $descricao = $data['descricao'];
    $salario = $data['salario'];
    $setor = $data['setor'];
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
    
    <title>Atualizar Cargo</title>
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
            <div class="col-sm my-4">
                <h5>Atualizar Cargo</h5> 
                <div class="card-body">
                    <form class="form-horizontal" action="update-cargo.php?id=<?php echo $id ?>" method="post">
                    
                    <div class="row">

                        <div class="col-sm-5 control-group <?php echo !empty($descricaoErro) ? 'error' : ''; ?>">
                            <label class="control-label">Descricao</label>
                            <div class="controls">
                                <input name="descricao" class="form-control" size="50" type="text" placeholder="descricao"
                                    value="<?php echo !empty($descricao) ? $descricao : ''; ?>">
                                <?php if (!empty($descricaoErro)): ?>
                                    <span class="text-danger"><?php echo $descricaoErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>    

                        <div class="col-sm-4 control-group <?php echo !empty($setorErro) ? 'error' : ''; ?>">
                            <label class="control-label">Setor</label>
                            <div class="controls">
                                <input name="setor" class="form-control" size="50" type="text" placeholder="setor"
                                    value="<?php echo !empty($setor) ? $setor : ''; ?>">
                                <?php if (!empty($setorErro)): ?>
                                    <span class="text-danger"><?php echo $setorErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>  
                        
                        <div class="col-sm-3 control-group <?php echo !empty($salarioErro) ? 'error' : ''; ?>">
                            <label class="control-label">Salario</label>
                            <div class="controls">
                                <input name="salario" class="form-control" size="50" type="text" placeholder="salario"
                                    value="<?php echo !empty($salario) ? $salario : ''; ?>">
                                <?php if (!empty($salarioErro)): ?>
                                    <span class="text-danger"><?php echo $salarioErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>   

                    </div>
                    <div class="form-actions mt-3">
                        <button type="submit" class="btn btn-dark">Atualizar</button>
                        <a href="cargos.php" type="btn" class="btn btn-outline-dark">Voltar</a>
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
