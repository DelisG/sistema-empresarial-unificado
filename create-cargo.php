

<?php
require 'banco.php';
//Acompanha os erros de validação

// Processar so quando tenha uma chamada post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = null;


    if (!empty($_POST)) {
        $validacao = True;
        $novofuncao = False;
        if (!empty($_POST['descricao'])) {
            $descricao = $_POST['descricao'];
        } else {
            $descricaoErro = 'Por favor digite o funcao!';
            $validacao = False;
        }
         if (!empty($_POST['salario'])) {
            $salario = $_POST['salario'];
        } else {
            $salarioErro = 'Por favor digite o Salario!';
            $validacao = False;
        }
         if (!empty($_POST['setor'])) {
            $setor = $_POST['setor'];
        } else {
            $setorErro = 'Por favor digite o Setor!';
            $validacao = False;
        }
        

        
    }

//Inserindo no Banco:
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO funcao (descricao, salario, setor) VALUES(?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($descricao, $salario, $setor));
        Banco::desconectar();
        header("Location: cargos.php");
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

    <title>Adicionar Cargo</title>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-3 col-md-4 bg-dark">    
                <a href="index.php"><h5 class="text-light text-center py-4">Sistema Empresarial Unificado</h5> </a>
                <div class="d-flex flex-column my-3">
                    <a href="index.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-house-chimney mr-2"></i>Inicio</a>
                    <a href="funcionarios.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-user-group mr-2"></i>Listar Funcionários</button></a>
                    <a href="create-funcionario.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-user-plus mr-2"></i>Adicionar Funcionário</button></a>
                    <a href="cargos.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file mr-2"></i>Listar Cargos</button></a>
                    <a href="create-cargo.php" class="mb-3 btn btn-secondary text-left"><i class="fa-solid fa-file-circle-plus mr-2"></i>Adicionar Cargo</button></a>                
                </div>               
            </div>
            <div class="col-md mt-4">
                <h5>Adicionar Cargo</h5>
            <div class="card-body">
                <form class="form-horizontal" action="create-cargo.php" method="post">

                    <div class="row">

                        <div class="col-sm-5 control-group  <?php echo !empty($descricaoErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Função</label>
                            <div class="controls">
                                <input size="50" class="form-control" name="descricao" type="text" placeholder="..."
                                       value="<?php echo !empty($descricao) ? $descricao : ''; ?>">
                                <?php if (!empty($descricaoErro)): ?>
                                    <span class="text-danger"><?php echo $descricaoErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
    
                        <div class="col-sm-4 control-group  <?php echo !empty($setorErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Setor</label>
                            <div class="controls">
                                <input size="50" class="form-control" name="setor" type="text" placeholder="..."
                                       value="<?php echo !empty($setor) ? $setor : ''; ?>">
                                <?php if (!empty($setorErro)): ?>
                                    <span class="text-danger"><?php echo $setorErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-3 control-group  <?php echo !empty($salarioErro) ? 'error ' : ''; ?>">
                            <label class="control-label">Salario</label>
                            <div class="controls">
                                <input size="50" class="form-control" name="salario" type="text" placeholder="..."
                                       value="<?php echo !empty($salario) ? $salario : ''; ?>">
                                <?php if (!empty($salarioErro)): ?>
                                    <span class="text-danger"><?php echo $salarioErro; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>    

                    </div>


                    <div class="form-actions">
                        <br/>
                        <button type="submit" class="btn btn-dark">Adicionar</button>
                        <a href="cargos.php" type="btn" class="btn btn-outline-dark">Voltar</a>
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

