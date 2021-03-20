<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Link arquivos Bootstrap css 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">-->
</head>
<body>
<main>
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1"  aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fundoCard">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFF;"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title fonteVerde text-center" id="myModalLabel" style="font-weight: bold;">CONTATO</h2>
      </div>
      <div class="modal-body fundo fonteBranca">
      <form action="rodape_contato_envia.php" name="form_contato" id="form_contato" method="post">
        <!-- INPUT GROUP -->
            <label for="nome">Nome</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" name="basic-addon1">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </span>
                <input type="text" name="nome_contato" id="nome_contato" placeholder="Digite seu nome" aria-describedby="basic-addon1" required class="form-control">
            </div>
            <br>
            <label for="email">Email</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon2" name="basic-addon2">
                    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                </span>
                <input type="email" name="email_contato" id="email_contato" placeholder="Digite seu Email" aria-describedby="basic-addon2" required class="form-control">
            </div>
            <br>
            <label for="mensagem">Mensagem</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3" name="basic-addon3">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </span>
                <textarea name="comentarios_contato" id="comentarios_contato" placeholder="Digite seu comentário, dúvidas e/ou sugestões" aria-describedby="basic-addon3" required class="form-control" rows="5" required></textarea>
            </div>
            <br>
            <button class="btn btn-enviar btn-block btn-lg" aria-label="Enviar">
            Enviar <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
        </button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>

  <!-- Modal Contato 
  <div id="modal-contato" class="modal-container">
    <div class="modal-contato">
      <button class="fechar">X</button>
      <h3 class="text-center fonteVerde">CONTATO</h3>


    </div>
</div>-->
<!--  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>-->
</body>
</html>