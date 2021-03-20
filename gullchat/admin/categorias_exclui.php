<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_viagens.php");
// Definindo o USE do banco de dados
mysqli_select_db($conn_viagens,$database_conn);
// Definndo e recebendo dados para consulta
$tabela_delete  ="tbcategorias";
$id_tabela_del  ="id_categoria";
$id_filtro_del = $_GET['id_categoria'];
// SQL para exclusão
$deleteSQL  =   "DELETE 
                 FROM ".$tabela_delete."
                 WHERE ".$id_tabela_del."=".$id_filtro_del."";
$resultado  = $conn_viagens->query($deleteSQL);
// Após a ação a página será redirecionada
$destino    = "categorias_lista.php";
if(mysqli_insert_id($conn_viagens)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};
?>