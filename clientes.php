<?php include('topo.php');?>
    
<div class='clientes'>
<form method="post"> 
 Gostaria de realizar o orçamento de sua obra conosco?
 <input type="text" name="email" value='[Cadastre o seu e-mail e nós entraremos em contato]' onclick='this.value="";'/> 
 <input type='submit' value='enviar'>
 <?php
	if(isset($_POST['email'])){
	
		$email= $_POST['email'];
		//-----------------------------------------------------
		$texto="contato atravez do site para se totnar cliente. Email: $email";
		//contato@amaralalves.com.br
		if (mail('contato@amaralalves.com.br','contato site',$texto)){
		echo"<center>Mensagem enviada!</center>";
		}

	}
			
?>
 </form>
<img src="img/logo_ALVOPETRO.jpg">
<img src="img/Logo-Insinuante.jpg">
<img src="img/Logo-Gutemburgo.jpg">
<img src="img/DonaFormula_2013.jpg">
<img src="img/Track_Field.jpg">
<img src="img/Abuela_Goye.jpg">
<img src="img/VictorHugo.jpg">
<img src="img/subway.jpg">
<img src="img/logo-empada.jpg">
<img src="img/logo-maquina.jpg">
<img src="img/JINJIN.jpg">
<img src="img/leentreconte.jpg">
<img src="img/Logo-SpeedTech.jpg">
</div>


<?php include('rodape.php');?>
