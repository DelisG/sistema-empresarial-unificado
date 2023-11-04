<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Página Inicial</title>
</head>

<body>
    <main class="h-100">
        
        <div class="row h-100">
            <div class="col-md-8 p-0">
                <div class="bg-dark d-flex align-items-center justify-content-around flex-column h-100">
                    
                    <h1 class="text-light text-wrap text-center px-5">Sistema Empresarial Unificado</h1>
                    <img src="assets/img/img-funcionarios.png" alt="funcionarios colaborativos" class="img-fluid">
                    
                    <h5 class="text-light text-wrap px-5">Transforme a <strong class="text-warning">Gestão de Funcionários</strong>  e Experimente Como a Inovação Pode Transformar o seu Cotidiano!</h5>
                </div>                
    
            </div>


            
            <div class="col-md-4 bg-light d-flex align-items-center justify-content-center p-0">
                <div class="row">                    
                
                    <div class="col-md-6 my-4 text-center">
                        <a href="read-funcionario.php">
                            <p class="text-dark"><i class="fa-solid fa-list-ul fa-4x"></i></p>
                            <p class="text-dark">Listar Funcionários</p>
                        </a>
                    </div>  
                    
        
                    <div class="col-md-6 my-4 text-center">
                        <a href="create-funcionario.php">
                            <p class="text-dark"><i class="fa-solid fa-user-plus fa-4x"></i></p>
                            <p class="text-dark">Adicionar Funcionário</p>
                        </a>
                    </div>
        
                    <div class="col-md-6 my-4 text-center">
                        <a href="cargos.php">
                            <p class="text-dark"><i class="fa-solid fa-file-lines fa-4x"></i></p>
                            <p class="text-dark">Listar Cargos</p>
                        </a>
                    </div>
        
                    <div class="col-md-6 my-4 text-center">
                        <a href="create-cargo.php">
                            <p class="text-dark"><i class="fa-solid fa-file-circle-plus fa-4x"></i></p>
                            <p class="text-dark">Adicionar Cargo</p>
                        </a>
                    </div>
                </div>
            </div>   
            
            
        </div>       
           
    </main>   
</body>

</html>
