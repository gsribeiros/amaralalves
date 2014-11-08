<?php

function uploadimagem($file, $destino, $file_name){
	//$destino = 'img/email/';
	$file_name=str_replace(" ","", $file_name);
	if(!$file || $file['foto']['size']==0){
		echo 'Nenhum arquivo enviado!';
	}else{
		//=====================================

			$d=str_replace("/","\\", substr($destino,0,-1));
			$diretorio= getcwd()."\\$d";

			$cont=0;
			$ponteiro  = opendir($diretorio);

			while ($nome_itens = readdir($ponteiro)) {
				//$itens[] = $nome_itens;
				//echo 
				if(stripos($nome_itens,$file_name)!==false){$cont++;}
			}

		//=====================================

		$file_type = explode('/',$file['foto']['type']);
		$file_type = trim($file_type[1]);
		$file_name .= "_".$cont.".".$file_type;
		$file_size = $file['foto']['size'];
		$file_tmp_name = $file['foto']['tmp_name'];
		$error = $file['foto']['error'];
	}


	switch ($error){
		case 0:
			break;
		case 1:
			echo 'O tamanho do arquivo é maior que o definido nas configurações do PHP!';
			break;
		case 2:
			echo 'O tamanho do arquivo é maior do que o permitido!';
			break;
		case 3:
			echo 'O upload não foi concluído!';
			break;
		case 4:
			echo 'O upload não foi feito!';
			break;
	}

	if($error == 0){
		if(!is_uploaded_file($file_tmp_name)){
			echo 'Erro ao processar arquivo!';
		}else{
			if(!move_uploaded_file($file_tmp_name,$destino."\\".$file_name)){
				echo 'Não foi possível salvar o arquivo!';
				return(false);
			}else{
				/*echo 'Processo concluído com sucesso!<br>';
				echo "Nome do arquivo: $file_name<br>";
				echo "Tipo de arquivo: $file_type<br>";
				echo "Tamanho em byte: $file_size<br>";*/
				return($file_name);
			}
		}
	}

}

function formata_data_bd($data){
if($data){
	
	$d=explode('/', $data);
	$data=$d[2]."-".$d[1]."-".$d[0];
	return($data);
}

}

function formata_data($data){
	if($data!='0000-00-00'){
		$d=explode('-', $data);
		$data=$d[2]."/".$d[1]."/".$d[0];
	}
	else {
		$data="";
	}
	return($data);
}
?>