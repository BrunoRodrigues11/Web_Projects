<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_gamestore.php");

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_gamestore,$database_conn);
    
    // Variáveis para acrescentar dados ao banco
    $tabela_insert   = "tbprodutos";
    $campos_insert  = "id_tipo_produto, favorito_produto, descri_produto, marca_produto, resumo_produto, valor_produto, imagem_produto";
    
    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $id_tipo_produto = $_POST['id_tipo_produto'];
    $favorito_produto = $_POST['favorito_produto'];
    $descri_produto = $_POST['descri_produto'];
    $marca_produto  =$_POST['marca_produto'];
    $resumo_produto = $_POST['resumo_produto'];
    $valor_produto = $_POST['valor_produto'];
    $imagem_produto = $_FILES['imagem_produto']['name'];
    
    // Reunir os valores a serem inseridos
    $valores_insert = "'$id_tipo_produto','$favorito_produto','$descri_produto','$marca_produto','$resumo_produto','$valor_produto ','$imagem_produto'";
    
    // Consulta SQL para inserção dos dados
    $insertSQL  =   "INSERT INTO ".$tabela_insert."                 
                        (".$campos_insert.")
                    VALUES 
                        (".$valores_insert.")";
    $resultado  = $conn_gamestore->query($insertSQL);
    
    // Após a ação a página será redirecionada
    $destino    = "lista_produtos.php";
    if(mysqli_insert_id($conn_gamestore)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };   
}

// Definindo o USE do banco de dados
mysqli_select_db($conn_gamestore,$database_conn);
// Selecionar os dados da chave estrangeira
$tabela_fk    = "tbtipos";
$ordenar_por  = "rotulo_tipo";
$consulta_fk  = "SELECT * 
                FROM ".$tabela_fk." 
                ORDER BY ".$ordenar_por." ASC";
$lista_fk     = $conn_gamestore->query($consulta_fk);
$row_fk       = $lista_fk->fetch_assoc();
$totalRows_fk = ($lista_fk)->num_rows;

// Para guardo nome da imagem no banco e o arquivo no diretório
if (isset($_POST['enviar'])){
    $nome_img   = $_FILES['imagem_produto']['name'];
    $tmp_img    = $_FILES['imagem_produto']['tmp_name'];
    $dir_img    = "../img/".$nome_img;
    move_uploaded_file($tmp_img,$dir_img);
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <title>Produtos - Insere</title>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body class="fundo">
<?php include('menu.php')?>
<main class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
    <h2 class="breadcrumb text-danger">
        <a href="lista_produtos.php">
            <button class="btn btn-danger" type="button">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </button>
        </a>
    Inserindo Produtos
    </h2>
    <div class="thumbnail">
        <div class="alert alert-danger" role="alert">
        <form name="form_produto_insere" id="form_produto_insere" action="insere_produtos.php" method="post" enctype="multipart/form-data">
        <!-- Select id_tipo_produto -->
        <label for="id_tipo_produto">Tipo:</label>
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> 
            </span>
        <!-- select>option*2 -->
            <select class="form-control" name="id_tipo_produto" id="id_tipo_produto" required>
                <!-- Abre a estrutura de repetição -->
                <?php do { ?>
                    <option value="<?php echo $row_fk['id_tipo']; ?>">
                        <?php echo $row_fk['rotulo_tipo']; ?>
                    </option>
                <?php } while ($row_fk = $lista_fk->fetch_assoc()); 
                $row_fk = mysqli_num_rows($lista_fk);
                if(rows_fk > 0){
                    mysqli_data_seek($lista_fk,0);
                    $row_fk = $lista_fk->fetch_assoc();
                }
                ?>
            <!-- Fecha a estrutura de repetição -->
            </select>
        </div>
        <br>
        <!-- Radio favorito_produto -->
        <label for="favorito_produto">Favorito?</label>
        <div class="input-group">
            <label class="radio-inline" for="favorito_produto_s">
                <input type="radio" name="favorito_produto" id="favorito_produto" value="Sim">Sim
            </label>
            <label class="radio-inline" for="favorito_produto_n">
                <input type="radio" name="favorito_produto" id="favorito_produto" value="Não" checked>Não
            </label>
        </div>
        <br>
        <!-- text descri_produto -->
        <label for="descri_produto">Descrição:</label>
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
            </span>
            <input class="form-control" type="text" name="descri_produto" id="descri_produto" placeholder="Digite o Título do Produto." maxlength="100" required>
        </div>
        <br>
        <!-- text marca_produto -->
        <label for="marca_produto">Marca:</label>
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
            </span>
            <input class="form-control" type="text" name="marca_produto" id="marca_produto" placeholder="Digite a marca do Produto." maxlength="100" required>
        </div>
        <br>
        <!-- textarea resumo_produto -->
        <label for="resumo_produto">Resumo:</label>
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            </span>
            <textarea class="form-control" name="resumo_produto" id="resumo_produto" cols="30" rows="8" placeholder="Digite os detalhes do produto."></textarea>
        </div>
        <br>
        <!-- number valor_produto -->
        <label for="valor_produto">Valor:</label>
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
            </span>
            <input class="form-control" type="number" name="valor_produto" id="valor_produto" min="0" step="0.01">
        </div>
        <br>
        <!-- file imagem_produto -->
        <label for="imagem_produto">Imagem:</label>
        <br>
        <img class="img-responsive" src="" alt="" name="imagem" id="imagem">
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-picture"></span>
            </span>
            <input class="form-control" type="file" name="imagem_produto" id="imagem_produto"
            onchange="visualizarImagem.call(this)">
        </div>
        <br>
        <!-- btn enviar -->
        <input class="btn btn-danger btn-block" role="button" type="submit" value="Cadastrar" name="enviar" id="enviar">
        </form>
        </div> 
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
<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista_fk); ?>