<?php 
// CONEXÃO
include("Connections/conn_viagens.php");

// CONSULTA PARA OS DADOS
$tabela   ="vw_tbviagens";
$ordenar_por   ="cruzeiro_viagem ASC";
$consulta      ="SELECT * FROM ".$tabela." WHERE id_viagem = '3' OR id_viagem = '1' OR id_viagem = '6' ORDER BY ".$ordenar_por."";
$lista         =$conn_viagens->query($consulta);
$row           =$lista->fetch_assoc();
$totalRows     =($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GullChat - Cruzeiros</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">-->
</head>
<body class="imgFundo">
    <div id="cruzeirosver" class="container">
        <h3 class="breadcrumb text-center fundo fonteVerde">Cruzeiros</h3>  
        <!-- INICIO DA ESTRUTURA DE REPETIÇÃO -->
        <?php do {?>
            <div class="col-md-4 col-sm-6 col-xs-12 espacamentoTopo">
                <div class="thumbnail fundoTransparente zoom">
                    <h3 class="breadcrumb text-center fundo fonteVerde"><?php echo $row['cruzeiro_viagem'];?>
                    </h3>
                    <img src="imagens/<?php echo $row['imagem_cruzeiro'];?>" class="img-responsive">
                    <h5 class="semEspacoTopo"><?php echo mb_strimwidth($row['cruzeiro_descri'],0,50,'...');?>
                    </h5>
                    <p><button class="btn btn-default btn-block"><?php echo "<a href='".$row['video_yt']."' target='_blank'>" ?>VER MAIS</button></p>
                    </a>
                </div>
            </div>
        <?php } while ($row=$lista->fetch_assoc()); ?>
    </div>
<!-- Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>-->
</body>
<?php mysqli_free_result($lista); ?>