<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_viagens.php");
if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_viagens, $database_conn);
    // Variaveis para salvar os dados no banco
    $tabela_insert = "tbusuarios";
    $campos_insert = "login_usuario, senha_usuario, nivel_usuario";
    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
    $nivel_usuario = $_POST['nivel_usuario'];
    // Reunir os valores a serem inseridos
    $valores_insert = "'$login_usuario','$senha_usuario','$nivel_usuario'";
    // Consulta SQL para inserção dos dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert."                 
                        (".$campos_insert.")
                    VALUES 
                        (".$valores_insert.")";
    $resultado  = $conn_viagens->query($insertSQL);
    // Após a ação a página será redirecionada
    $destino   = "usuarios_lista.php";
    if(mysqli_insert_id($conn_viagens)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };   
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Produtos - Insere</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../svg/favicon.ico"/>

<!-- Meu css -->
<link href="../css/meuestilo.css" rel="stylesheet">
</head>
<body class="fundo fonteBranca">
<?php include ('menu_adm.php'); ?>
<main class="container">
    <br>
    <div class="col-xs-12 col-sm-8 col-sm-offset-3 col-md-6 col-md-offset-3 fundoCard">
        <div>
           <h2 class="breadcrumb fundoCard text-center fonteVerde"><!-- TÍTULO -->
            <a href="usuarios_lista.php" class="" alt="voltar">
                <button class="btn btn-default borda btnBack" type="button">
                <span class="glyphicon glyphicon-chevron-left" style="color:#FFF;" aria-hidden="true"></span>
                </button>
            </a>
                Cadastrando Usuários
            </h2>
        </div>  
        <div class="thumbnail fundoCard">
        <form action="usuarios_insere.php" nome="form_insere_usuario" id="form_insere_usuario" method="POST" enctype="multipart/form-data">
            <!-- input login_usuario -->
            <label for="login_usuario">Login</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </span>
                <input type="text" name="login_usuario" id="login_usuario" autofocus maxlength="30" placeholder="Digite o login do usuário" class="form-control" required>
            </div>
            <br>
            <!-- input senha_usuario -->
            <label for="senha_usuario">Senha</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                </span>
                <input type="password" name="senha_usuario" id="senha_usuario" maxlength="8" placeholder="Digite a senha do usuário" class="form-control" required>
            </div>
            <br>
            <!-- nivel usuario -->
            <label for="nivel_usuario">Nível</label>
                <div class="input-group">
                    <label class="radio-inline" for="nivel_usuario_sup">
                        <input type="radio" name="nivel_usuario" id="nivel_usuario" value="Sup">Sup
                    </label>
                    <label class="radio-inline" for="nivel_usuario_com">
                        <input type="radio" name="nivel_usuario" id="nivel_usuario" value="Com" checked>Com
                    </label>
                </div>
                <br>
                <!-- btn enviar -->
                <input type="submit" value="Cadastrar" role="button" name="enviar" id="enviar" class="btn btn-block btn-primary">
        </form>
</main>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>