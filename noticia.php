<?php header("Content-Type: text/html; charset=ISO-8859-1", true);
include('cls/cls_conexao.php');
include('cls/funcoes.php');
$con = new Conexao();
$con->conecta();


$sql = "SELECT ntid, nttitulo, nttexto, ntdata, ftid  
		FROM noticias 
		left join fotos on ftnoticia=ntid
		where ntid=".$_GET['id'];
		$result= mysql_query( $sql);
		$img="";
		$row = mysql_fetch_array($result);
		if ($row['ftid']!= NULL)$img="<img src='foto.php?id=".$row['ftid']."'>";
		
		echo "<p class='data'><font>".formata_data($row['ntdata'])."</font></p>
		<p class='titulo'>".$row['nttitulo']."</p>
		$img
			 <p> ".$row['nttexto']."
			".formata_data($row['ntdata'])."</p>";
?>
