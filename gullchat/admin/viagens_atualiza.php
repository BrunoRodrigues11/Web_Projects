<?php
include("../Connections/conn_viagens.php");

// VARIÁVEIS GLOBAIS
$tabela          ="tbviagens";
$campo_filtro    ="id_viagem";

if($_POST){
// USE DO BANCO DE DADOS
mysqli_select_db($conn_viagens,$database_conn);
// GUARDAR NOME DA IMAGEM NO BANCO DE DADOS E TRANSPORTAR O ARQUIVO PARA O DIRETORIO
if ($_FILES['imagem_viagem']['name']){
    $nome_img   = $_FILES['imagem_viagem']['name'];
    $tmp_img    = $_FILES['imagem_viagem']['tmp_name'];
    $dir_img    = "../imagens/".$nome_img;
    move_uploaded_file($tmp_img,$dir_img);
}else{
    $nome_img=$_POST['imagem_viagem_atual'];
}
if ($_FILES['imagem_cruzeiro']['name']){
    $nome_imgcru   = $_FILES['imagem_cruzeiro']['name'];
    $tmp_imgcru    = $_FILES['imagem_cruzeiro']['tmp_name'];
    $dir_imgcru    = "../imagens/".$nome_imgcru;
    move_uploaded_file($tmp_imgcru,$dir_imgcru);
}else{
    $nome_imgcru=$_POST['imagem_viagem_atual'];
}
//RECEBER OS DADOS DO FORMULÁRIO
$id_categoria_viagem    =$_POST['id_categoria_viagem'];
$destaque_viagem        =$_POST['destaque_viagem'];
$local_viagem           =$_POST['local_viagem'];
$resumo_viagem          =$_POST['resumo_viagem'];
$imagem_viagem          =$nome_img;
$cruzeiro_viagem        =$_POST['cruzeiro_viagem'];
$imagem_cruzeiro        =$nome_imgcru;
$cruzeiro_descri        =$_POST['cruzeiro_descri'];
$valor_viagem           =$_POST['valor_viagem'];
$data_embarque          =$_POST['data_embarque'];
$data_desembarque       =$_POST['data_desembarque'];
$video_yt               =$_POST['video_yt'];
// CRIANDO O WHERE (FILTRO)
$filtro_update      =$_POST['id_viagem'];
// CONSULTA PARA O UPDATE
$updateSQL      ="UPDATE ".$tabela."
                SET id_categoria_viagem = '".$id_categoria_viagem ."', destaque_viagem ='".$destaque_viagem."', local_viagem ='".$local_viagem."', resumo_viagem ='".$resumo_viagem."', imagem_viagem = '".$imagem_viagem."', cruzeiro_viagem ='".$cruzeiro_viagem."', imagem_cruzeiro ='".$imagem_cruzeiro."', cruzeiro_descri ='".$cruzeiro_descri."', valor_viagem ='".$valor_viagem."', data_embarque ='".$data_embarque."', data_desembarque ='".$data_desembarque."', video_yt ='".$video_yt."'
                WHERE ".$campo_filtro."='".$filtro_update."'";
$resultado  = $conn_viagens->query($updateSQL);

// DESTINO APÓS O CADASTRO CORRETO
$destino    = "viagens_lista.php";
if(mysqli_insert_id($conn_viagens)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};  
}
// CONSULTA PARA TRAZER OS DADOS PARA O FILTRO
mysqli_select_db($conn_viagens,$database_conn);
$filtro_select  =$_GET['id_viagem'];
$consulta       = "SELECT * FROM ".$tabela." WHERE ".$campo_filtro."=".$filtro_select."";
$lista = $conn_viagens->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;

// USE BANCO DE DADOS
mysqli_select_db($conn_viagens,$database_conn);
// SELECIONANDO OS DADOS DA TABELA ESTRANGEIRA
$tabela_fk    = "tbcategorias";
$ordenar_por  = "viagem_categoria";
$consulta_fk  = "SELECT * 
                FROM ".$tabela_fk." 
                ORDER BY ".$ordenar_por." ASC";
$lista_fk     = $conn_viagens->query($consulta_fk);
$row_fk       = $lista_fk->fetch_assoc();
$totalRows_fk = ($lista_fk)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Viagens Atualiza</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/meuestilo.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
    <link rel="shortcut icon" href="../svg/favicon.ico"/>
</head>
<body class="fundo fonteBranca">
<?php include ('menu_adm.php'); ?>
<main class="container">
    <br>
    <div class="col-xs-12 col-sm-8 col-sm-offset-3 col-md-6 col-md-offset-3 fundoCard">
        <div>
            <h2 class="breadcrumb fundoCard text-center fonteVerde"><!-- TÍTULO -->
                <a href="viagens_lista.php" class="" alt="voltar">
                <button class="btn btn-default borda btnBack" type="button">
                <span class="glyphicon glyphicon-chevron-left" style="color:#FFF;" aria-hidden="true"></span>
                </button>
                </a>
                Atualizando Viagens
            </h2>
        </div>  
        <div class="thumbnail fundoCard">
            <form action="viagens_atualiza.php" name="form_viagem_atualiza" id="form_viagem_atualiza" method="post" enctype="multipart/form-data">
            <!-- CAMPO ID_VIAGEM PARA USAR COMO FILTRO -->
            <input type="hidden" name="id_viagem" id="id_viagem" value="<?php echo $row['id_viagem']; ?>   ">
            <!-- SELECT ID_CATEGORIA_VIAGEM-->
            <label for="categoria_viagem">Categoria:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-tasks"aria-hidden="true"></span>
                </span>
                
                <select class="form-control" name="id_categoria_viagem" id="id_categoria_viagem" required>
                <?php do {?>
                    <option value="<?php echo $row_fk['id_categoria'];?>"<?php if(!(strcmp($row_fk['id_categoria'],$row['id_categoria_viagem']))){echo "selected=\selected\"";} ?>    >
                                    <?php echo $row_fk['viagem_categoria'];?>
                    </option>
                <?php } while ($row_fk = $lista_fk->fetch_assoc()); 
                        $row_fk = mysqli_num_rows($lista_fk);
                        if($row_fk > 0){
                            mysqli_data_seek($lista_fk,0);
                            $row_fk = $lista_fk->fetch_assoc();
                        }
                    ?>
                </select>
            </div>
            <br>
            <!-- RADIO DESTAQUE_VIAGEM -->
            <label for="destaque_viagem">Deseja torná-la DESTAQUE?</label>
                <div class="input-group">
                    <label class="radio-inline" for="destaque_viagem_s">
                        <input type="radio" name="destaque_viagem" id="destaque_viagem" value="Sim"<?php echo $row['destaque_viagem']=="Sim" ? "checked" : null; ?>> Sim
                    </label>
                    <label class="radio-inline" for="destaque_viagem_s">
                        <input type="radio" name="destaque_viagem" id="destaque_viagem" value="Não" <?php echo $row['destaque_viagem']=="Não" ? "checked" : null; ?>> Não
                    </label>
                </div>
                <br>
                <!-- LOCAL_VIAGEM -->
            <label for="local_viagem">Local:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                    </span>
                    <input class="form-control" type="text" name="local_viagem" id="local_viagem" placeholder="Digite o local da viagem" maxlength="70" required value="<?php echo $row ['local_viagem']; ?>">
                </div>
                <br>
                <!-- RESUMO_VIAGEM -->
            <label for="resumo_viagem">Resumo da Viagem:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </span>
                    <textarea class="ckeditor" name="resumo_viagem" id="resumo_viagem" cols="30" rows="5" placeholder="Digite os detalhes da Viagem"><?php echo $row ['resumo_viagem']; ?></textarea>
                </div>
                <br>
                <!-- IMAGEM ATUAL -->
                <label for="">Imagem Atual:</label>
                    <img src="../imagens/<?php echo $row ['imagem_viagem']; ?>" alt="" class="img-responsive" style="max-width:30%">
                  <!-- GUARDANDO O NOME DA IMAGEM ANTIGA -->
                    <input type="hidden" name="imagem_viagem_atual" id="imagem_viagem_atual" value="<?php echo $row ['imagem_viagem']; ?>">
                  <!-- FILE IMAGEM_VIAGEM -->
                <label for="imagem_viagem">Nova Imagem:</label>
                <br>
                <img class="img-responsive" src="" alt="" name="imagem" id="imagem">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-picture"></span>
                        </span>
                        <input class="form-control" type="file" name="imagem_viagem" id="imagem_viagem" onchange="visualizarImagem.call(this)">
                    </div>
                <br>
                <!-- CRUZEIRO_VIAGEM -->
                <label for="cruzeiro_viagem">Cruzeiro:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                    </span>
                    <input class="form-control" type="text" name="cruzeiro_viagem" id="cruzeiro_viagem" placeholder="Digite o Cruzeiro da viagem" maxlength="70" required value="<?php echo $row ['cruzeiro_viagem']; ?>">
                </div>
                <br>
                <!-- IMAGEM CRUZEIRO ATUAL -->
                <label for="">Imagem Atual:</label>
                    <img src="../imagens/<?php echo $row ['imagem_cruzeiro']; ?>" alt="" class="img-responsive" style="max-width:30%">
                <!-- GUARDANDO O NOME DA IMAGEM ANTIGA -->
                <input type="hidden" name="cruzeiro_imagem_atual" id="cruzeiro_imagem_atual" value="<?php echo $row ['imagem_cruzeiro']; ?>">
                <!-- FILE IMAGEM_CRUZEIRO-->
                <br>
                <label for="imagem_cruzeiro">Nova Imagem do Cruzeiro:</label>
                <br>     
                <img class="img-responsive" src="" alt="" name="imagemcruzeiro" id="imagemcruzeiro">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-picture"></span>
                        </span>
                        <input class="form-control" type="file" name="imagem_cruzeiro" id="imagem_cruzeiro" onchange="visualizarImagem2.call(this)">
                    </div>
                <br>
                <!-- TEXT AREA CRUZEIRO_DESCRI -->
                <label for="cruzeiro_descri">Descrição do Cruzeiro</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        </span>
                        <textarea class="ckeditor" name="cruzeiro_descri" id="cruzeiro_descri" cols="30" rows="5" placeholder="Digite os detalhes do Cruzeiro"><?php echo $row ['cruzeiro_descri']; ?></textarea>
                    </div>
                <br>
                <!-- VALOR VIAGEM -->
                <label for="valor_viagem">Valor:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                        </span>
                        <input class="form-control" type="number" name="valor_viagem" id="valor_viagem" min="0" step="0.01" value="<?php echo $row ['valor_viagem']; ?>">
                    </div>
                <!-- DATA VIAGEM -->
                <label for="data_embarque">Data de Embarque:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        </span>
                        <input class="form-control" type="date" name="data_embarque" id="data_embarque" maxlength="10" value="<?php echo $row ['data_embarque']; ?>">
                    </div>
                    <br>
                <!-- DATA VIAGEM -->
                <label for="data_desembarque">Data de Desembarque</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        </span>
                        <input class="form-control" type="date" name="data_desembarque" id="data_desembarque" maxlength="10" value="<?php echo $row ['data_desembarque']; ?>">
                    </div>
                    <br>
                <!-- video_yt -->
                <label for="video_yt">Vídeo do Youtube:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        </span>
                        <input class="form-control" type="text" name="video_yt" id="video_yt" maxlength="50" value="<?php echo $row['video_yt'];?>">
                    </div>
                <br>
                <!-- BOTÃO CADASTRAR -->
                <input class="btn btn-primary btn-block" role="button" type="submit" value="Atualizar" name="enviar" id="enviar">
<main>
<script>
function visualizarImagem(){
    if(this.files && this.files[0]){
        var obj = new FileReader();
        obj.onload = function(data){
        var imagem = document.getElementById("imagem");
            imagem.src = data.target.result;
                imagem.style.display = "block";
            }
        obj.readAsDataURL(this.files[0]);
    }
}
</script>
<script>
function visualizarImagem2(){
    if(this.files && this.files[0]){
            var obj = new FileReader();
            obj.onload = function(data){
            var imagemcruzeiro = document.getElementById("imagemcruzeiro");
                imagemcruzeiro.src = data.target.result;
                    imagemcruzeiro.style.display = "block";
                }
            obj.readAsDataURL(this.files[0]);
    }
}
</script>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
<?php 
mysqli_free_result($lista_fk); 
mysqli_free_result($lista); 
?>