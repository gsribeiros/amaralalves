<?php include('topo.php');?>
    
    <!-- Ativando o jQuery lightBox plugin -->
    <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
   	<style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	
	</style>

<?php
		$sql = "SELECT `obtitulo`, `obdescricao` FROM obras where obid=".$_GET['id'];
		$result= mysql_query( $sql);
		$gareria=$titlulo=$descr="";
		$row = mysql_fetch_array($result); 
			
			$titlulo=$row['obtitulo'];
			$descr=$row['obdescricao'];
		echo "<p class='titulo'>$titlulo </p>";
		echo "<br>";
		
		?>

<div id="gallery">
    <ul>
	
		
        <?php 
		echo "<p>$descr </p>";
		$sql = "SELECT `ftid` FROM `fotos`  where ftobra=".$_GET['id'];
		$result= mysql_query( $sql);
		
		while ($row = mysql_fetch_array($result)) { 
			
			echo "<li>
            <a href='foto.php?id=".$row['ftid']."' ><img src='foto.php?id=".$row['ftid']."' /></a>
			</li>";
		
		}?>
    </ul>
</div>

<?php include('rodape.php');?>