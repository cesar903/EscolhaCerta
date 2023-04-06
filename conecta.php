<?php

$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "bd_clientes"; 

$conecta = mysqli_connect($host, $user, $pass, $db); 

// Check connection
if (!$conecta) {
    die("Conexao falou: " . mysqli_connect_error());
}


?>