<?php 
// CONEXÃO
include("Connections/conn_viagens.php");

// CONSULTA PARA OS DADOS
$tabela_destaque   ="vw_tbviagens";
$campo_filtro     ="destaque_viagem";
$filtro_select    ="Sim";
$ordenar_por   ="local_viagem ASC";
$consulta_destaque      ="SELECT * FROM ".$tabela_destaque." WHERE ".$campo_filtro."='".$filtro_select."' ORDER BY ".$ordenar_por."";
$lista_destaque         =$conn_viagens->query($consulta_destaque);
$row_destaque           =$lista_destaque->fetch_assoc();
$totalRows     =($lista_destaque)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GullChat - Viagens em destaque</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">-->
</head>
<body class="imgFundo">
<main>
  <div class="container">
      <h3 class="breadcrumb text-center fundo fonteVerde">Viagens em Destaque</h3>    
      <!-- INICIO DA ESTRUTURA DE REPETIÇÃO -->
    <?php do { ?>
      <a href="viagens_detalhe.php?id_viagem=<?php echo $row_destaque['id_viagem'];?>">
        <div class="card thumbnail fundoTransparente zoom" id="dadoscard">
        <div class="row">
            <div class="col-md-12">
              <div class="col-md-5">
                <h3>Navegue a bordo do <?php echo $row_destaque['cruzeiro_viagem'];?></h3>
                <h4 class="card-title"><small><?php echo $row_destaque['local_viagem'];?></small></h4>
              </div>
              <h4 class="fonteVerde">
                <strong>Viagem do tipo: <?php echo $row_destaque['viagem_categoria']?></strong> 
              </h4>
          </div>
          <div class="col-md-4">
              <img src="imagens/<?php echo $row_destaque['imagem_viagem']?>" class="img-responsive">
          </div>
          <div class="col-md-6" id="conteudo">
            <p><?php echo $row_destaque['resumo_viagem'];?></p>
            <div class="col-md-5">
              <h5 class="efeito">
                <strong>Embarque: </strong>
                <?php echo date('d/m/Y',strtotime($row_destaque['data_embarque']));?>
              </h5>
            </div>
            <div class="col-md-5">
              <h5 class="efeito">
                <strong>Desembarque: </strong>
                <?php echo date('d/m/Y',strtotime($row_destaque['data_desembarque']));?>
              </h5>
            </div><br>
            </div>
          <div class="col-md-2 espacamentotop">
            <button class="btn btn-block"> R$ <?php echo $row_destaque['valor_viagem'];?></button>
          </div>
          <div class="col-md-2 espacamentotop">
          <a class="btn btn-primary btn-block" href="viagens_detalhe.php?id_viagem=<?php echo $row_destaque['id_viagem'];?>">Ver Detalhes</a>
          <button class="btnDestaque">
            <span class="glyphicon glyphicon-star" aria-hidden="true" id="fav"></span>
            </button>
          </div>
      </div>
      </a>
    </div>      
    <?php } while ($row_destaque=$lista_destaque->fetch_assoc()); ?>
  </div> 
</main>
<!-- Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>-->
</body>
<?php mysqli_free_result($lista_destaque); ?>