<?
//if(mail('gdsr2805@gmail.com','teste amaral alves','teste')){ echo"Mensagem Enviada!";} 
include('topo.php');

$telefone = $_POST['telefone'];;
$nome= $_POST['nome'];
$email= $_POST['email'];
$corpo = $_POST['corpo'];
$to = 'gsribeiros@gmail.com';
$para = "From: $email\r\n";


//-----------------------------------------------------
$texto="O cliente $nome, entrou em contato pelo site e deixou uma mensagem.<br>
$corpo <br>
email : $email <br> 
telefone: $telefone";

if (mail('contato@amaralalves.com.br','contato site',$texto)){
echo "<br><br><br>";
echo"<center><h1 style='color:#fff; background-color:#CD0120; border:#FFFFFF solid 1px; width:300px;'><br>Mensagem enviada!!<br>&nbsp;</h1></center>";
}
else{echo "Erro no envio";}


echo"<meta http-equiv='refresh' content='3; url=contato.php'>";






include('rodape.php');
?>

