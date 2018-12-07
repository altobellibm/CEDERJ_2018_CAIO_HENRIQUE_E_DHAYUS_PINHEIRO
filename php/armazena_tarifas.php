<!-- código responsável por armazenar as tarifas no banco de dados -->

<?php

include("conexao.php");

date_default_timezone_set('America/Sao_Paulo');

$query = "UPDATE tarifas SET versao='".date('l jS \of F Y h:i:s A')."'";

	foreach($_POST['tarifa'] as $key => $value){
		$query.= ", ".$key."='".$value."'";
	}
	
	echo $query=str_replace("\"","",$query.=" WHERE id=1");

	$update= mysqli_query($connect,$query);
	
	if(mysql_affected_rows<0){
		$atual=false;
	}else{
		$atual=true;
	}
	
header("Location:esqueleto.php?pg=form_tarifas.php&atual=$atual");

?>