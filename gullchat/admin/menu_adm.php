<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu Admin</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/meuestilo.css" rel="stylesheet">
</head>
<body>
  <!-- Navbar Primária -->
  <nav class="nav navbar navbar-inverse menu">
    <div class="container-fluid">
      <div id="topo" class="navbar-header">
        <button type="button" class="navbar-toggle collapsed menuClose" data-toggle="collapse"
          data-target="#defaultNavbar" aria-expanded="false">
        </button>
        <a class="navbar-brand" href="index.php">
            <img src="../svg/Logo-LG.svg" class="hidden-xs" alt="">
            <img src="../svg/Logo-XS.svg" class="visible-xs" alt="">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="defaultNavbar">
        <ul class="nav navbar-nav">

            <li class=""><a href="../index.php"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active"><a href="index.php">ADMIN</a></li>
            <li><a href="categorias_lista.php">CATEGORIAS</a></li>
            <li><a href="viagens_lista.php">VIAGENS</a></li>
            <li><a href="usuarios_lista.php">USUÁRIOS</a></li>

        </ul>
        <!-- Nav direita -->
        <div class="">
          <ul class="nav navbar-nav navbar-right">
            <li>
                 <button type="button" class="btn btn-default navbar-btn disabled">
                    <span class="glyphicon glyphicon-user"> <?php echo ($_SESSION['login_usuario']);?></span> 
                </button>
            </li>
              </a></li>
            <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span></a></li>
          </ul>
        </div>
      </div>
    </div><!-- fechamento container-fluid -->
  </nav>




<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>