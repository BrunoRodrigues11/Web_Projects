<?php
    // Incluir o arquivo e fazer a conexão
    include("../Connections/conn_gamestore.php");
    // Selecionar os dados

    // Definindo USE do banco de dados
    mysqli_select_db($conn_gamestore,$database_conn);

    // Definindo e recebendo dados para consulta
    $tabela_delete  = "tbusuarios";
    $id_tabela_del  = "id_usuario";
    $id_filtro_del = $_GET['id_usuario'];

    // SQL para exclusão
    $deleteSQL  = "DELETE
                    FROM ".$tabela_delete." 
                    WHERE ".$id_tabela_del."=".$id_filtro_del."";
    $resultado  =   $conn_gamestore->query($deleteSQL);

     // Após a ação a página será redirecionada
     $destino    = "lista_usuarios.php";
     if(mysqli_insert_id($conn_gamestore)){
         header("Location: $destino");
     }else{
         header("Location: $destino");
     };
?>