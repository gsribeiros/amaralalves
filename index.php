<?php include('topo.php');?>
  <!-- banner -->
	<script type="text/javascript" src="js/jquery_1.5/jquery.min.js"></script>
	<script type="text/javascript" src="js/chili-1.7.pack.js"></script>
	<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="sj/jquery.easing.1.3.js"></script>
	<script type="text/javascript">
	$.fn.cycle.defaults.timeout = 6000;
	$(function() {
		// run the code in the markup!
		$('table pre code').not('#skip,#skip2').each(function() {
			eval($(this).text());
		});
		
		$('#obras').before('<div id="nav" class="nav">').cycle({
			fx:     'fade',
			speed:  'fast',
			timeout: 3000,
			pager:  '#nav'
		});
		$('#clientes').cycle({
			fx:     'fade',
			speed:  300,
			timeout: 3000,
			pause:   1
		});
	});

	function onBefore() {
		$('#output').html("Scrolling image:<br>" + this.src);
		//window.console.log(  $(this).parent().children().index(this) );
	}
	function onAfter() {
		$('#output').html("Scroll complete for:<br>" + this.src)
			.append('<h3>' + this.alt + '</h3>');
	}
	</script>
	<!-- banner --> 

<div id="obras" class="pics">
       <?php
		
		$sql = "SELECT obid, ftid FROM obras
				where ftid is not  null and ftid <> 0
				ORDER BY obid DESC 
				LIMIT 5";
				// obstatus= 1 em andamento
				// obstatus= 0 concluida
		$result= mysql_query( $sql);

		while ($row = mysql_fetch_array($result)) { 
			echo "<a href='galeria.php?id=".$row['obid']."'>
			<img src='foto.php?id=".$row['ftid']."'></a>";
		}
		?>       
</div>
 <h3 class='clientesh' >Clientes</h3>
     <div id="clientes"  class="pics"> 
	 
		<img src="img/Logo-SpeedTech.jpg">
		<img src="img/Logo-Insinuante.jpg">
		<img src="img/Logo-Gutemburgo.jpg">
		<img src="img/DonaFormula_2013.jpg">
		<img src="img/logo-empada.jpg">
		<img src="img/logo-maquina.jpg">
		<img src="img/Track_Field.jpg">
		<img src="img/Abuela_Goye.jpg">
		<img src="img/VictorHugo.jpg">
		 
	 </div>
	 
    <div id="news"> 
		<h3>Novidades</h3>
	
		<?php
	 /*	$sqlI = "
		SELECT ntid, nttitulo, nttexto, ntdata, ftid
FROM noticias n
LEFT JOIN fotos f ON f.ftnoticia = n.ntid
where ntid=2
";
		$resultI= mysql_query( $sqlI);

		while ($rowI = mysql_fetch_array($resultI)) { 
			$img="";$tm=350;
			if ($rowI['ftid']!= null){
			$img="<div class='imagem' style='overflow: hidden;'><img src='foto.php?id=".$rowI['ftid']."'  width= '200' /></div>";
			$tm=240;}
			echo "
			<div class='noticia' > $img
				<p class='titulo'>".$rowI['nttitulo']." </p> 
				".substr($rowI['nttexto'], 0, $tm)."...
				<br> 
				
			</div>
			<font class='data'>".formata_data($rowI['ntdata'])."</font> <a href='noticias.php?id=".$rowI['ntid']."' class='saibamais'> Saiba mais... </a>";
			
		}*/
		//******************************************************
		$sql = "SELECT ntid, nttitulo, nttexto, ntdata, ftid
FROM noticias n
LEFT JOIN fotos f ON f.ftnoticia = n.ntid
ORDER BY ntdata DESC 
LIMIT 3";
		$result= mysql_query( $sql);

		while ($row = mysql_fetch_array($result)) { 
			$img="";$tm=350;
			if ($row['ftid']!= null){
			//$img="<img src='foto.php?id=".$row['ftid']."'>";
			/*$img="<div class='imagem' 
			      style='background-image:url(foto.php?id=".$row['ftid'].");
	                     background-position:center ;
	                     background-repeat:no-repeat;'></div>";*/
			$img="<div class='imagem' style='overflow: hidden;'><img src='foto.php?id=".$row['ftid']."'  width= '200' /></div>";
			$tm=240;}
			echo "
			<div class='noticia' > $img
				<p class='titulo'>".$row['nttitulo']." </p> 
				".substr($row['nttexto'], 0, $tm)."...
				<br> 
				
			</div>
			<font class='data'>".formata_data($row['ntdata'])."</font><a href='noticias.php?id=".$row['ntid']."' class='saibamais'> Saiba mais... </a>";
			
		}
		?>
	</div>
	<h3 class='videoh' >Vídeos</h3>
   <div id="video">
		<!--iframe src="http://www.youtube.com/embed/dukYrLciv3Y" frameborder="0" allowfullscreen></iframe-->
		<iframe src="video.html" frameborder="0"  scrolling='no'></iframe>
   </div>
   <div id="parceiros">parceiros </div>


<?php include('rodape.php');?>
