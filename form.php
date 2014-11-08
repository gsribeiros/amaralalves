<html>
<head>
<title>Gravando e exibindo uma imagem diretamente
do MySQL 5</title>
</head>

<body bgcolor="#FFFFFF">
<h2> Gravando imagem no banco de dados MySQL 5</h2>

<?php

include('cls/cls_conexao.php');
$con = new Conexao();
$con->conecta();
if($_POST) {




$pFoto = $_FILES["txtFoto"]["tmp_name"];
$pNome = $_FILES["txtFoto"]["name"];
$pTipo = $_FILES["txtFoto"]["type"];
echo "*** $pFoto *** $pNome **** $pTipo **<br>";


$TamanhoImg = filesize($pFoto); 
$mysqlImg = addslashes(fread(fopen($pFoto, "r"), $TamanhoImg));


$sql="INSERT INTO fotos (ftfoto,fttipo) VALUES('".$mysqlImg."', '".$pTipo."')";

mysql_query($sql);
 
}

 ?>
<form name="frmFoto" method="post"
enctype="multipart/form-data">
<table border="0" cellpading="0"
cellspacing="0" width="95%">
<tr>
<td height="50">Foto:</td>
<td><input type="file" name="txtFoto"
size="35"></td>
</tr>

<tr>
<td colspan="2">
<input type="submit" name="Enviar"></td>
</tr>
</table>
</form>
<?php


$result=mysql_query("SELECT ftid, ftfoto, fttipo FROM fotos") ;
while ($row = mysql_fetch_row($result)) { 
$id = $row[0]; 
  $bytes = $row[1]; 
  $tipo = $row[2]; 
  echo "<img src='foto.php?id=".$id."'
width='100' height='100' border='1'>";
  
}


?>
</body>
</html>