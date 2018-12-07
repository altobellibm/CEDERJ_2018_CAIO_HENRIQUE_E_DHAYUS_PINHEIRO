<!-- código para armazenar um projeto no banco de dados, seja ele novo ou atualizaçao de um armazenado previamente -->

<?php

include("conexao.php");

// trecho que identifica a natureza do solicitante

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
// trecho para setar algumas variaveis que serao usadas em mais de uma ocasiao

$area=$_POST['area_propriedade'];	

$trec=$_POST['tipo_recomposicao'];	

session_start();
$usuario=$_SESSION['id'];

$id_orc=$_POST['id_orc'];

// trecho que verifica se é um novo projeto ou nao

if(isset($_POST['id_proj'])){
	$id_proj=$_POST['id_proj'];
}else{
	$id_proj=0;
}

date_default_timezone_set('America/Sao_Paulo');

if($id_proj==0){
		
	$itens1="";
	$itens2="";
	
	$query="INSERT INTO projetos (";
	
	$itens1="id_usuario,id_orc,data_criacao,solicitante, tipo_solicitante, area_propriedade, tipo_recomposicao, versao";
	$itens2=$usuario.",".$id_orc.",\"".date('d-m-Y')."\",\"".$str."\",\"".$a."\",\"".$area."\",\"".$trec."\",\"".date('l jS \of F Y h:i:s A')."\"";
	
	if (isset($_POST['orc'])){
		foreach($_POST['orc'] as $key => $value){
			$itens1.=",".$key;
			$itens2.=",\"".$value."\"";
		}
	}
	if (isset($_POST['cv'])){
		foreach($_POST['cv'] as $key => $value){
			$itens1.=",".$key;
			$itens2.=",\"".$value."\"";
		}	
	}
	$itens1 = str_replace("\"", "",$itens1);
	$itens1 = str_replace("'", "",$itens1);
	
	$query.=$itens1.") VALUES (".$itens2.")";

	$insert = mysqli_query($connect,$query);
	
	
}else{
	
	$query = "UPDATE projetos SET versao='".date('l jS \of F Y h:i:s A')."'";
	
	if (isset($_POST['orc'])){
		foreach($_POST['orc'] as $key => $value){
			$query.= ", ".$key."='".$value."'";
		}
	}
	$add = Array ("terrap_a_cult","terraceamento","isol_a","rocada_previa","comb_form","medicao","marcacao","coroamento","coveamento","fecha_covas","adubacao","plantio_mudas","irrigacao","pos_irrigacao","replantio","pos_rocada","capina","p_adubacao","construcao");
	
	// resgata a tabela de projetos
	
	$query_select="SELECT * from projetos WHERE id=".$id_proj;
		
	$select= mysqli_query($connect,$query_select);
	
	$tbl=mysqli_fetch_assoc($select);
	
	$opcoes=array();
	
	foreach($tbl as $key => $val) if ($val=="on"||$val==null) array_push($opcoes, $key);
	
	$opcoes=array_intersect($add,$opcoes);
	
	$marcados=array();

	if (isset($_POST['cv'])){
		foreach($_POST['cv'] as $key => $value){
			array_push($marcados, str_replace('"',"",$key));
			$query.= ", ".$key."='".$value."'";
		}
	}
	$opcoes=array_diff($opcoes,$marcados);

	foreach($opcoes as $key => $value){
		$query.= ", ".$value.'=\'\'';		
	}
	
	$query.= ', id_usuario='.$usuario;
	$query.= ', id_orc='.$id_orc;
	$query.= ', data_criacao=\''.date('d-m-Y')."'";
	$query.= ', solicitante=\''.$str."'";
	$query.= ', tipo_solicitante=\''.$a."'";
	$query.= ', area_propriedade=\''.$area."'";
	$query.= ', tipo_recomposicao=\''.$trec."'";
		
	echo $query=str_replace("\"","",$query.=" WHERE id=".$id_proj);

	$update= mysqli_query($connect,$query);
	
}

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

if($id_proj==0) {
	$query="select id from projetos order by id DESC";
	$select = mysqli_query($connect,$query);
	$tbl=mysqli_fetch_assoc($select);
	$id_proj=$tbl['id'];
}

foreach ($_POST['teste'] as $key){
	$ativ=$key.'oper';
	if(isset($_POST[$ativ])){
		$tam=sizeof($_POST[$ativ]);
		$query_ativ="delete from atividades where id_projeto=$id_proj and item=\"$key\";";
		$delete=mysqli_query($connect, $query_ativ);
		for ($i=0;$i<$tam;$i++){
			$oper=$_POST[$key.'oper'];
			$data_ativ=$_POST[$key.'data_ativ'];
			$descricao=$_POST[$key.'descricao'];
			$hora=$_POST[$key.'hora'];				
			$query_ativ='insert into atividades (id_projeto,item,oper,data_ativ,descricao,hora)';
			echo $query_ativ.=" VALUES ($id_proj,'$key','$oper[$i]','$data_ativ[$i]','$descricao[$i]','$hora[$i]');";
			$insert=mysqli_query($connect,$query_ativ);
		}
	}	
}

header("Location:esqueleto.php?pg=form_manter_projeto.php&alt=1&id_proj=".$id_proj);
?>