<?php

include("../conecta.php");


$id = $_POST['id']; ;
$nome = strtolower($_POST['nome']);
$email = strtolower($_POST['email']);
$cpf_cnpj = $_POST['cpf_cnpj']; 
$fixo = $_POST['fixo']; 
$celular = $_POST['celular']; 
$cep = $_POST['cep']; 
$rua = strtolower($_POST['rua']); 
$numero = $_POST['numero']; 
$complemento = strtolower($_POST['complemento']);
$cidade = strtolower($_POST['cidade']);
$estado = strtolower($_POST['estado']);
$bairro = strtolower($_POST['bairro']);
$tipo = strtolower($_POST['tipo']);
$situacao = $_POST['situacao'];
$orcamento = strtolower($_POST['orcamento']);


$atualiza = "UPDATE clientes set nome='$nome', email='$email', cpf_cnpj='$cpf_cnpj', fixo='$fixo', celular='$celular', cep='$cep',
             rua='$rua', numero='$numero', complemento='$complemento', cidade='$cidade', estado='$estado', bairro='$bairro', tipo='$tipo', orcamento='$orcamento' WHERE id = $id"; 

if (!mysqli_query($conecta, $atualiza)) {
    echo "Error: " . $atualiza . "<br>" . mysqli_error($conecta);
};

mysqli_close($conecta);
header('location:../lista.php');

?>