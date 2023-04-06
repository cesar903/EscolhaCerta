<?php
include("../conecta.php");

$id = $_GET['id'];
$sql = "DELETE FROM clientes WHERE id=$id";

if (!mysqli_query($conecta, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conecta);
};

mysqli_close($conecta);

header('location:../lista.php');

?>