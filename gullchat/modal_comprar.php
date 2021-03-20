<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Link arquivos Bootstrap css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/abf65111b3.js" crossorigin="anonymous"></script>
</head>
<body>
<main>
    <!-- Modal -->
<div class="modal fade" id="modalCompra" tabindex="-1"  aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header fundoCard">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #FFF;">
        <span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title fonteVerde text-center" id="myModalLabel" style="font-weight: bold;">
            <i class="fas fa-money-check-alt"></i> Finalizar compra
        </h2>
      </div>
      <div class="modal-body fundo fonteBranca">
        <h3 class="text-center">Forma de Pagamento</h3> 
        <form action="rodape_compra_envia.php" name="form_contato" id="form_contato" method="post">
            <!-- INPUT GROUP -->
            <div class="row text-center">
                <label class="radio-inline" for="boleto">
                    <input type="radio" name="boleto" id="boleto" value="BoletoBancario" disabled>
                    Boleto Bancário
                </label>                    
                <label class="radio-inline" for="cartao">
                    <input type="radio" name="cartao" id="cartao" value="CartaodeCredito" checked>
                    Cartão de Crédito
                </label>                    
            </div>
            <br>
            <div class="icon-container text-center">
              <i class="fa fa-cc-visa fa-3x" style="color:navy;"></i>
              <i class="fa fa-cc-amex fa-3x" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard fa-3x" style="color:red;"></i>
              <i class="fa fa-cc-discover fa-3x" style="color:orange;"></i>
            </div>
            <br>
            <label for="numero_cartao">Número do Cartão</label>            
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" name="basic-addon1">
                    <span class="far fa-credit-card" aria-hidden="true"></span>
                </span>
                <input type="text" name="numero_cartao" id="numero_cartao" placeholder="Digite o número do cartão" aria-describedby="basic-addon1" required class="form-control" maxlength="16">
            </div>
            <br>
            <label for="nome_cartao">Nome Impresso no Cartão</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" name="basic-addon1">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                </span>
                <input type="text" name="nome_cartao" id="nome_cartao" placeholder="Digite o nome impresso no cartão" aria-describedby="basic-addon1" required class="form-control">
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="validade">Validade</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" name="basic-addon1">
                            <span class="far fa-calendar-alt" aria-hidden="true"></span>
                        </span>
                        <input type="date" name="validade_cartao" id="validade_cartao" placeholder="Digite o validade impresso no cartão" aria-describedby="basic-addon1" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                <label for="key">Código de Segurança</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1" name="basic-addon1">
                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                        </span>
                        <input type="text" name="key" id="key" placeholder="Digite o código" aria-describedby="basic-addon1" required class="form-control" maxlength="3">
                    </div>
                </div>
            </div>
            <br>  
            <label for="parcelamento">Selecione o Parcelamento</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" name="basic-addon1">
                    <span class="fas fa-money-check-alt" aria-hidden="true"></span>
                </span>
                <select class="form-control form-control-sm" style="width: 100%;">
                    <option>- SELECIONE -</option>
                    <option>2x Sem juros</option>
                    <option>3x Sem juros</option>
                    <option>4x Sem juros</option>
                    <option>5x Sem juros</option> 
                    <option>6x Sem juros</option>
                    <option>7x Sem juros</option>
                    <option>8x Sem juros</option>
                    <option>9x Sem juros</option> 
                    <option>10x Sem juros</option>   
                </select>   
            </div>
            <hr>
            <h3 class="text-center">Receber a passagem via email</h3> 
            <label for="email_envia">Email</label>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" name="basic-addon1">
                    <span class="fas fa-at" aria-hidden="true"></span>
                </span>
                <input type="email" name="email" id="email" placeholder="Digite o email" aria-describedby="basic-addon1" required class="form-control">
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-danger btn-block btn-lg" data-dismiss="modal" aria-label="Close" style="color: #FFF;">Cancelar</button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-enviar btn-block btn-lg" aria-label="Enviar">
                    Finalizar compra <span class="fas fa-check-circle" style="color:#00D646;"></span>
                    </button>
                </div>                
            </div>
            <h4 class="text-center corFonteVermelho">Obs: Compra ficticia, com intuito não comercial</h4>
        </form>
      </div>
    </div>
  </div>
</div>
</main>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>