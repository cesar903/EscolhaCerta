<?php

include("conecta.php");
$id = $_GET['id'];

$consulta = "SELECT * FROM clientes WHERE id = $id"; 
$con = mysqli_query($conecta, $consulta);
$dado = $con->fetch_array();

if($dado['situacao'] == 0){
    $pesquisa = "UPDATE clientes set situacao = 1 WHERE id = $id"; 

    if (!mysqli_query($conecta, $pesquisa)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conecta);
    };
}

if($dado['situacao'] == 1){
    $pesquisa = "UPDATE clientes set situacao = 0 WHERE id = $id"; 

    if (!mysqli_query($conecta, $pesquisa)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conecta);
    };
}

mysqli_close($conecta);

header('location:lista.php');
?>