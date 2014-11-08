<?
$user="user";
$pass="";
$bd="bdcosplay";

$conn = mysql_connect("localhost", $user,$pass, $bd) or die("Erro na conexão com o BD");

$id = $_GET["id"];

 
$conn = mysql_connect("localhost", "usuario",
"senha", "base de dados ");

 
$sql = mysql_query($conn, "SELECT foto,tipo FROM
fotos WHERE id = ".$id."");

$row = mysql_fetch_array($sql,MYSQLI_ASSOC); 
$tipo = $row["tipo"]; 
$bytes = $row["foto"];

header("Content-type: ".$tipo."");

echo $bytes;
?>