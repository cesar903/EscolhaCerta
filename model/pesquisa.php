<?php
$procura =$_POST['procura'];

if($procura == ""){
    header("location:../lista.php");
}else{
    header("location:../lista.php?procura=$procura");
}
?>