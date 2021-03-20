<?php
include("../Connections/conn_viagens.php");
if($_POST){
// USE DO BANCO DE DADOS
mysqli_select_db($conn_viagens,$database_conn);
// VÁRIAVEIS PARA ACRESCENTAR OS DADOS
$tabela_insert  ="tbviagens";
$campos_insert  ="id_categoria_viagem, cruzeiro_viagem, imagem_cruzeiro, cruzeiro_descri, local_viagem, resumo_viagem, valor_viagem, imagem_viagem, data_embarque, data_desembarque, destaque_viagem, video_yt";
// RECEBENDO OS DADOS DOS FORMULÁRIOS
// SEMPRE COLOQUE NA MESMA ORDEM DOS CAMPOS_INSERT
$id_categoria_viagem    =$_POST['id_categoria_viagem'];
$cruzeiro_viagem        =$_POST['cruzeiro_viagem'];
$imagem_cruzeiro        =$_FILES['imagem_cruzeiro']['name'];
$cruzeiro_descri        =$_POST['cruzeiro_descri'];
$local_viagem           =$_POST['local_viagem'];
$resumo_viagem          =$_POST['resumo_viagem'];
$valor_viagem           =$_POST['valor_viagem'];
$imagem_viagem          =$_FILES['imagem_viagem']['name'];
$data_embarque            =$_POST['data_embarque'];
$data_desembarque            =$_POST['data_desembarque'];
$destaque_viagem        =$_POST['destaque_viagem'];
$video_yt               =$_POST['video_yt'];
//PEGANDO OS VALORES QUE VÃO SER INSERIDOS
$valores_insert ="'$id_categoria_viagem','$cruzeiro_viagem','$imagem_cruzeiro','$cruzeiro_descri','$local_viagem','$resumo_viagem','$valor_viagem','$imagem_viagem','$data_embarque','$data_desembarque','$destaque_viagem','$video_yt'";
//FAZENDO A INSERÇÃO DOS DADOS
$insertSQL  = "INSERT INTO ".$tabela_insert."                 
   (".$campos_insert.")
VALUES 
   (".$valores_insert.")";
$resultado  = $conn_viagens->query($insertSQL);
// DESTINO APÓS O CADASTRO CORRETO
$destino    = "viagens_lista.php";
if(mysqli_insert_id($conn_viagens)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};  
}
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
// Para guardo nome da imagem no banco e o arquivo no diretório
if (isset($_POST['enviar'])){
    $nome_img   = $_FILES['imagem_viagem']['name'];
    $tmp_img    = $_FILES['imagem_viagem']['tmp_name'];
    $dir_img    = "../imagens/".$nome_img;
    move_uploaded_file($tmp_img,$dir_img);
}
if (isset($_POST['enviar'])){
    $nome_img   = $_FILES['imagem_cruzeiro']['name'];
    $tmp_img    = $_FILES['imagem_cruzeiro']['tmp_name'];
    $dir_img    = "../imagens/".$nome_img;
    move_uploaded_file($tmp_img,$dir_img);
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
                Cadastrando Viagens
            </h2>
        </div> 
        <div class="thumbnail fundoCard">
            <form action="viagens_insere.php" name="form_viagem_insere" id="form_viagem_insere" method="post" enctype="multipart/form-data">
            
            <!-- SELECT ID_CATEGORIA_VIAGEM-->
            <label for="categoria_viagem">Categoria:</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-tasks"aria-hidden="true"></span>
                </span>
                
                <select class="form-control" name="id_categoria_viagem" id="id_categoria_viagem" required>
                <?php do {?> <!-- ESTRUTURA DE REPETIÇÃO -->
                    <option value="<?php echo $row_fk['id_categoria'];?>">
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
                        <input type="radio" name="destaque_viagem" id="destaque_viagem" value="Sim"> Sim
                    </label>
                    <label class="radio-inline" for="destaque_viagem_s">
                        <input type="radio" name="destaque_viagem" id="destaque_viagem" value="Não" checked> Não
                    </label>
                </div>
                <br>
                <!-- LOCAL_VIAGEM -->
            <label for="local_viagem">Local:</label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-plane" aria-hidden="true"></span>
                    </span>
                    <input class="form-control" type="text" name="local_viagem" id="local_viagem" placeholder="Digite o local da viagem" maxlength="70" required>
                </div>
                <br>
                <!-- RESUMO_VIAGEM -->
                <label for="resumo_viagem">Resumo da Viagem:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                        </span>
                        <textarea class="ckeditor" name="resumo_viagem" id="resumo_viagem" cols="30" rows="5" placeholder="Digite os detalhes da Viagem"></textarea>
                    </div>
                    <br>
                  <!-- FILE IMAGEM_VIAGEM -->
            <label for="imagem_viagem">Imagem:</label>
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
                    <input class="form-control" type="text" name="cruzeiro_viagem" id="cruzeiro_viagem" placeholder="Digite o Cruzeiro da viagem" maxlength="70" required>
                </div>
                <br>
                  <!-- FILE IMAGEM_CRUZEIRO-->
                  <br>
            <label for="imagem_cruzeiro">Imagem do Cruzeiro:</label>
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
                        <textarea class="ckeditor" name="cruzeiro_descri" id="cruzeiro_descri" cols="30" rows="5" placeholder="Digite os detalhes do Cruzeiro"></textarea>

                    </div>
                    <br>
                <!-- VALOR VIAGEM -->
            <label for="valor_viagem">Valor:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                        </span>
                        <input class="form-control" type="number" name="valor_viagem" id="valor_viagem" min="0" step="0.01">
                    </div>
                <!-- DATA VIAGEM -->
            <label for="data_embarque">Data de Embarque:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        </span>
                        <input class="form-control" type="date" name="data_embarque" id="data_embarque" maxlength="10">
                    </div>
            <!-- DATA VIAGEM -->
            <label for="data_desembarque">Data de Desembarque:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        </span>
                        <input class="form-control" type="date" name="data_desembarque" id="data_desembarque" maxlength="10">
                    </div>
                <br>

             <!-- video_yt -->
             <label for="video_yt">Vídeo do Youtube:</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        </span>
                        <input class="form-control" type="text" name="video_yt" id="video_yt" maxlength="50">
                    </div>
                <br>


                <!-- BOTÃO CADASTRAR -->
            <input class="btn btn-primary btn-block" role="button" type="submit" value="Cadastrar" name="enviar" id="enviar">
            </form>
        </div>
    </div>
</div>
</main>
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
                    var imagem = document.getElementById("imagemcruzeiro");
                    imagem.src = data.target.result;
                    imagem.style.display = "block";
                }
                obj.readAsDataURL(this.files[0]);
            }
        }
</script>
<!-- Link arquivos Bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
<?php mysqli_free_result($lista_fk); ?>