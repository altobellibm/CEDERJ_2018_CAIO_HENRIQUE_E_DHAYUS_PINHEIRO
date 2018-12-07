<!-- formulário das tarifas praticadas -->

<?php

	if (isset($_GET['atual'])){
		if ($_GET['atual']){
			echo "<script language='javascript' type='text/javascript'>alert('Tarifas atualizadas');</script>";
		}else{
			echo "<script language='javascript' type='text/javascript'>alert('Tarifas não sofreram alteração');</script>";
		}
	}

	include("conexao.php");

	$query="SELECT * from tarifas WHERE id=1";
		
	$select= mysqli_query($connect,$query);
	
	$tbl=mysqli_fetch_assoc($select);

function addTarifas($oper,$tbl) {				
		
		include("conexao.php");
		
		$ln=0;
	
		foreach ($oper as $item){
			
			$query_select = "SELECT significado FROM abreviaturas where sigla=\"".$item."\"";
			
			$select = mysqli_query($connect,$query_select);
			
			$res=mysqli_fetch_assoc($select);
				
			$sign=$res['significado'];
			
			if($ln%2==0){
?>
				<tr style="text-align:center;">
			
<?php
			}
?>
				<td style="width:15%;">
					<label style="width:80%;" for="<?=$item?>" ><?=$sign?> (R$/ha)</label>
				</td><td style="width:15%;">
					<input style="width:80%;" type="text" name='tarifa["<?=$item?>"]' id="<?=$item?>" oninput="mascara(this);" value="<?=$tbl[$item]?>">
				</td>
<?php
			if($ln%2==1){
?>
				</tr>
			
<?php
			}
			$ln++;
		}
	}
?>

<form action="armazena_tarifas.php" method="post">
	<br>
	<fieldset>
		<fieldset>
		<legend>Opera&ccedil&otildees:</legend>
		
			<fieldset>
			<legend>Preparo da &Aacuterea: </legend>
				<table>
	
<?php
	
	$add = Array ("terrap_a_cult","terraceamento","isol_a","rocada_previa","comb_form","medicao","marcacao","coroamento","coveamento","fecha_covas","adubacao");
	
	addTarifas($add,$tbl);

?>

				</table>
			</fieldset>
			<fieldset>
			<legend>Plantio:</legend>
				<table>

<?php		

	$add = Array ("plantio_mudas","irrigacao");
	
	addTarifas($add,$tbl);
?>	
			</table>
		</fieldset>
		<fieldset>
		<legend>P&oacutes Plantio:</legend>
			<table>

<?php	

	$add = Array ("pos_irrigacao","replantio","pos_rocada","capina","p_adubacao","construcao");
	
	addTarifas($add,$tbl);
?>	
		
			</table>
		</fieldset>
	</fieldset>
	
	<button type="submit" value="Submit">Atualizar</button>   &Uacuteltima atualiza&ccedil&atildeo em <?=$tbl['versao']?>
	</fieldset>
</form>	