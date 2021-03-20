<?php
include("../Connections/conn_viagens.php");

$tabela= "tbcategorias";
$campo_filtro= "id_categoria";

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_viagens,$database_conn);

    // Receber os dados do formulário
    $viagem_categoria= $_POST['viagem_categoria'];
    $sigla_categoria= $_POST['sigla_categoria'];
    // Campo para filtrar o registro WHERE
    $filtro_update= $_POST['id_categoria'];

    // Consulta SQL para inserção dos dados
    $updateSQL  = "UPDATE ".$tabela."
                    SET viagem_categoria = '".$viagem_categoria."', sigla_categoria = '".$sigla_categoria."'
                    WHERE ".$campo_filtro."='".$filtro_update."'";
    $resultado  = $conn_viagens->query($updateSQL);
    // Após a ação a página será redirecionada
    $destino= "categorias_lista.php";
    if(mysqli_insert_id($conn_viagens)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
}
mysqli_select_db($conn_viagens,$database_conn);
$filtro_select  =$_GET['id_categoria'];
$consulta       = "SELECT * FROM ".$tabela." WHERE ".$campo_filtro."=".$filtro_select."";
$lista = $conn_viagens->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;
?>
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
                Atualizando Categorias
            </h2>
        </div>   

        <div class="thumbnail fundoCard">
        <form action="categorias_atualiza.php" name="form_categorias_atualiza" id="form_categorias_atualiza" method="post" enctype="multipart/form-data">
        <!--Inserir o campo id_categoria oculto para uso em filtro -->
            <input type="hidden"id="id_categoria"name="id_categoria"value="<?php echo $row['id_categoria']; ?>">
        <!-- VIAGEM_CATEGORIA -->
        <label for="viagem_categoria">Categoria:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
                    </span>
                    <input class="form-control" type="text" name="viagem_categoria" id="viagem_categoria" placeholder="Digite a categoria" maxlength="15" required value="<?php echo $row['viagem_categoria'];?>">
                </div>
                <br>
        <label for="sigla_categoria">Sigla</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
                    </span>
                    <input class="form-control" type="text" name="sigla_categoria" id="sigla_categoria" placeholder="Digite a sigla da categoria" maxlength="3" required value="<?php echo $row['sigla_categoria'];?>">
                </div>
                <br>       
        <input class="btn btn-primary btn-block" role="button" type="submit" value="Cadastrar" name="enviar" id="enviar">
    </div>
</main>
<!--  Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script> -->
</body>
<?php mysqli_free_result($lista); ?>