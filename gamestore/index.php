<?php
include("Connections/conn_gamestore.php");

//consulta para trazer os dados e se necessário filtrar
$tabela            = "vw_tbprodutos";
$campo_filtro      = "favorito_produto";
$filtro_select     = "Não"; 
$ordenar_por       = "descri_produto ASC"; 
$consulta     = "SELECT *
                  FROM ".$tabela." 
                  WHERE ".$campo_filtro."='".$filtro_select."'
                  ORDER BY ".$ordenar_por."";
$lista        = $conn_gamestore->query($consulta);
$row          = $lista->fetch_assoc();
$totalRows    = ($lista)->num_rows;           
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GameStore - Home</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/ldbtn.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="svg/favicon.ico" />
</head>

<body class="fundo">
<?php include('menu_publico.php')?>
  <!-- Botão Up Flutuante -->
  <div class="btn-up jbtnup">
    <nav>
      <a href="" class="btn-up-link jbtnuplink"></a>
    </nav>
  </div>

  <!-- Comunicado -->
  <div id="comunicado" class="container-fluid">
    <h1 class="text-center fundoVermelho espacamentoTopo">Devido ao COVID-19, estaremos fechados até segunda ordem. </h1>
  </div>

  <!-- verificado -->
  <!-- <div>
    <h3>Tibúrcioˢᵖᶠᶜ
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="htc-icon htc-icon--verified"> 
      <path style="fill: #1DA1F2" opacity="0" d="M0 0h24v24H0z"></path> 
      <path style="fill: #1DA1F2" d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5c-1.51 0-2.816.917-3.437 2.25-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path> 
    </svg></h3>
  </div> -->

  <!-- Jogos Destaques -->
  <div id="destaque" class="container-fluid corFonteBranca">
    <div class="container espacamentoTopo">
      <div class="container-fluid">
        <h3 class="text-left bold ">Destaques da Semana</h3>
      </div>
    </div>
    
    <!-- Carousell Jogos-->
    <section id="header">
      <div class="container-fluid fundo">
        <div class="container fundo">
          <div class="row">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <a href="html/games.html"><img src="img/gta_v.png" alt="..."></a>
                  <div class="carousel-caption">
                    <h3><strong>Grand Theft Auto V</strong></h3>
                    <p></p>
                  </div>
                </div>
                <div class="item">
                  <img src="img/minecraft.png" alt="...">
                  <div class="carousel-caption">
                    <h3>Minecraft</h3>
                  </div>
                </div>
                <div class="item">
                  <img src="img/pro-evolution-soccer-2020.jpg" alt="...">
                  <div class="carousel-caption">
                    <h3>PES 2021</h3>
                  </div>
                </div>
              </div>
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Jogos Mais Populares -->
  <div id="portfolio" class="container-fluid fundo corFonteBranca portifolio">
    <div class="container espacamentoTopo">
      <div class="container">
        <h3 class="text-left bold ">Jogos Mais Populares</h3>
      </div>
      <?php do { ?>
        <a href="produto_detalhe.php?id_viagem=<?php echo $row['id_produto'];?>">
      <div class="col-md-4 col-xs-12 espacamentoTopo">
        <div class="">
          <img src="img/<?php echo $row['imagem_produto']?>" class="img-responsive zoom">
          <div class="gameDetail"></div>
        </div>

        <h3 class="text-left textArticle"><?php echo $row['descri_produto']?></h3>
        <h3 class="semEspacoTopo"><small> <?php echo $row['marca_produto']?></small></h3>
        <h4>R$<?php echo $row['valor_produto']?></h4>
        <button class="btn btn-success" type="submit">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          Carrinho
        </button>
        <button class="btn btn-info" type="submit">
          <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
          Detalhes do jogo 
        </button>
        <button class="btn btn-danger btnfav" type="button" data-toggle="collapse" data-target="#fav">
          <span class="glyphicon glyphicon-heart-empty" aria-hidden="true" id="fav"></span>Fav
        </button>
      </div>
      <?php } while ($row=$lista->fetch_assoc()); ?>
    </div>
  </div>

  <!-- Jogos Grátis -->
  <div id="gratis" class="container-fluid fundo corFonteBranca">
    <div class="container espacamentoTopo">
      <div class="container-fluid">
        <h3 class="text-left bold ">Jogos Grátis</h3>
        <!-- GTA V -->
        <div class="col-md-6 col-xs-6 imagem50">
          <div class="team">
            <a href=""><img src="img/gta_v.png" class="img-responsive team__img"></a>
            <div class="team__detail"></div>
          </div>
          <button class="btn btn-success btn-block" type="submit">
            Grátis
          </button>
          <h3 class="text-left textArticle">GTA V</h3>
          <h3 class="semEspacoTopo"><small> Rockstar Games</small></h3>
          <h4 class="corFonteVerde"><span class="fundoAzul">-100%</span>
            <del class="corFonteVermelho">R$69,99</del>Gratuito
          </h4>
        </div>
        <!-- CS:GO -->
        <div class="col-md-6 col-xs-6 imagem50">
          <div class="team">
            <a href=""><img src="img/Just_Dance_2019-Art.png" class="img-responsive team__img"></a>
            <div class="team__detail"></div>
          </div>
          <button class="btn btn-success btn-block" type="submit">
            Grátis
          </button>
          <h3 class="text-left textArticle">CS: Global Ofensive</h3>
          <h3 class="semEspacoTopo"><small> Valve Corporation</small></h3>
          <h4 class="corFonteVerde">Gratuito</h4>
        </div>
      </div>
    </div>
  </div>

  <!-- Videos 
  <div class="container-fluid espacamentoTopo fundo">
    <div id="videos" class="container">
      <div class="col-md-3">
        <ul class="list-group">
          <li class="list-group-item">FPS<span class="badge">50</span></li>
          <li class="list-group-item">Construção<span class="badge">50</span></li>
          <li class="list-group-item">Esporte<span class="badge">50</span></li>
          <li class="list-group-item">Simulação<span class="badge">50</span></li>
        </ul>
      </div>
      <div class="col-md-3">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wwjKRsQD1KQ"></iframe>
        </div>
      </div>
      <div class="col-md-3">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wwjKRsQD1KQ"></iframe>
        </div>
      </div>
      <div class="col-md-3">

      </div>
    </div>
  </div>-->

  <!-- Rodapé -->
  <div id="rodape-1" class="container-fluid">
    <div id="rodapeInterno" class="container">
      <div class="col-md-4 col-xs-6 centralizado">
        <h4 class="text bold1">LOCALIZAÇÂO</h4>
        <p>Rua do Sol, 395 - Vila Barth</p>
        <p>Itapetininga - São Paulo</p>
      </div>
      <div class="col-md-4 col-xs-6">
        <h4 class="centralizado text bold1">REDES SOCIAIS</h4>
        <div class="centralizado">
          <a href="#"><img src="svg/Facebook.svg" alt="facebook" class="social"></a>
          <a href="#"><img src="svg/Youtube.svg" alt="Email" class="social"></a>
          <a href="#"><img src="svg/Twetter.svg" alt="Twitter" class="social"></a>
          <a href="#"><img src="svg/Instagram.svg" alt="Website" class="social"></a>
          <a href="#"><img src="svg/Linkedin.svg" alt="Linkedin" class="social"></a>
        </div>
      </div>
      <div class="col-md-4 col-xs-12 hidden-xs centralizado">
        <h4 class="text bold1">SAIBA MAIS</h4>
        <p>Blog</p>
      </div>
    </div>
  </div>

  <!-- Rodapé 2-->
  <div class="container-fluid footer corFonteBranca centralizado">
    <div class="container">
      <h6>Copyright&copy; GameStore 2020</h6>
    </div>
  </div>

  <!-- Modal Contato -->
  <div id="modal-contato" class="modal-container">
    <div class="modal-contato">
      <button class="fechar">X</button>
      <h3 class="centralizado bold">CONTATO</h3>
      <form action="">
        <div class="form-group">
          <label class="corFonteBranca" for="Nome">Nome</label>
          <input type="nome" name="nome" id="nome" class="form-control" placeholder="Digite seu nome">
        </div>
        <div class="form-group">
          <label class="corFonteBranca" for="Email">Email</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu email">
        </div>
        <label class="corFonteBranca" for="Mensagem">Mensagem</label>
        <div class="form-group">
          <textarea name="mensagem" id="mensagem" cols="45" rows="5" placeholder="Digite sua mensagem"></textarea>
        </div>
        <div>
          <buitton type="button" class="btn btn-enviar btn-block">
            <span class="glyphicon glyphicon-send"></span> Enviar</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>