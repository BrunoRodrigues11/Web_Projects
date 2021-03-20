<?php
    session_start();
    include("../Connections/conn_gamestore.php");
    mysqli_select_db($conn_gamestore,$database_conn);
    $consulta = "SELECT * FROM tbusuarios ORDER BY login_usuario ASC";
    $lista = $conn_gamestore->query($consulta);
    $row = $lista->fetch_assoc();
    $totalRows = ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameStore - Games</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/ldbtn.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../svg/favicon.ico" />
</head>

<body class="fundo">
<?php include('menu.php')?>
<br>
    <!-- Painel Administrativo -->
    <div class="container-fluid">
        <div class="container fundo2">
            <h1 class="text-center fundo4 bold espacamentoTopo">Painel Administrativo Gamestore </h1>
            <div class="col-md-4">
                <!-- PRODUTOS -->
                <div class="row">
                    <h3 class="alert alert-info text-center">Produtos</h3>
                    <div class="btn-group col-md-6 col-xs-6">
                        <a href="insere_produtos.php">                
                            <button class="btn btn-info btn-lg btn-block"> 
                                <span class="glyphicon glyphicon-plus"></span>
                                Adicionar 
                            </button>
                        </a>
                    </div>
                    <div class="btn-group col-md-6 col-xs-6">
                        <a href="lista_produtos.php">
                            <button class="btn btn-success btn-lg btn-block"> 
                                <span class="glyphicon glyphicon-tasks"></span>
                                Listar
                        </button>
                        </a>
                    </div>
                </div>
            </div>
            <!-- USUÁRIOS -->
            <div class="col-md-4">
                <h3 class="alert alert-success text-center">Usuários</h3>
                <div class="btn-group">
                    <a href="insere_usuario.php">
                        <button class="btn btn-info btn-lg btn-block"> 
                            <span class="glyphicon glyphicon-plus"></span>
                            Adicionar
                        </button>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="lista_usuarios.php">
                        <button class="btn btn-success btn-lg btn-block"> 
                            <span class="glyphicon glyphicon-tasks"></span>
                            Listar
                        </button>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="adm_usuarios.php">
                        <button class="btn btn-danger btn-lg btn-block"> 
                            <span class="glyphicon glyphicon-user"></span>
                            Adm
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Rodapé -->
    <div id="rodape-1" class="container-fluid navbar-fixed-bottom">
        <div id="rodapeInterno" class="container">
            <div class="col-md-4 col-xs-6 centralizado">
                <h4 class="text bold1">LOCALIZAÇÂO</h4>
                <p>Rua do Sol, 395 - Vila Barth</p>
                <p>Itapetininga - São Paulo</p>
            </div>
            <div class="col-md-4 col-xs-6">
                <h4 class="centralizado text bold1">REDES SOCIAIS</h4>
                <div class="centralizado">
                    <a href="#"><img src="../svg/Facebook.svg" alt="facebook" class="social"></a>
                    <a href="#"><img src="../svg/Youtube.svg" alt="Email" class="social"></a>
                    <a href="#"><img src="../svg/Twetter.svg" alt="Twitter" class="social"></a>
                    <a href="#"><img src="../svg/Instagram.svg" alt="Website" class="social"></a>
                    <a href="#"><img src="../svg/Linkedin.svg" alt="Linkedin" class="social"></a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 hidden-xs centralizado">
                <h4 class="text bold1">SAIBA MAIS</h4>
                <p>Blog</p>
            </div>
        </div>
    </div>

    <!-- Rodapé 2-->
    <div class="container-fluid footer corFonteBranca centralizado navbar-fixed-bottom">
        <div class="container">
            <h6>Copyright&copy; GamesStore 2020</h6>
        </div>
    </div>

    <!-- Modal Contato -->
    <div id="modal-contato" class="modal-container">
        <div class="modal-contato">
            <button class="fechar">X</button>
            <h3 class="centralizado bold">CONTATO</h3>
            <form action="">
                <div class="form-group">
                    <label class="corFonteBranca" for="Nome">Nome</label>
                    <input type="nome" name="nome" id="nome" class="form-control" placeholder="Digite seu nome">
                </div>
                <div class="form-group">
                    <label class="corFonteBranca" for="Email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email">
                </div>
                <label class="corFonteBranca" for="Mensagem">Mensagem</label>
                <div class="form-group">
                    <textarea name="mensagem" id="mensagem" cols="45" rows="5"
                        placeholder="Digite sua mensagem"></textarea>
                </div>
                <input type="submit" class="btn btn-enviar btn-block" value="Enviar">
            </form>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</script>
</body>

</html>