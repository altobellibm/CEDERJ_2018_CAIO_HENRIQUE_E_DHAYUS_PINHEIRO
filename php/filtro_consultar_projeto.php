<!-- trecho responsável pelo levantamento dos projetos do usuario armazenados no banco de dados
e posterior exibição em tabela -->

<?php

include("conexao.php");

$query_select = "SELECT * FROM projetos ";
$query_select .="LEFT JOIN pf ON projetos.solicitante=pf.cpf ";
$query_select .="LEFT JOIN pj ON projetos.solicitante=pj.cnpj ";
$query_select .="where id_usuario=\"".$_SESSION['id']."\"";

if (isset($_GET["tipo_solicitante"])){
	if ($_GET["tipo_solicitante"]!=""){	
		$query_select.=" AND tipo_solicitante='".$_GET["tipo_solicitante"]."'";
	}
}

if (isset($_GET["solicitante"])) if ($_GET["solicitante"]!="") $query_select.=" AND solicitante like '%".$_GET["solicitante"]."%'";	

if (isset($_GET["nome_pf"])) if ($_GET["nome_pf"]!="") $query_select.=" AND nome_pf like '%".$_GET["nome_pf"]."%'";	

if (isset($_GET["razao_social"])) if ($_GET["razao_social"]!="") $query_select.=" AND razao_social like '%".$_GET["razao_social"]."%'";	

if (isset($_GET["tipo_recomposicao"])) {
	$cont=0;
	$query_select.=" (";
	foreach ($_GET["tipo_recomposicao"] as $item){
		if ($cont==0){
			$query_select.=" tipo_recomposicao='".$item."'";
			$cont++;
		}else{
			$query_select.=" OR tipo_recomposicao='".$item."'";
		}
	}
	$query_select.=" )";
}

$query_select.=" order by id DESC";

$select = mysqli_query($connect,$query_select);

?>

<div class="rolagem">

<table class="w100">
	<tr>
		<th>Id</th>
		<th>CNPJ/CPF</th>
		<th>Raz&atildeo Social/Nome</th>
		<th>&Aacuterea da Propriedade</th>
		<th>Recomposi&ccedil&atildeo de</th>
		<th>Cria&ccedil&atildeo em</th>
		<th>Atualizado em</th>
		<th></th>
		<th></th>
	</tr>

<?php

$cont=0;

while($tbl=mysqli_fetch_assoc($select)) {
	$cont++	;

	if ($cont%2==1){
		echo '<tr class="escuro">';
	}else{
		echo '<tr class="claro">';
	}
		
	echo '<td>'.$tbl['id'].'</td><td>'.$tbl['solicitante'].'</td>';
	
	if (isset($tbl["tipo_solicitante"])){
		if ($tbl["tipo_solicitante"]=="pf") {
			echo '<td><label for="proj'.$cont.'">'.$tbl['nome_pf']."</label></td>";
		}else{
		echo '<td><label for="proj'.$cont.'">'.$tbl['razao_social']."</label></td>";
		}
	}

?>
		<td><?=$tbl['area_propriedade']?></td>
		<td><?=$tbl['tipo_recomposicao']?></td>
		<td><?=$tbl['data_criacao']?></td>
		<td><?=$tbl['versao']?></td>
		<td><a href="?pg=form_manter_projeto.php&id_proj=<?=$tbl['id']?>">
		<img src="../imagens/form_logo.png" style="width:25px; "></a>
		<td><a href="exibe_projeto.php?id_proj=<?=$tbl['id']?>" target="_blank">
		<img src="../imagens/pdf_logo.png" style="width:25px; "></a></tr>
<?php
	
}
?> 

</table>

</div>

<h4><?=$cont?> resultados </h4><br><br>

