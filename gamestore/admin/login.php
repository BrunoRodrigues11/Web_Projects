<?php
// Incluir o arquivo de conexão
include("../Connections/conn_gamestore.php");

// inicia a verificação do login
if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_gamestore,$database_conn);

    // Verificar o login e senha recebidos
    $login_usuario  = $_POST['login_usuario'];
    $senha_usuario  = $_POST['senha_usuario'];

    $verificaSQL    = "SELECT *
                       FROM tbusuarios
                       WHERE login_usuario='$login_usuario'
                            AND senha_usuario='$senha_usuario'";

    // Carregar os dados e verificar as linhas
    $lista_session      = mysqli_query($conn_gamestore, $verificaSQL);
    $row_session        = $lista_session->fetch_assoc();
    $totalRows_session  = mysqli_num_rows($lista_session);

    // Se a sessã não existir, inicia uma
    if(!isset($_SESSION)) session_start();

    // CARREGAR INFORMAÇÕES EM UMA SESSÃO
    if($totalRows_session>0){
        $_SESSION['login_usuario']=$login_usuario;
        $_SESSION['nivel_usuario']=$row_session['nivel_usuario'];
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>window.open('invasor.php','_self')</script>";
    };
};
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/abf65111b3.js" crossorigin="anonymous"></script>    
    <link href="../css/main.css" rel="stylesheet">
</head>
<body class="fundo">
<?php include('menu.php')?>
<main class="container">
    <div>
        <article>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <h1 class="breadcrumb text-info text-center">Faça seu login</h1>
                    <div class="thumbnail">
                        <p class="text-info text-center" role="alert">
                            <i class="fas fa-users fa-10x"></i>
                        </p>
                        <br>
                        <div class="alert alert-info" role="alert">
                            <form action="login.php" name="form_login" id="form_login" method="post" enctype="multipart/form-data">
                                <label for="login_usuario">Login:</label>
                                <p class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-user text-info" aria-hidden="true">
                                        </span>
                                    </span>
                                    <input type="text" name="login_usuario" id="login_usuario" class="form-control" autofocus required placeholder="Digite seu login">
                                </p>
                                <label for="senha_usuario">Senha:</label>
                                <p class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock text-info" aria-hidden="true">
                                        </span>
                                    </span>
                                    <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" autofocus required placeholder="Digite sua senha">
                                </p>
                                <p class="text-right">
                                    <input type="submit" value="Entrar" class="btn btn-primary">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </div>
</main>


<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>

</body>
</html>