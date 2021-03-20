<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
<!-- <link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/meuestilo.css" rel="stylesheet"> -->
</head>
<body class="fundo">
<main class="container">
    <h1 class="breadcrumb fundoCard text-center fonteVerde">Painel Administrativo GullChat</h1>
    <div class="container">
        <!-- CATEGORIAS -->
        <div class="col-xs-12 col-sm-6 col-md-4">
            <h3 class="alert text-center fundoCard fonteVerde">CATEGORIAS</h3>
            <div class="thumbnail fundoCard">
                <img src="../svg/category.svg" alt="">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <a href="categorias_insere.php">                
                            <button class="btn btn-primary btn-lg btn-block"> 
                                <span class="glyphicon glyphicon-plus"></span>
                                <span class="hidden-xs">Adicionar</span> 
                            </button>
                        </a>
                    </div>
                    <div class="btn-group">
                            <a href="categorias_lista.php">
                                <button class="btn btn-success btn-lg btn-block"> 
                                    <span class="glyphicon glyphicon-tasks"></span>
                                    <span class="hidden-xs">Listar</span> 
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- VIAGENS -->
        <div class="col-xs-12 col-sm-6 col-md-4">
            <h3 class="alert text-center fundoCard fonteVerde">VIAGENS</h3>
            <div class="thumbnail fundoCard">
                <img src="../svg/travel.svg" alt="">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <a href="viagens_insere.php">                
                            <button class="btn btn-primary btn-lg btn-block"> 
                                <span class="glyphicon glyphicon-plus"></span>
                                <span class="hidden-xs">Adicionar</span>  
                            </button>
                        </a>
                    </div>
                    <div class="btn-group">
                            <a href="viagens_lista.php">
                                <button class="btn btn-success btn-lg btn-block"> 
                                    <span class="glyphicon glyphicon-tasks"></span>
                                    <span class="hidden-xs">Listar</span> 
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- USUÁRIOS -->
        <div class="col-xs-12 col-sm-6 col-md-4">
            <h3 class="alert text-center fundoCard fonteVerde">USUÁRIOS</h3>
            <div class="thumbnail fundoCard">
                <img src="../svg/group.svg" alt="">
                <div class="btn-group btn-group-justified">
                    <div class="btn-group">
                        <a href="usuarios_insere.php">                
                            <button class="btn btn-primary btn-lg btn-block"> 
                                <span class="glyphicon glyphicon-plus"></span>
                                <span class="hidden-xs">Adicionar</span>  
                            </button>
                        </a>
                    </div>
                    <div class="btn-group">
                            <a href="usuarios_lista.php">
                                <button class="btn btn-success btn-lg btn-block"> 
                                    <span class="glyphicon glyphicon-tasks"></span>
                                    <span class="hidden-xs">Listar</span> 
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!--  Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script> -->
</body>