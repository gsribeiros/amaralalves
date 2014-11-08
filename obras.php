<?php include('topo.php');?>

<div id='clgaleria'>
<?php /*
$sql="SELECT  c.ctid ,  ctdescri 
FROM  categoria c
join obras o on c.ctid=o.ctid
group by c.ctid
ORDER BY ctdescri";
$result=mysql_query($sql) ;
while ($row = mysql_fetch_array($result)) { 
  echo "<a href='obras.php?c=".$row['ctid']."'>".$row['ctdescri']."</a><br>";
  
}*/
?>
</div>

<div id='obgaleria'>
<?php 
$condicao=""; 
if(isset($_GET['c'])){$condicao=" WHERE ctid=".$_GET['c']; }
$sql="SELECT obid, obtitulo, obdescricao, ftid, obstatus FROM obras $condicao
order by obid desc";
$result=mysql_query($sql) ;

while ($row = mysql_fetch_array($result)) { 

	if($row['obstatus']=='0'){$and="class='andamento'";}
	else $and="";
  echo "<a href='galeria.php?id=".$row['obid']."' onMouseMove='mostratitulo(".$row['obid'].")' onMouseOut='escondetitulo(".$row['obid'].")'><img $and src='foto.php?id=".$row['ftid']."'><div class='tituloimg' id='".$row['obid']."'>".$row['obtitulo']."</div></a>";
  
}
?>
</div>


<?php include('rodape.php');?>
