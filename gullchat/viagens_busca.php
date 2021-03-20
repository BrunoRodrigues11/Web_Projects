<?php
include("Connections/conn_viagens.php");
$tabela           ="vw_tbviagens";
$campo_filtro     ="local_viagem";
$filtro_select    =$_GET['buscar'];
$ordenar_por      ="local_viagem ASC";
$consulta         ="SELECT * FROM ".$tabela." WHERE ".$campo_filtro." LIKE('%".$filtro_select."%') ORDER BY ".$ordenar_por."";
$lista            =$conn_viagens->query($consulta);
$row              =$lista->fetch_assoc();
$totalRows        =($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link href="css/cardviagem.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="svg/favicon.ico"/>
</head>
<body class="imgFundo">
<main>
<?php include('menu_publico.php');?>
<?php include('modal_contato.php'); ?>
<div class="container">
  <?php if ($totalRows == 0){ ?>
    <h2 class="breadcrumb fundo text-left fonteVerde"><!-- TÍTULO -->
      <a href="javascript:window.history.go(-1)" class="" alt="voltar">
          <button class="btn btn-default borda btnBack" type="button">
          <span class="glyphicon glyphicon-chevron-left" style="color:#fff;" aria-hidden="true"></span>
          </button>
      </a>
      Você pesquisou por:<strong><i><?php echo $_GET['buscar']; ?></i></strong>
      <div class="text-center">Em breve mais viagens extraordinárias estarão ao seu dispor!</div>
    </h2>
  <?php }; ?>
  <?php if ($totalRows > 0) { ?>
    <h2 class="breadcrumb fundo text-left fonteVerde"><!-- TÍTULO -->
      <a href="javascript:window.history.go(-1)" class="" alt="voltar">
          <button class="btn btn-default borda btnBack" type="button">
          <span class="glyphicon glyphicon-chevron-left" style="color:#fff;" aria-hidden="true"></span>
          </button>
      </a>
      Você pesquisou por:<strong><i><?php echo $_GET['buscar']; ?></i></strong>
    </h2>
    <?php do { ?>
    <a href="viagens_detalhe.php?id_viagem=<?php echo $row['id_viagem'];?>">
    <div class="card thumbnail fundoTransparente zoom" id="dadoscard">
      <div class="row">
          <div class="col-md-12">
            <div class="col-md-5">
              <h3>Navegue a bordo do <?php echo $row['cruzeiro_viagem'];?></h3>
              <h4 class="card-title"><small><?php echo $row['local_viagem'];?></small></h4>
            </div>
              <h4 class="fonteVerde"><strong>Viagem do tipo: <?php echo $row['viagem_categoria']?></strong> </h4>
          </div>
          <div class="col-md-4">
              <img src="imagens/<?php echo $row['imagem_viagem']?>" class="img-responsive">
          </div>
          <div class="col-md-6" id="conteudo">
            <p><?php echo $row['resumo_viagem'];?></p>
            <div class="col-md-5">
              <h5 class="efeito"><strong>Embarque: </strong><?php echo date('m/d/Y',strtotime($row['data_embarque']));?></h5>
            </div>
            <div class="col-md-5">
              <h5 class="efeito"><strong>Desembarque: </strong><?php echo date('m/d/Y',strtotime($row['data_desembarque']));?></h5>
            </div><br>
          </div>
          <div class="col-md-2 espacamentotop">
            <button class="btn btn-block"> R$ <?php echo $row['valor_viagem'];?></button>
          </div>
          <div class="col-md-2 espacamentotop">
          <a class="btn btn-primary btn-block" href="viagens_detalhe.php?id_viagem=<?php echo $row['id_viagem'];?>">Ver Detalhes</a>
          </div>
      </div>
      </a>
    </div>      
    <?php } while ($row=$lista->fetch_assoc()); ?>
  <?php }; ?>
  </div>
</main>  
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/app.js"></script>
</body>
<?php mysqli_free_result($lista);?>