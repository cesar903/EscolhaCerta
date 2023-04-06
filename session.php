<?php
session_start() or die('A sessão não pode ser iniciada');

include('conecta.php');

$login = $_POST['email'];
$senha = $_POST['senha'];

$sql = mysqli_query($conecta,"SELECT * FROM administrador WHERE adm='$login' AND senha='$senha'");
$num_row = mysqli_num_rows($sql);

if($num_row > 0){

		$_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location:lista.php');
	
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:login.php?log=ok');
    
    }
    

?>


