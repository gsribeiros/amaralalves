<?php include('topo.php');?>
   
   
<div id="conteudo">

	<form method="post">
		<table id="contato" border="0">
			<tr> 
				<td>Nome </td>
				<td> <input type="text" name="nome" /> </td>
			</tr>
			<tr> 
				<td>Email </td>
				<td><input type="text" name="email" /> </td>
			</tr>
			<tr> 
				<td>Telefone </td>
				<td><input type="text" name="telefone" /> </td>
			</tr>
			<tr> 
				<td>Mensagem </td>
				<td><textarea name="corpo" > </textarea> </td>
			</tr>
			<tr> <td colspan="2" align="center"><input type="submit" /></td> </tr>
			<tr> <td colspan="3"> 
			<?php
				if(isset($_POST['email'])){
				
					$telefone = $_POST['telefone'];;
					$nome= $_POST['nome'];
					$email= $_POST['email'];
					$corpo = $_POST['corpo'];

					//-----------------------------------------------------
					$texto="O cliente $nome, entrou em contato pelo site e deixou uma mensagem.\n
					$corpo \n
					email : $email \n 
					telefone: $telefone";
					//contato@amaralalves.com.br
					if (mail('contato@amaralalves.com.br','contato site',$texto)){
					echo "<br><br><br>";
					echo"<center><br>Mensagem enviada!<br></center>";
					}
					else{echo "Erro no envio";}

				}
			
			?>
			</td></tr>
		</table>
	</form>
	<p> Contato </p>
	<div class='texto'>Amaral Alves Engenharia<br> Avenida Anita Garibaldi, N°1279, Edifício Ernesto Weckler, Sala 301 / 304 - Ondina
				<br>Salvador, Bahia - CEP.: 41170-130 <br><br> E-mail.: contato@amaralalves.com.br
<br><br> Tel.: 71 3235-8815</div>
	
	<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=avenida+anita+garibalde,+1279&amp;aq=&amp;sll=-12.9885,-38.502703&amp;sspn=0.044076,0.041027&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Av.+Anita+Garibaldi,+1279+-+Federa%C3%A7%C3%A3o,+Salvador+-+Bahia,+40170-130&amp;ll=-13.000604,-38.505121&amp;spn=0.011018,0.010257&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br />
</div>


<?php include('rodape.php');?>

