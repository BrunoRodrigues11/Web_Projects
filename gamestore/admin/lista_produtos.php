<?php
    // Incluir o arquivo e fazer a conexão
    include("../Connections/conn_gamestore.php");
    // Selecionar os dados
    $consulta = "SELECT * FROM vw_tbprodutos ORDER BY favorito_produto ASC, descri_produto ASC";
    // Fazer a lista completa dos dados
    $lista = $conn_gamestore->query($consulta);
    // Separar os dados em linhas(row)
    $row = $lista->fetch_assoc();
    // Contar o total de linhas
    $totalRows = ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos - Lista</title>
    <!-- Link arquivos Bootstrap css -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
</head>
<body class="">
<?php include('menu.php')?>
    <main class="container">
        <h1 class="breadcrumb alert-danger">Lista de Produtos</h1>
        <table class="table table-hover table-condensed tbopacidade">
            <thead> <!-- Cabeçalho da tabela -->
                <tr>
                    <th class="hidden">ID</th> <!-- Cabeça da coluna -->
                    <th>TIPO</th>
                    <th>DESCRIÇÃO</th>
                    <th>MARCA</th>
                    <th>RESUMO</th>
                    <th>VALOR</th>
                    <th>IMAGEM</th>
                    <th>
                        <a href="insere_produtos.php" target="_self" class="btn btn-block btn-primary" role="button">
                            <span class="hidden-xs">ADICIONAR <br> </span>
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </a> 
                    </th>
                </tr>
            </thead>
            <!-- tbody>tr>td*8 -->
            <tbody><!-- Corpo da tabela -->
            <!-- Abre a estrutursa de repetição -->
            <?php do { ?>
                <tr><!-- Linha da tabela -->
                    <!-- Insira os dados determinando a linha e o campo -->
                    <td class="hidden"><?php echo $row["id_produto"]; ?></td>
                    <td>
                        <span class="visible-xs"><?php echo $row["sigla_tipo"];?></span>
                        <span class="hidden-xs"><?php echo $row["rotulo_tipo"];?></span>
                    </td>>
                    <td>
                        <?php 
                            if($row['favorito_produto']=='Sim'){
                                echo ("<span class='glyphicon glyphicon-heart text-danger' aria-hidden='true'></span>");
                            }else
                            if($row['favorito_produto']=='Não'){
                                echo ("<span class='glyphicon glyphicon-heart-empty text-danger' aria-hidden='true'></span>");
                            }
                            ?>
                        <?php echo $row["descri_produto"]; ?></td>
                    <td><?php echo $row["marca_produto"]; ?></td>
                    <td><?php echo $row["resumo_produto"]; ?></td>
                    <td><?php echo number_format($row["valor_produto"],2,',','.');?></td>
                    <!-- Para exibir a imagem, insira em src o diretório que está armazenado e a variável com seu nome -->
                    <td>
                        <img src="../img/<?php echo $row["imagem_produto"]; ?>" alt="<?php echo $row["descri_produto"]; ?>" width="100px">
                    </td>
                    <td>
                        <a href="altera_produtos.php?id_produto=<?php echo $row['id_produto']; ?>" target="_self" class="btn btn-warning btn-block btn-xs" role="button">
                        <span class="hidden-xs">ALTERAR <br> </span> 
                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>                            
                        </a> 
                        <button class="btn btn-danger btn-block btn-xs delete" 
                        data-nome="<?php echo $row['descri_produto'];?>" data-id="<?php echo $row['id_produto'];?>">
                            <span class="hidden-xs">EXCLUIR <br> </span> 
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </button>
                    </td>
                </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
            <!-- Fecha a estrutursa de repetição -->
            </tbody>
        </table>
    </main>
<!-- Modal -->
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
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
            </div>
        </div>            
    </div>
</div>

<!-- Link arquivos bootstrap js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Script para modal -->
<script type="text/javascript">
   $('.delete').on('click',function(){
        // buscar o valor do atributo data-nome
        var nome    = $(this).data('nome');
        // buscar o valor do atributo data-id
        var id      = $(this).data('id');
        // inserir o nome do item a pergunta de confirmação
        $('span.nome').text(nome);
        // mudar dinâmicamente o id do link no botão confirmar
        $('a.delete-yes').attr('href','exclui_produtos.php?id_produto=' +id);
        // modal abre
        $('#myModal').modal('show');
    });
</script>
</body>
</html>
<?php 
    mysqli_free_result($lista);
?>