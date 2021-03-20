<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_viagens.php");

// Definindo o USE do Banco de Dados
mysqli_select_db($conn_viagens,$database_conn);

// Definindo e recebendo os dados para consulta
$tabela_delete  = "tbusuarios";
$id_tabela_del  = "id_usuario";
$id_filtro_del  =  $_GET['id_usuario'];

// SQL para exclusão
$deleteSQL  =   "DELETE
                FROM ".$tabela_delete."
                WHERE ".$id_tabela_del."=".$id_filtro_del."";
$resultado  =   $conn_viagens->query($deleteSQL);

// Redirecionamento da página após a ação
$destino    =   "usuarios_lista.php";
if(mysqli_insert_id($conn_viagens)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};
?> 