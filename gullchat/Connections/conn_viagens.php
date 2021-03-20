<?php
// VARIÁVEIS DE CONEXÃO
$hostname_conn  ="localhost";
$database_conn  ="iwane047_gullchat";
$username_conn  ="root";
$password_conn  ="";
$charset_conn   ="utf8";    
// DEFININDO PARÂMETROS DA CONEXÃO
$conn_viagens = new mysqli($hostname_conn, $username_conn, $password_conn, $database_conn);
// DEFININDO O CONJUNTO DE CARACTERES DA CONEXÃO
mysqli_set_charset($conn_viagens,$charset_conn);  
if($conn_viagens->connect_error){
        echo "Error: ".$conn_viagens->connect_error;
    };
?>