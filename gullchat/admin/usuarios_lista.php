<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_viagens.php");
// Selecionar o banco de dados
mysqli_select_db($conn_viagens,$database_conn);
// Selecionar os dados
$consulta = "SELECT * FROM tbusuarios ORDER BY login_usuario ASC";
$lista = $conn_viagens->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = ($lista)->num_rows;
?>
<html lang="pt-br">
<head>
<title>GullChat - Lista de Usuários</title>
<meta charset="utf-8">
<!-- Link arquivos Bootstrap css -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/meuestilo.css" rel="stylesheet"> -->
<link rel="shortcut icon" href="svg/favicon.ico"/>
</head>
<body class="fundo fonteBranca">
<?php include ('menu_adm.php'); ?>
<main class="container">

    <!-- Abertura da DIV de dimensionamento da tabela -->
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
    <h1 style="color:#00D646" class="breadcrumb fundoCard text-center">Lista de Usuários</h1>   
    <table class="table table-bordered fundoCard">
        <!-- thead>tr>th*4 -->
        <thead><!-- cabeçalho da tabela -->
            <tr>
                <th class="hidden">ID</th><!-- cabeça da coluna -->
                <th class="text-center">LOGIN</th>
                <th class="text-center">NÍVEL</th>
                <th>
                    <a href="usuarios_insere.php" target="_self" class="btn btn-block btn-primary" role="button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span class="hidden-xs">ADICIONAR<br></span>
                    </a>
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*3 -->
        <tbody><!-- corpo da tabela -->
            <?php do { ?>
            <tr><!-- Linha da tabela -->
                <!-- Insira os dados determinando a linha e o campo -->
                <td class="hidden"><?php echo $row['id_usuario'] ?></td>
                <td class="text-center"><?php echo $row['login_usuario'] ?></td>
                <td class="text-center">
                   <?php 
                      if($row['nivel_usuario']=='com'){
                          echo ("<span class='glyphicon glyphicon-user' aria-hidden='true'></span>");
                      }else if($row['nivel_usuario']=='sup'){
                          echo ("<span class='glyphicon glyphicon-tower text-default' aria-hidden='true'></span>");
                      };
                    ?>
                    <?php echo $row['nivel_usuario'] ?>
                </td>
                <td>
                    <a href="usuarios_atualiza.php?id_usuario=<?php echo $row['id_usuario']; ?>" target="_self" class="btn btn-warning btn-block" role="button">
                        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                        <span class="hidden-xs">ALTERAR<br></span>
                    </a>
                    <button data-nome="<?php echo $row['login_usuario']; ?>" data-id="<?php echo $row['id_usuario']; ?>" class="delete btn btn-danger btn-block">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        <span class="hidden-xs">EXCLUIR<br></span>
                    </button>
                </td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
            <!-- Fecha a estrutura de repetição -->
        </tbody>
    </table>
    </div>
    <!-- Fecha da DIV de dimensionamento da tabela -->
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
                <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
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
        var nome    = $(this).data('nome');
        var id      = $(this).data('id');
        $('span.nome').text(nome);
        $('a.delete-yes').attr('href','usuarios_exclui.php?id_usuario='+id);
        $('#myModal').modal('show');
    });
</script>
</body>
</html>
<?php mysqli_free_result($lista); ?>