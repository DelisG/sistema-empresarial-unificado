<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lista de Funcionarios</title>
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-3 col-md-4 bg-dark">    
                <a href="index.php"><h5 class="text-light text-center py-4">Sistema Empresarial Unificado</h5></a>
                <div class="d-flex flex-column my-3">
                    <a href="index.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-house-chimney mr-2"></i>Inicio</a>
                    <a href="funcionarios.php" class="mb-3 btn btn-secondary text-left"><i class="fa-solid fa-user-group mr-2"></i>Listar Funcionários</button></a>
                    <a href="create-funcionario.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-user-plus mr-2"></i>Adicionar Funcionário</button></a>
                    <a href="cargos.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file mr-2"></i>Listar Cargos</button></a>
                    <a href="create-cargo.php" class="mb-3 btn btn-dark text-left"><i class="fa-solid fa-file-circle-plus mr-2"></i>Adicionar Cargo</button></a>                
                </div>               
            </div>
            <div class="col-md">
                <div class="d-flex flex-row justify-content-between align-items-center mt-4">
                    <h5>Lista de Funcionários</h5>  
                    <a class="btn btn-dark btn-sm mr-3" href="create-funcionario.php"><i class="fa-solid fa-user-plus"></i></a>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Matricula</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Função</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT funcionario.*, funcao.descricao AS nome_funcao
                                FROM funcionario 
                                JOIN funcao ON funcionario.id_funcao = funcao.id
                                WHERE funcionario.id_funcao = funcao.id ORDER BY id DESC;';

                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
                            echo '<td>'. $row['id'] .'</td>';
                            echo '<td>'. $row['nome'] .' ' . $row['sobrenome'] .'</td>';
                            echo '<td>'. $row['nome_funcao'] . '</td>';
                            echo '<td width=120>';
                            echo '<a class="btn btn-outline-dark px-2 btn-sm" href="read-funcionario.php?id='.$row['id'].'"><i class="fa-solid fa-info"></i></a>';
                            echo ' ';
                            echo '<a class="btn btn-outline-dark px-1 btn-sm" href="update-funcionario.php?id='.$row['id'].'"><i class="fa-solid fa-pencil"></i></a>';
                            echo ' ';
                            echo '<a class="btn btn-outline-dark p-1 btn-sm" href="delete-funcionario.php?id='.$row['id'].'"><i class="fa-solid fa-trash"></i></a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

</body>

</html>
