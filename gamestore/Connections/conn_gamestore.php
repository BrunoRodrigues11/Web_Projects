<?php
// Definindo variáveis para conexão
$hostname_conn = "localhost";
$database_conn = "gamesstore";
$username_conn = "admin";
$password_conn = "batata02";
$charset_conn = "utf8";

// Definindo parâmetros da conexão
$conn_gamestore = new mysqli($hostname_conn, $username_conn, $password_conn, $database_conn);

// Definindo o cojunto de caracteres da conexão
mysqli_set_charset($conn_gamestore,$charset_conn);

// Verificando possíveis erros na conexão
if($conn_gamestore->connect_error){
    echo "Error: ".$conn_gamestore->connect_error;
};
// Não deixar espaço vazio depois do fechamento do PHP causa erro HEADER
?>