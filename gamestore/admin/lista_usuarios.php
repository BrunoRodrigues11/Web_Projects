<?php
    include("../Connections/conn_gamestore.php");
    mysqli_select_db($conn_gamestore,$database_conn);
    $consulta = "SELECT * FROM tbusuarios ORDER BY login_usuario ASC";
    $lista = $conn_gamestore->query($consulta);
    $row = $lista->fetch_assoc();
    $totalRows = ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários - Lista</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body class="">
<?php include('menu.php')?>
    <main class="container">
        <h1 class="breadcrumb alert-info">Lista dos Usuários</h1>
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
            <table class="table table-hover table-condensed">
                <!-- thead>tr>th*8 -->
                <thead> 
                    <tr>
                        <th class="hidden">ID</th> 
                        <th>LOGIN</th>
                        <th>NÍVEL</th>
                        <th>OPÇÕES</th>
                    </tr>
                </thead>
                <!-- tbody>tr>td*8 -->
                <tbody>
                <?php do { ?>
                    <tr>
                        <td class="hidden"><?php echo $row["id_usuario"]; ?></td>
                        <td>
                            <?php echo $row["login_usuario"]; ?>
                        </td>
                        <td>
                        <?php 
                            if($row['nivel_usuario']=='com'){
                                echo ("<span class='glyphicon glyphicon-user text-info' aria-hidden='true'></span>");
                            }else
                            if($row['nivel_usuario']=='sup'){
                                echo ("<span class='glyphicon glyphicon-sunglasses text-info' aria-hidden='true'></span>");
                            }
                            ?> 
                        </td>
                        <td>
                            <a href="altera_usuario.php?id_usuario=<?php echo $row['id_usuario'];?>" target="_self" class="btn btn-warning btn-block " role="button">
                                <span class="hidden-xs">ALTERAR</span>
                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                            </a>
                        <button data-nome="<?php echo $row['login_usuario']; ?>" data-id="<?php echo $row['id_usuario']; ?>" class="delete btn btn-danger btn-block ">
                                <span class="hidden-xs">EXCLUIR</span> 
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>                                                                       
                        </td>
                    </tr>
                <?php } while ($row = $lista->fetch_assoc()); ?>
                </tbody>
            </table>
        </div>
    </main>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-danger">ATENÇÂO!</h4>
            </div>
            <div class="modal-body">
                Deseja mesmo EXCLUIR o item?
                <h4><span class="nome text-danger"></span></h4>        
            </div>
            <div class="modal-footer">
                <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
                <button class="btn btn-success" data-dismiss="modal">Cancelar</button>
            </div>
        </div>            
    </div>
</div>
<!-- Link arquivos bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Script para modal -->
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('nome');
        var id = $(this).data('id');
        $('span.nome').text(nome);
        $('a.delete-yes').attr('href','exclui_usuarios.php? id_usuario=' +id);
        $('#myModal').modal('show');
    });
</script>
</body>
</html>
<?php mysqli_free_result($lista);?>