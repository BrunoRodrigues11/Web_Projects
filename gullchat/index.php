<!doctype html>
<html lang="pt-br">
<link rel="shortcut icon" href="svg/favicon.ico"/>
<a href="https://api.whatsapp.com/send?l=pt&amp;phone=5515997086888&text=Olá,%20estou%20com%20dúvidas,%20poderia%20me%20ajudar?%20"target="_blank"><img src="https://i.imgur.com/ryESuZ5.png" style="height:50px; position:fixed; bottom: 25px; right: 25px; z-index:99999;" data-selector="img" class="hidden-xs hidden-sm zoom"></a>
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GullChat</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/meuestilo.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/cardviagem.css" rel="stylesheet">
    
</head>
<body class="imgFundo">
    <?php include('menu_publico.php'); ?>
    <?php include('carroussel.php'); ?>
    <main id="margininclude">
        <?php //include('btnUp.php'); ?>
        <?php include('viagens_destaque.php'); ?>
        <?php include('viagens_geral.php'); ?>

        <a name="cruzeirosver">&nbsp;</a>
        <?php include('cruzeiros.php'); ?>
        
    </main>
    <?php include('modal_contato.php'); ?>
        <a name="quemsomos">&nbsp;</a>
        <?php include('rodape.php'); ?>

    <!-- <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1">
        <img src="imagens/site-em-contrucao.svg" alt="" class="img-responsive">
    </div>-->
<!-- Link arquivos Bootstrap js
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>-->
</body>