<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link arquivos Bootstrap css 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">-->
  <title>NAVEGAÇÃO</title>
</head>
<body>
<main>
<nav id="nav-busca">
  <div class="logo">
        <a href="index.php"><span class="hidden-xs hidden-sm"><img src="svg/Logo-LG.svg" alt=""></span></a>
    </div>
  <ul>
  <li>
    <form action="viagens_busca.php" method="get" name="form_busca" id="form_busca" class="navbar-form" role="search">
      <div class="form-group">
        <div class="input-group">
            <input type="text" placeholder="Busque pelo local que deseja viajar..." name="buscar" id="buscar" size="70" required class="form-control">
                <span class="input-group-btn">
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
               </div>
                    <button type="submit" class="btn btn-default" id="search">
                      <span class="glyphicon glyphicon-search btn-xs"></span>
                    </button>
                </span>
            </div>
        </div>
    </form>
      </li>
    </ul>
</nav>      
  <nav id="navprincipal">
    <div id="logomobile">
      <span class="hidden-md hidden-lg"><img src="svg/Logo-LG.svg" alt=""></span>
    </div>
    <ul class="nav-links">
      <li class="active">
        <a href="../index.php"><span class="glyphicon glyphicon-home"></span></a>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#viagens">VIAGENS
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="viagens_nacionais.php"> Nacional</a></li>
          <li><a href="viagens_internacionais.php"> Internacional</a></li>
        </ul>
          <li><a href="#cruzeirosver">CRUZEIROS</a></li>
          <li><a class="contact" type="button" data-toggle="modal" data-target="#myModal">CONTATO</a></li>
          <li><a href="index.php#quemsomos">SOBRE</a></li>
          <li><a href="admin/index.php"><span class="glyphicon glyphicon-user"></span></a></li>
    </ul>
  </nav>  
</main>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-5cdff91d-1bbb-4856-8763-aab83f5c172a"></div>
  <!-- Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>-->
</body>
</html>