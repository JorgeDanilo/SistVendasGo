<html>
    <head>
        <title>**SisVendasGo</title>
        <meta charset="utf-8">    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./libs/css/bootstrap.min.css" >
        <link rel="stylesheet" href="./libs/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" href="./libs/css/estilo.css" >
        <script src="libs/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="libs/js/angular.js" type="text/javascript"></script>
        <script src="libs/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- Imports dos controladores do angular js -->
        <script src="libs/js/app/app.js"></script>            
        <script src="libs/js/controllers/montadoraCtrl.js"></script>
        <script src="libs/js/controllers/representanteCtrl.js"></script>       
        <script src="libs/js/controllers/comprasRepresentanteCtrl.js"></script> 
    </head>

    <body>        
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <img alt="Brand" src="libs/img/icone.png" height="70dp" style="margin-top: -25px;">
                    </a>                    
                </div>
                <a href="montadora.php" class="btn btn-primary navbar-btn btn-cadastrar-carros">
                    Cadastrar Carros
                </a>
                
                <a href="representante.php" class="btn btn-primary navbar-btn btn-cadastrar-carros">
                    Cadastrar Representantes
                </a>
                
                <a href="comprasRepresentantes.php" class="btn btn-primary navbar-btn btn-cadastrar-carros">
                    Compras Representantes
                </a>

            </div>
        </nav>                

        <div class="container">