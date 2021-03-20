<!doctype html>
<html lang="pt-br">
<head>
<!-- Após 15 segundos a página sera redirecionada para index.php-->
<meta http-equiv="refresh" content="15;URL=index.php"> 
<meta charset="utf-8">
<title>Finalizar compra</title>
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!--  -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/abf65111b3.js" crossorigin="anonymous"></script>
</head>
<body class="imgFundo">
<?php include('menu_publico.php'); ?>
<main class="container">
    <br>
    <div class="col-md-10 col-md-offset-1 col-sm-6 col-xs-12 espacamentoTopo">
        <div class="thumbnail fundoTransparente">
        <h1 class="breadcrumb text-center fundo fonteVerde text-center">
            Pedido realizado com sucesso!            
            <i class="text-center fas fa-check-circle" style="color: #00D646"></i>
        </h1> 
        <?php
            $destino        = "contato@gullchat.com.br";
            $nome_cartao    = $_POST['nome_cartao'];

            echo "<h4 class='text-center'>Obrigado pela preferência, <b>$nome_cartao</b>!</h4>";
            echo "<h4 class='text-center'>Sua passagem em breve será encaminhada ao seu email.</h4>";
        ?>
        <br>
        <br>
            <h5 class="text-center">
            Caso esteja com algum problema, entre em contato conosco através do email <b><i><?php echo $destino ?></i></b>
            <br>        
             <h5 class="text-center">Você será redirecionado para a página inicial em 
                <strong><span id="count" class="timer">15</span> segundos.</strong></h5>
            </h5>
        </div>
    </div>
<!-- RODAPÉ -->
 <footer>
    <?php // include('rodape.php'); ?>
 </footer>
</main>
<script type="text/javascript">
    var counter = 15;
    setInterval( function(){
        counter--;

        if( counter >=0){
            id = document.getElementById("count");
            id.innerHTML = counter;
        }
    }, 1000);
</script>
<!--  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="app.js"></script>   
</body>
</html>