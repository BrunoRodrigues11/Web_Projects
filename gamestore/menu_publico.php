<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <!-- Navbar Primária -->
  <nav class="nav navbar navbar-inverse menu">
    <div class="container-fluid">
      <!-- Agrupamento para exibição MOBILE -->
      <div id="topo" class="navbar-header">
        <button type="button" class="navbar-toggle collapsed menuClose" data-toggle="collapse"
          data-target="#defaultNavbar" aria-expanded="false">
        </button>
        <a class="navbar-brand" href="index.php">
          <img src="img/Logo.svg" alt="">
        </a>
      </div>
      <!-- Nav direita -->
      <div class="collapse navbar-collapse" id="defaultNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">PRODUTOS
              <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="games.html">Games</a></li>
              <li><a href="perifericos.html">Periféricos</a></li>
              <li><a href="admin/index.php">ADMIN</a></li>
            </ul>
          </li>
          <li><a class="contact">CONTATO</a></li>
          <li class=""><a href="/sobre.html">SOBRE</a></li>
        </ul>
        <!-- Nav direita -->
        <div class="">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> <span class="badge">0</span>
              </a></li>
            <li><a href="admin/login.php"><span class="glyphicon glyphicon-user"></span></a></li>
          </ul>
        </div>
      </div>
    </div><!-- fechamento container-fluid -->
  </nav>
</body>
</html>