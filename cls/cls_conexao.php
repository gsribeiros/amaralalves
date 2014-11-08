<?php 

class Conexao {
	private $host='localhost';
	private $user='root';
	private $pass='';
	private $bd='amaralalves';
	
	
	public function conecta(){
		
		$link = mysql_connect($this->host, $this->user, $this->pass);
		if (!$link) {  die('Não foi possível conectar: ' . mysql_error());}
		//else {echo 'Conexão bem sucedida';}
		mysql_select_db($this->bd);
	
	}
	
}
?>