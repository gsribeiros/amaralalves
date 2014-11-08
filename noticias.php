<?php include('topo.php');

if(isset($_POST['busca'])){

$busca=$_POST['busca'];
$fbusca=str_replace(' ','%',$busca);
$qbusca="where nttitulo like '%$fbusca%' or nttexto like '%$fbusca%'";
}else{
$busca="";
$qbusca="";
}

?>
<div id='faixa6'>
<form method='post' class='noticia'> 

<input type='text' name='busca' value='<?=$busca?>'> <input type='submit' value='Buscar'>
</form>

<div id='clnoticias'>
<?php
$sql = "SELECT YEAR( ntdata) as ano FROM noticias $qbusca group by ano order by ano desc";
		$result= mysql_query( $sql);

		while ($row = mysql_fetch_array($result)) {
			echo "<ul id='".$row['ano']."' onClick='' > 
			      <a href='' onClick='menunoticia(\"".$row['ano']."\"); return false; '>".$row['ano']."</a>";
			$sql2="SELECT ntdata, ntid FROM noticias Where YEAR( ntdata)='".$row['ano']."' order by ntdata desc";
			$result2= mysql_query( $sql2);

			while ($row2 = mysql_fetch_array($result2)) {
				echo "<li class='lim".$row['ano']."' onClick='noticia(".$row2['ntid'].")'> 
				        <a href='' onClick='return false;'>".formata_data($row2['ntdata'])."</a>
					  </li>";
			
			}
			echo "</ul>";
		}
?>
</div>
 </div>   
<div id='noticia'>
<?php
if(isset($_GET['id'])){
 $sql = "SELECT ntid, nttitulo, nttexto, ntdata, ftid  
		FROM noticias 
		left join fotos on ftnoticia=ntid
		where ntid=".$_GET['id'];
		
}
else {
$sql = "SELECT ntid, nttitulo, nttexto, ntdata, ftid  
		FROM noticias 
		left join fotos on ftnoticia=ntid
		order by ntid desc limit 1";
}
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
</div>
<?php include('rodape.php');?>
