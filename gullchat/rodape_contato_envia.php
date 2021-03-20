<!doctype html>
<html lang="pt-br">
<head>
<!-- Após 15 segundos a página sera redirecionada para index.php -->
<meta http-equiv="refresh" content="15;URL=index.php">
<meta charset="utf-8">
<title>Verificação do Contato</title>
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!--  -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="imgFundo">
<?php include('menu_publico.php'); ?>
<main class="container">
    <br>
    <div class="col-md-10 col-md-offset-1 col-sm-6 col-xs-12 espacamentoTopo">
        <div class="thumbnail fundoTransparente">
            <h1 class="breadcrumb text-center fundo fonteVerde">Agradecemos seu contato!</h1>   
        <?php
            $destino        = "contato@gullchat.com.br";
            $nome_contato   = $_POST['nome_contato'];
            $email_contato  = $_POST['email_contato'];
            $msg_contato    = " Mensagem de: 
            ".$_POST['nome_contato']."\n".$_POST['comentarios_contato'];
            $mailsend       =mail("$destino","Formulário de comentário","$msg_contato","From:$email_contato");
            
            echo "<p class='text-center'>Obrigado por enviar seus comentários, <b>$nome_contato</b>!</p>";
            echo "<p class='text-center'>Mensagem enviada com sucesso!</p>";
        ?>
            <h5 class="text-center">
            Caso não visualize a mensagem de agradecimento, entre em contato através do email
            <b><i><?php echo $destino ?></i></b>        
            Você será redirecionado para a página inicial em <span id="count" class="timer">15</span> segundos.
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