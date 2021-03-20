<?php
include("../Connections/conn_viagens.php");
if($_POST){
// USE DO BANCO DE DADOS
mysqli_select_db($conn_viagens,$database_conn);
// VÁRIAVEIS PARA ACRESCENTAR OS DADOS
$tabela_insert  ="tbcategorias";
$campos_insert  ="viagem_categoria, sigla_categoria";
// RECEBENDO OS DADOS DOS FORMULÁRIOS
// SEMPRE COLOQUE NA MESMA ORDEM DOS CAMPOS_INSERT
$viagem_categoria    =$_POST['viagem_categoria'];
$sigla_categoria     =$_POST['sigla_categoria'];

//PEGANDO OS VALORES QUE VÃO SER INSERIDOS
$valores_insert ="'$viagem_categoria','$sigla_categoria'";
//FAZENDO A INSERÇÃO DOS DADOS
$insertSQL  = "INSERT INTO ".$tabela_insert."                 
   (".$campos_insert.")
VALUES 
   (".$valores_insert.")";
$resultado  = $conn_viagens->query($insertSQL);
// DESTINO APÓS O CADASTRO CORRETO
$destino    = "categorias_lista.php";
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
    <title></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/meuestilo.css" rel="stylesheet">
    <link rel="shortcut icon" href="../svg/favicon.ico"/>
</head>
<body class="fundo fonteBranca">
<?php include ('menu_adm.php'); ?>
<main class="container">
    <br>
    <div class="col-xs-12 col-sm-8 col-sm-offset-3 col-md-6 col-md-offset-3 fundoCard">
        <div>
           <h2 class="breadcrumb fundoCard text-center fonteVerde"><!-- TÍTULO -->
            <a href="categorias_lista.php" class="" alt="voltar">
                <button class="btn btn-default borda btnBack" type="button">
                <span class="glyphicon glyphicon-chevron-left" style="color:#FFF;" aria-hidden="true"></span>
                </button>
            </a>
                Cadastrando Categorias
            </h2>
        </div>   
        <div class="thumbnail fundoCard">
        <form action="categorias_insere.php" name="form_categorias_insere" id="form_categorias_insere" method="post" enctype="multipart/form-data">
        <!-- VIAGEM_CATEGORIA -->
        <label for="viagem_categoria">Categoria:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                    </span>
                    <input class="form-control" type="text" name="viagem_categoria" id="viagem_categoria" placeholder="Digite a categoria" maxlength="15" required>
                </div>
                <br>
        <label for="sigla_categoria">Sigla</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    </span>
                    <input class="form-control" type="text" name="sigla_categoria" id="sigla_categoria" placeholder="Digite a sigla da categoria" maxlength="3" required>
                </div>
                <br>       
        <input class="btn btn-primary btn-block" role="button" type="submit" value="Cadastrar" name="enviar" id="enviar">
        </div>
</main>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>