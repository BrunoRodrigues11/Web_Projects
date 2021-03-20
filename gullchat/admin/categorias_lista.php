<?php 
// CONEXÃO
include("../Connections/conn_viagens.php");
// CONSULTAR OS DADOS
$consulta = "SELECT * FROM tbcategorias ORDER BY viagem_categoria ASC";
// LISTAR OS DADOS
$lista    = $conn_viagens->query($consulta);
// SEPARAR OS DADOS EM LINHAS
$row      = ($lista)->fetch_assoc();
// TOTAL DE LINHAS
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GullChat - Categorias de Viagens</title>
    <!-- <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/meuestilo.css" rel="stylesheet"> -->
    <link rel="shortcut icon" href="../svg/favicon.ico"/>
</head>
<body class="fundo fonteBranca">
<?php include ('menu_adm.php'); ?>
<main class="container">
<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
    <h1 class="breadcrumb fundoCard text-center fonteVerde">Categorias</h1>
    <table class="table table-bordered fundoCard">
        <thead>
            <tr>
                <th class="hidden">ID</th>
                <th class="text-center">CATEGORIA</th>
                <th class="text-center">SIGLA</th>
                <th>
                    <a href="categorias_insere.php" target="_self" class="btn btn-block btn-primary " role="button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
                        <span class="hidden-xs">ADICIONAR<br></span>
                </th>
            </tr>
        </thead>
        <tbody>
        <?php do {?>
        <td class="hidden"><?php echo $row['id_categoria'];?></td>
        <td class="text-center"><?php echo $row['viagem_categoria'];?></td>
        <td class="text-center"><?php echo $row['sigla_categoria'];?></td>

        <td> <a href="categorias_atualiza.php?id_categoria=<?php echo $row ['id_categoria']; ?>" target="_self" class="btn btn-warning btn-block" role="button">
                <span class=" glyphicon glyphicon-refresh"></span>
                <span class="hidden-xs">ATUALIZAR<br></span>
                </a> 
                <button class="btn btn-danger btn-block delete" data-nome="<?php echo $row['viagem_categoria']; ?>" data-id="<?php echo $row['id_categoria']; ?>"> 
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    <span class="hidden-xs">EXCLUIR<br></span>
                </button>
            </td>
        </tbody>
        <?php } while ($row = $lista->fetch_assoc()); ?>
    </table>
    </div>
</main>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-danger">ATENÇÃO!</h4>
                </div>
                <div class="modal-body">
                    Deseja mesmo EXCLUIR o item?
                    <h4><span class="nome text-danger"></span></h4>
                </div>
                <div class="modal-footer">
                    <a href="#" type="button" class="btn btn-danger delete-yes">
                        Confirmar
                    </a>
                    <button class="btn btn-success" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
</div>
<!--  Link arquivos Bootstrap js 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script> -->

<!-- Script para o Modal -->
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome'); // Buscar o valor do atributo data-nome
        var id   = $(this).data('id'); // Buscar o valor do atributo data-id
        $('span.nome').text(nome); // Inserir o nome do produto na pergunta de confirmação
        $('a.delete-yes').attr('href','categorias_exclui.php?id_categoria='+id); // mudar dinamicamente o id do link no botão confirmar
        $('#myModal').modal('show'); // Modal abre
    });
</script>
</body>
<?php mysqli_free_result($lista); ?>