<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Página Inicial</title>
</head>

<body>
    <main class="h-100">
        
        <div class="row h-100 m-0">
            <div class="col-lg-8 p-0 h-100 bg-dark">
                <div class="d-flex align-items-center justify-content-around flex-column h-100">
                    
                    <div class="d-flex justify-content-between flex-row">
                        <h1 class="text-light text-wrap m-2">Sistema Empresarial Unificado</h1>

                        <div class="dropdown ">
                            <a class="d-block d-lg-none btn btn-outline-light dropdown-toggle m-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-bars fa-lg"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="funcionarios.php">Listar Funcionários</a></li>
                                <li><a class="dropdown-item" href="create-funcionario.php">Adicionar Funcionário</a></li>
                                <li><a class="dropdown-item" href="cargos.php">Listar Cargos</a></li>
                                <li><a class="dropdown-item" href="create-cargo.php">Adicionar Cargo</a></li>
                            </ul>
                        </div>
                       
                        
                    </div>
                    <img src="assets/img/img-funcionarios.png" alt="funcionarios colaborativos" class="img-fluid">
                    
                    <h4 class="text-light text-wrap px-5 py-3">Transforme a <strong class="text-warning">Gestão de Funcionários</strong>  e Experimente Como a Inovação Pode Transformar o seu Cotidiano!</h4>
                </div>            
            </div>
            
            <div class="col-md  d-none d-lg-block  bg-light p-0">
                <div class="row m-0  d-flex align-items-center justify-content-center h-100">                    
                
                    <div class="col-sm-6 text-center">
                        <a href="read-funcionario.php">
                            <p class="text-dark"><i class="fa-solid fa-list-ul fa-4x"></i></p>
                            <p class="text-dark">Listar Funcionários</p>
                        </a>
                    </div>                     
                    
        
                    <div class=" col-sm-6 text-center">
                        <a href="create-funcionario.php">
                            <p class="text-dark"><i class="fa-solid fa-user-plus fa-4x"></i></p>
                            <p class="text-dark">Adicionar Funcionário</p>
                        </a>
                    </div>
        
                    <div class="col-sm-6 text-center">
                        <a href="cargos.php">
                            <p class="text-dark"><i class="fa-solid fa-file-lines fa-4x"></i></p>
                            <p class="text-dark">Listar Cargos</p>
                        </a>
                    </div>
        
                    <div class="col-sm-6 text-center">
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
