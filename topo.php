<?php session_start(); header("Content-Type: text/html; charset=ISO-8859-1", true); 
include('cls/cls_conexao.php');
include('cls/funcoes.php');
$con = new Conexao();
$con->conecta();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1" /> 
    <title>Amaral Alves</title>
    <link rel="shortcut icon" href="favicon.ico" >
    
    <link type="text/css" rel="stylesheet" href="css/style.css" />


	<script src="js/funcoes.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.lightbox-0.5.css" media="screen" />

	<link type="text/css" rel="stylesheet" href="css/menu.css" />
	<script type="text/javascript" src="js/menu.js"></script>
	

	 
	</head>



<body >
<div id='faixa2'></div>
<div id="topo" class="geral">
	
    
    <div id="logo"><img src="img/logo.png" /></div>
    <div id="menu"> 
		<div id="menus">
		<ul>
			<li><a href="http://amaralalves.com.br"> Home</a></li>
			<li><a href="noticias.php"> Not&iacute;cias</a></li>
			<li><a href="empresa.php">A Empresa</a></li>
			<li onMouseMove="mostrasubmenu('subobra');"  ><a href="obras.php">Obras</a>
				 
                	<ol onMouseOut="escondesubmenu('subobra');" id="subobra"  > 
						<?php 
                        $sql="SELECT  c.ctid ,  ctdescri 
                        FROM  categoria c
                        join obras o on c.ctid=o.ctid
                        group by c.ctid
                        ORDER BY ctdescri";
                        $result=mysql_query($sql) ;
                        while ($row = mysql_fetch_array($result)) { 
                        echo "<a href='obras.php?c=".$row['ctid']."'>".$row['ctdescri']."</a><br>";
                        
                        }
                        ?>
                    </ol> 
                
		  </li>
			<li><a href="clientes.php">Clientes</a></li>
			<li><a href="parceiros.php">Parceiros</a></li>
			<li><a href="contato.php">Contato</a></li>
		</ul>
		</div>  

    </div>
	<div id='redes-sociais'> 
	Nos acompanhe nas redes<br>
		<a href='http://facebook.com/amaralalveseng'><img src="img/facebook_hover.png"></a>
		<img src="img/twitter2_hover.png">
		<img src="img/youtube_hover.png">
	</div>
</div>
<?php
if ( strpos($_SERVER['PHP_SELF'], 'index')!=0) echo "<div id='faixa'></div>";
if ( strpos($_SERVER['PHP_SELF'], 'obras')!=0) echo "<div id='faixa4'></div>";
if ( strpos($_SERVER['PHP_SELF'], 'empresa')!=0) echo "<div id='faixa5'></div>";
?>
<div id="corpo" class="geral">
