<?php 

class Conexao {
	private $host='localhost';
	private $user='root';
	private $pass='';
	private $bd='amaralalves';
	
	
	public function conecta(){
		
		$link = mysql_connect($this->host, $this->user, $this->pass);
		if (!$link) {  die('N�o foi poss�vel conectar: ' . mysql_error());}
		//else {echo 'Conex�o bem sucedida';}
		mysql_select_db($this->bd);
	
	}
	
}
?>