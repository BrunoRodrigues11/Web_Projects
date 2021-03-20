<?php
// Incluir o arquvo e fazer a conexão
include("../Connections/conn_viagens.php");
// Selecionar os dados
$consulta = "SELECT * FROM vw_tbviagens ORDER BY destaque_viagem ASC, resumo_viagem ASC";
// Fazer uma lista completa com os dados
// -> = envia
$lista = $conn_viagens->query($consulta);
// Separar os dados em lihas
// fetch_assoc = pega o codigo e separa por linha
$row = $lista->fetch_assoc();
// Contar o total de linhas
$totalRows = ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title> GullChat - Lista de Viagens</title>
<!-- <link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/meuestilo.css" rel="stylesheet"> -->
<link rel="shortcut icon" href="../svg/favicon.ico"/>
</head>
<body class="fundo fonteBranca">
<?php include ('menu_adm.php'); ?>
   <!-- Botão Up Flutuante -->
   <div class="btn-up jbtnup">
    <nav>
      <a href="" class="btn-up-link jbtnuplink"></a>
    </nav>
  </div>
<main>
<h1 style="color:#00D646;" class="breadcrumb fundoCard text-center">Viagens</h1>
<div class="col-md-12">
    <table class="table table-bordered fundoCard">
        <!-- thead>tr>th*8 -->
        <thead><!-- cabeçalho da tabela -->
            <tr>
                <th class="hidden">ID</th><!-- cabeça da coluna -->
                <th class="text-center">CATEGORIA</th>
                <th class="text-center">LOCAL</th>
                <th class="text-center hidden-sm hidden-xs">RESUMO</th>
                <th class="text-center">CRUZEIRO</th>
                <th class="text-center hidden-sm hidden-xs">DESCRI CRUZEIRO</th>
                <th class="text-center">VALOR</th>
                <th class="text-center">EMBARQUE</th>
                <th class="text-center">DESEMBARQUE</th>
                <th>
                    <a href="viagens_insere.php" target="_self" class="btn btn-block btn-primary " role="button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span class="hidden-xs">ADICIONAR<br></span> 
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*8 -->
        <tbody><!-- corpo da tabela -->
        <?php do {?> <!-- abre a estrutura de repetição -->
            <tr>
                <!-- Insira os dados determinando a linha e o campo -->
                <td class="hidden"><?php echo $row['id_viagem'];?></td>
                <td>
                    <span class="visible-xs"><?php echo $row['sigla_categoria']; ?></span>
                    <span class="hidden-xs"><?php echo $row['viagem_categoria'];?></span>
                </td>
                <td>
                    <?php 
                        if($row['destaque_viagem']=='Sim'){
                            echo ("<span class='glyphicon glyphicon-star' aria-hidden='true'></span>");
                        }
                    ?>
                    <?php echo $row['local_viagem'];?>
                    <span class="hidden-xs hidden-sm"><img src="../imagens/<?php echo $row['imagem_viagem'];?>"
                alt="<?php echo $row['local_viagem'];?>" width="200px"></span>
                    <span class="visible-xs visible-sm"><img src="../imagens/<?php echo $row['imagem_viagem'];?>"
                alt="<?php echo $row['local_viagem'];?>" width="75px"></span>
                </td>


                <td class="hidden-xs hidden-sm"><?php echo mb_strimwidth($row['resumo_viagem'],0,150,'...');?></td>
                
                
                <td class="text-center">
                    <?php echo $row['cruzeiro_viagem'];?>
                    <span class="hidden-xs hidden-sm"><img src="../imagens/<?php echo $row['imagem_cruzeiro'];?>" alt="<?php echo $row['cruzeiro_viagem'];?>" width="200px"></span>
                    <span class="visible-xs visible-sm"><img src="../imagens/<?php echo $row['imagem_cruzeiro'];?>" alt="<?php echo $row['cruzeiro_viagem'];?>" width="75px"></span>                
                </td>


                <td class="hidden-xs hidden-sm"><?php echo mb_strimwidth($row['cruzeiro_descri'],0,150,'...');?></td>
                

                <td class="text-center"><?php echo number_format($row['valor_viagem'],2,',','.');?></td>
                <td class="text-center"><?php echo $row['data_embarque'];?></td>
                <td class="text-center"><?php echo $row['data_desembarque'];?></td>

            
                <td> <a href="viagens_atualiza.php?id_viagem=<?php echo $row['id_viagem'];?>" target="_self" class="btn btn-warning btn-block" role="button">
                <span class=" glyphicon glyphicon-refresh"></span>
                <span class="hidden-xs">ATUALIZAR<br></span>
                </a> 
                <button class="btn btn-danger btn-block delete" data-nome="<?php echo $row['local_viagem']; ?>" data-id="<?php echo $row['id_viagem']; ?>">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                    <span class="hidden-xs">EXCLUIR<br></span>
                </button>
                </td>
            </tr>
        <?php } while ($row = $lista->fetch_assoc()); ?> <!-- fecha a estrutura de repetição -->
        </tbody>
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
        $('a.delete-yes').attr('href','viagens_exclui.php?id_viagem='+id); // mudar dinamicamente o id do link no botão confirmar
        $('#myModal').modal('show'); // Modal abre
    });
</script>
</body>
</html>
<?php mysqli_free_result($lista); ?>