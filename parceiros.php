<?php include('topo.php');?>
    
<div class='clientes'>
<form method="post"> 
 Gostaria de se tornar um parceiro da Amaral Alves Engenharia?
 <input type="text" name="email" value='[Cadastre o seu e-mail e nós entraremos em contato]' onclick='this.value="";' /> 
 <input type='submit' value='enviar'>
 <?php
	if(isset($_POST['email'])){
	
		$email= $_POST['email'];
		//-----------------------------------------------------
		$texto="contato atravez do site para se totnar parceiro. Email: $email";
		//contato@amaralalves.com.br
		//if (mail('contato@amaralalves.com.br','contato site',$texto)){
		echo"<center>Mensagem enviada!</center>";
		//}
		

	}
			
?>
 </form>
<a href='http://www.conceptviagens.com.br' target='_blank'><img src="img/Concept.jpg"></a>
<a target='_blank'><img src="img/CVL_Metalurgica-parceiro Comercial.jpg"></a>
<a href='http://www.dishelp.com.br/' target='_blank'><img src="img/Dishelp.jpg"></a>
<a href='http://www.eletricompe.com.br' target='_blank'><img src="img/Eletricom.jpg"></a>

</div>


<?php include('rodape.php');?>
