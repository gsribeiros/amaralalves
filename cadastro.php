<?php 
include('topo.php');
//session_destroy(); 

?>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/_samples/sample.js" type="text/javascript"></script>
	<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />

<?php
if(isset($_POST['usuario']) && isset($_POST['senha'])){

if(md5($_POST['usuario'].$_POST['senha'])=='dcfeb111456c6464ae1ad22c07f11f50') $_SESSION["ativo_aa"]=1;

}

if (!isset($_SESSION["ativo_aa"]) || $_SESSION["ativo_aa"] == '' ){
		?>
		<div id="log">
			<form action="" method="post">
				<p>Nome: <input name="usuario" TYPE="text" style="width:120px">
				Senha: <input name="senha"  TYPE="password" style="width:120px"><br>
				<input type="submit" value="ok">
                <?php echo"<br>  ";?>
                
                </p>
			</form>
		</div>
		<?php
	}
	else{
		if(isset($_POST['tabela'])){
			/*foreach($_POST as $campo => $nome){
				//if($nome && $nome!=""){
					 echo "$campo => $nome <br>";
					if(substr($campo,3,-1)!="telefone") {
						$campos.=$campo.", ";
						$valores.="'".trim(strtoupper($nome))."', ";
					//}
				}
			foreach($_FILES as $campo => $nome){
					 echo "$campo => $nome <br>";
					 foreach($nome as $c => $n){
					 echo "* $c => $n <br>";}
			}*/
			
			
			switch($_POST['tabela']){
				case 'categoria':
							$sql="INSERT INTO categoria(ctdescri) VALUES ('".$_POST['ctdescri']."')";
							mysql_query($sql);
				break;
				case 'obras':
							if(isset($_POST['obstatus'])){$st=0;}
							else{$st=1;}
							$sql="INSERT INTO obras( obtitulo, obdescricao, ctid,obstatus) 
									VALUES 
									('".$_POST['obtitulo']."','".$_POST['obdescricao']."', ".$_POST['ctid'].", $st)";
							//echo "$sql <br> <br>";
							mysql_query($sql);
							$idob=mysql_insert_id();		
							
							$pFoto = $_FILES["txtFoto"]["tmp_name"];
							$pNome = $_FILES["txtFoto"]["name"];
							$pTipo = $_FILES["txtFoto"]["type"];
							$TamanhoImg = filesize($pFoto); 
							$mysqlImg = addslashes(fread(fopen($pFoto, "r"), $TamanhoImg));

							$sql="INSERT INTO fotos (ftfoto,fttipo,ftobra ) VALUES
							('".$mysqlImg."', '".$pTipo."', ".$idob.")";
							//echo "$sql <br> <br>";
							mysql_query($sql);
							$idft=mysql_insert_id();
							$sql="UPDATE `obras` SET ftid=$idft WHERE obid=".$idob;
							//echo "$sql <br> <br>";
							mysql_query($sql);
				break;
				
				case 'noticias':
							$sql="INSERT INTO `noticias`( `nttitulo`, `nttexto`, `ntdata`) 
												VALUES 
												('".$_POST['nttitulo']."','".$_POST['nttexto']."',now())";
							mysql_query($sql);
							$id=mysql_insert_id();
							if(isset($_FILES) && $_FILES["txtFoto"]["size"]>0){
								$pFoto = $_FILES["txtFoto"]["tmp_name"];
								$pNome = $_FILES["txtFoto"]["name"];
								$pTipo = $_FILES["txtFoto"]["type"];
								$TamanhoImg = filesize($pFoto); 
								$mysqlImg = addslashes(fread(fopen($pFoto, "r"), $TamanhoImg));

								$sql="INSERT INTO fotos (ftfoto,fttipo,ftnoticia ) VALUES('".$mysqlImg."', '".$pTipo."', ".$id.")";

								mysql_query($sql);
							}
				break;
				
				case 'fotos': 
							foreach($_FILES as $campo => $nome){
								$pFoto = $_FILES[$campo]["tmp_name"];
								$pNome = $_FILES[$campo]["name"];
								$pTipo = $_FILES[$campo]["type"];

								$TamanhoImg = filesize($pFoto); 
								$mysqlImg = addslashes(fread(fopen($pFoto, "r"), $TamanhoImg));


								$sql="INSERT INTO fotos (ftfoto,fttipo,ftobra) VALUES
								('".$mysqlImg."', '".$pTipo."',".$_POST['obid'].")";

								mysql_query($sql);		
							}		
				break;
				
				case 'upobras': 

								$sql="UPDATE obras SET obstatus=".$_POST['obstatus'].", ctid=9 WHERE obid=".$_POST['obid'].";";
								mysql_query($sql);		
			
			}
		}

		?>
		<form method="post" enctype="multipart/form-data">
			<fieldset>
				<legend> Categorias</legend>
				<table border="0" cellpading="0" cellspacing="0" width="95%">
					<tr>
						<td height="50">Nome:</td>
						<td><input type="text" name="ctdescri" size="35" maxlength="39"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="hidden" name='tabela' value='categoria'/>
						<input type="submit" value="Enviar"></td>
					</tr>
				</table>
			</fieldset>
		</form>

		<form method="post" enctype="multipart/form-data">
			<fieldset>
				<legend> Atualiza Obras</legend>
				<table border="0" cellpading="0" cellspacing="0" width="95%">
					<tr>
						<td height="50">Obra:</td>
						<td><?php
						$sql = "SELECT `obid`, `obtitulo` FROM `obras`
								ORDER BY obtitulo ";
								
					$result= mysql_query( $sql);
					echo "<select name='obid'>";
					while ($row = mysql_fetch_array($result)) { 
						echo "<option value='".$row['obid']."'>".$row['obtitulo']."</option>";
					}
					echo "</select> ";?>
					
					</td>
					</tr>
					<tr>
						<td height="50">Em andamento:</td>
						<td><input type="radio" name="obstatus" value="0">Sim
							<input type="radio" name="obstatus" value="1">Não
					</tr>
					<tr>
						<td colspan="2"><input type="hidden" name='tabela' value='upobras'/>
						<input type="submit" value="Enviar"></td>
					</tr>
				</table>
			</fieldset>
		</form>

		<form method="post" enctype="multipart/form-data">
			<fieldset>
				<legend> Obras</legend>
				<table border="0" cellpading="0" cellspacing="0" width="95%">
					<tr>
						<td height="50">Nome:</td>
						<td><input type="text" name="obtitulo" size="35" maxlength="140"></td>
					</tr>
					<tr>
						<td height="50">Categoria:</td>
						<td><select name='ctid'>
						<?php
						$sql="SELECT  ctid ,  ctdescri 
							  FROM  categoria 
							  ORDER BY ctdescri";
							$result=mysql_query($sql) ;
							while ($row = mysql_fetch_array($result)) { 
							  echo "<option value='".$row['ctid']."'>".$row['ctdescri']."</option>";
							  
							}
						?>
						</select> em andamento: <input type="checkbox" name="obstatus">
						
						</td>
					</tr>
					<tr>
						<td height="50">Descrição:</td>
						<td><textarea class="ckeditor" name="obdescricao"></textarea></td>
					</tr>
					<tr>
						<td height="50">Foto:</td>
						<td><input type="file" name="txtFoto" size="35"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="hidden" name='tabela' value='obras'/>
						<input type="submit" value="Enviar"></td>
					</tr>
				</table>
			</fieldset>
		</form>
		<form method="post" enctype="multipart/form-data">
			<fieldset>
				<legend> Noticias</legend>
				<table border="0" cellpading="0" cellspacing="0" width="95%">
					<tr>
						<td height="50">Titulo:</td>
						<td><input type="text" name="nttitulo" size="35" maxlength="140"></td>
					</tr>
					<tr>
						<td height="50">Texto:</td>
						<td><textarea class="ckeditor" name="nttexto"></textarea></td>
					</tr>
					<tr>
						<td height="50">Foto:</td>
						<td><input type="file" name="txtFoto" size="35"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="hidden" name='tabela' value='noticias'/>
						<input type="submit" value="Enviar"></td>
					</tr>
				</table>
			</fieldset>
		</form>
		<form method="post" enctype="multipart/form-data">
			<fieldset>
				<legend> Fotos das Obras</legend>
				<table border="0" cellpading="0" cellspacing="0" width="95%">
					<tr>
						<td height="50">Obra:</td>
						<td><?php
						
						
						$sql = "SELECT `obid`, `obtitulo` FROM `obras`
								ORDER BY obtitulo ";
								
				$result= mysql_query( $sql);
					echo "<select name='obid'>";
					while ($row = mysql_fetch_array($result)) { 
						echo "<option value='".$row['obid']."'>".$row['obtitulo']."</option>";
					}
					echo "</select> ";?>
					</td>
					</tr>
					<tr>
						<td height="50">Foto:</td>
						<td><input type="file" name="txtFoto" size="35">
						<input name='addfoto' type='button' onClick='addFormFoto(this); return false;' value='+' class='mais'/><br>
						<div id="addfoto1" class='campadd'></div></td>
					</tr>
					<tr>
						<td colspan="2"><input type="hidden" name='tabela' value='fotos'/>
						<input type="submit" value="Enviar"></td>
					</tr>
				</table>
			</fieldset>
		</form>
	
<?php
}
include('rodape.php');
?>

