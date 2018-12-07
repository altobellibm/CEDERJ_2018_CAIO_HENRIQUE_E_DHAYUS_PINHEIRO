<!-- código responsável por armazenar o orcamento no banco de dados -->

<?php

include("conexao.php");

// resgata a tabela de tarifas

$query="SELECT * from tarifas WHERE id=1";

$select= mysqli_query($connect,$query);

$tbl=mysqli_fetch_assoc($select);

// trecho que trabalha com o formulário de criar_orcamento

$query = "INSERT INTO orcamentos (";

$a = $_POST['tipo_solicitante'];

if ($a=="pf"){
	$temp="cpf";
	$str=$_POST["cpf"];
	$sol=$_POST["pf"];
}else{
	$temp="cnpj";
	$str=$_POST["cnpj"];
	$sol=$_POST["pj"];
}

$validade=date('d-m-Y',time()+$_POST['validade']*24*60*60);

$area=$_POST['area_propriedade']+0;

$cf="R\$".$_POST['custo_fixo'];

session_start();

$itens1="id_usuario,validade,data_criacao,solicitante, tipo_solicitante, area_propriedade,custo_fixo";
$itens2=$_SESSION['id'].",\"".$validade."\",\"".date('d-m-Y')."\",\"".$str."\",\"".$a."\",\"".$area."\",\"".$cf."\"";

foreach($_POST['orc'] as $key => $value){
		$itens1.=",".$key;
		$itens2.=",\"".$value."\"";
}

// captura os custos variaveis

$total=0+$_POST['custo_fixo'];;

foreach($_POST['cv'] as $key => $value){
		$valor=$area*($tbl[str_replace("\"","",$key)]+0);
		$itens1.=",".$key.",val_".$key;
		$itens2.=",\"".$value."\",\"R\$".$valor."\"";
		$total+=$valor;
}
//para retirar as aspas simples e duplas

$itens1.=",total";
$itens2.=",\"R\$".$total."\"";

$itens1 = str_replace("\"", "",$itens1);
$itens1 = str_replace("'", "",$itens1);

$query.=$itens1.") VALUES (".$itens2.")";

$insert = mysqli_query($connect,$query); 

// trecho que trata do solicitante

$query="SELECT ".$temp." FROM ".$a." WHERE ".$temp."=\"".$str."\"";

$select= mysqli_query($connect,$query);

$i=0;

if(mysqli_num_rows($select)==0){
	
	$itens1="";
	$itens2="";
	
	$query="INSERT INTO ".$a." (";
	
	foreach($sol as $key => $value){
		if ($i==0){
			$itens1.=$key;
			$itens2.="\"".$value."\"";
		}else{
			$itens1.=",".$key;
			$itens2.=",\"".$value."\"";
		}
		$i=1;
	}

	$itens1 = str_replace("\"", "",$itens1);
	$itens1 = str_replace("'", "",$itens1);
	
	$query.=$itens1.",".$temp.") VALUES (".$itens2.",\"".$str."\")";

	$insert = mysqli_query($connect,$query);
}else{
	$query = "UPDATE ".$a." SET ";

	foreach($sol as $key => $value){
		if ($i==0){
			$query.= $key."='".$value."'";
		}else{
			$query.= ", ".$key."='".$value."'";
		}
		$i=1;
	}

	$query=str_replace("\"","",$query.=" WHERE ".$temp."='".$str."'");

	$update= mysqli_query($connect,$query);
	
}

//trecho para exibir o orcamento criado

$query="select id from orcamentos order by id DESC";

$select = mysqli_query($connect,$query);

$tbl=mysqli_fetch_assoc($select);

header("Location:Esqueleto.php?pg=orcamento_ok.php&id_orc=".$tbl['id']);

?>