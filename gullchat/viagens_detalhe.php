<?php 
// CONEXÃO
include("Connections/conn_viagens.php");

// CONSULTA PARA OS DADOS
$tabela   ="vw_tbviagens";
$campo_filtro     ="id_viagem";
$filtro_select    =$_GET['id_viagem'];
$ordenar_por   ="local_viagem ASC";
$consulta      ="SELECT * FROM ".$tabela." WHERE ".$campo_filtro."='".$filtro_select."' ORDER BY ".$ordenar_por."";
$lista         =$conn_viagens->query($consulta);
$row           =$lista->fetch_assoc();
$totalRows     =($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
<title>GullChat - Viagem <?php echo $row['local_viagem'];?></title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="shortcut icon" href="svg/favicon.ico"/>
</head>
<body class="imgFundo">
    <?php include('menu_publico.php'); ?>
    <?php include('modal_contato.php'); ?>
    <?php include('modal_comprar.php'); ?>
    <div class="container">
        <h2 class="breadcrumb fundo text-left fonteVerde"><!-- TÍTULO -->
            <a href="javascript:window.history.go(-1)" class="" alt="voltar">
                <button class="btn btn-default borda btnBack" type="button">
                <span class="glyphicon glyphicon-chevron-left" style="color:#fff;" aria-hidden="true"></span>
                </button>
            </a>
            <strong><?php echo $row['local_viagem'];?></strong>
        </h2>
        <!-- INICIO DA ESTRUTURA DE REPETIÇÃO -->
        <?php do {?>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1"><!-- INICIO DA ESTRUTURA -->
            <div class="thumbnail fundoTransparente">
                <img src="imagens/<?php echo $row['imagem_viagem']?>" alt="" class="img-responsive img-rounded">
                <div class="caption">
                    <p><?php echo $row['resumo_viagem']?></p>
                    <br>
                    <h2><?php echo $row['cruzeiro_viagem'];?></h2>
                    <p><?php echo "<a href='".$row['video_yt']."' target='_blank'>" ?></p>
                        <p><img src="imagens/<?php echo $row['imagem_cruzeiro']?>" alt="" class="img-responsive col-md-7 zoom" width="100%"></p>
                        </a>
                    <p><?php echo $row['cruzeiro_descri'];?></p>
                </div>
                <h3 class="text-center rotuloViagem">Dados da Viagem</h3>
                <div class="row viagem">
                    <div class="col-md-6" style="padding-right: 2px;">
                        <h3 class="text-center rotuloData">Datas</h3> 
                        <fieldset class="data">
                            <h4 class="text-center"><strong>Data de Embarque:
                            </strong><?php echo date('d/m/Y',strtotime($row['data_embarque']));?></h4>
                            <h4 class="text-center"><strong>Data de Desembarque:
                            </strong><?php echo date('d/m/Y',strtotime($row['data_desembarque']));?></h4>
                        </fieldset>                        
                    </div>
                    <div class="col-md-6" style="padding-left: 2px;">
                        <h3 class="text-center rotuloPreco">Preço</h3> 
                        <fieldset class="preco">
                            <h2 class="text-center">
                            <strong>R$ <?php echo number_format($row['valor_viagem'],2,',','.');?></strong> 
                            <small> por pessoa</small></h2>
                        </fieldset>                       
                    </div>
                    <div class="col-md-12 text-center" style="margin-top:7px">
                        <button type="button" class="btn btnComprar" 
                        data-toggle="modal" data-target="#modalCompra">Comprar</button>                        
                    </div>                  
                </div>
            </div>
        </div> 
        <?php } while ($row=$lista->fetch_assoc()); ?>
    </div>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</body>
<?php mysqli_free_result($lista); ?>