<?php

include("../conecta.php");

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
$situacao = 1;
$orcamento = strtolower($_POST['orcamento']);


date_default_timezone_set('America/Sao_Paulo');
$hoje = date('Y-m-d H:i:s a', time()); 



$sql = "INSERT INTO clientes (nome, email, cpf_cnpj, fixo, celular, cep, rua, numero, complemento, cidade, estado, bairro, hora_data, situacao, orcamento, tipo) 

    VALUES('$nome', '$email', '$cpf_cnpj', '$fixo', '$celular', '$cep', '$rua', '$numero', '$complemento', '$cidade', '$estado', '$bairro', '$hoje', '$situacao', '$orcamento', '$tipo')"; 

if (!mysqli_query($conecta, $sql)) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conecta);
};

mysqli_close($conecta);

echo '<script type="text/javascript">self.location.href="../contatos.php?conf=ok";</script>';

?> 