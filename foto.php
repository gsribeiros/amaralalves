<?php
include('cls/cls_conexao.php');
$con = new Conexao();
$con->conecta();
//RECEBE PARÂMETRO 
$id = $_GET["id"];

//CONECTA AO MYSQL 


//EXIBE IMAGEM 
$sql = mysql_query( "SELECT ftfoto,fttipo FROM fotos WHERE ftid = ".$id."");

$row = mysql_fetch_array($sql,MYSQLI_ASSOC); 
$tipo = $row["fttipo"]; 
$bytes = $row["ftfoto"];

//EXIBEIMAGEM 
header("Content-type: ".$tipo."");

echo $bytes;
?>