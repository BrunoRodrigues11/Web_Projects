<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>GullChat</title>
    <!-- Link arquivos Bootstrap css 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">-->
</head>
<body>
<main>
<div class="row hidden-xs" id="carrosselinicio">
      <div id="carrossel">
        <div id="banners" class="carousel slide" data-ride="carousel">
          <!-- INICIO CARROUSSEL -->
          <ol class="carousel-indicators">
            <!-- INDICADOR DOS ITENS -->
            <li data-target="#banners" data-slide-to="0" class="active"></li>
            <li data-target="#banners" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner" role="button">
            <div class="item ">
              <img src="imagens/banner1.png" alt="" class="center-block">
            </div>
            <div class="item active">
              <img src="imagens/banner2.png" alt="" class="center-block">
            </div>
            <!-- BOTÕES DE NAVEGAÇÃO -->
            <a href="#banners" class="left carousel-control" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a href="#banners" class="right carousel-control" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
          </div>
        </div>
      </div>
    </div>

</main>
<!-- Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>-->
</body>