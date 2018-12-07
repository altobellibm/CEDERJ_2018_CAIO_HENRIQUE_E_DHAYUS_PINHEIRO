<!-- formulário para criar orçamentos -->

<form method="post" action="armazena_orcamento.php" id="form1" name="form1">
	<fieldset>
	<fieldset>
	<legend>Solicitante:</legend>

		<fieldset>
		<legend>Tipo de solicitante:</legend>

			<input type="radio" name="tipo_solicitante" id="tipo_solicitante" value="pj" onChange="Solicitante_pj();" checked>
			<label for="tipo_solicitante"> Pessoa Jur&iacutedica </label>
  
			<input type="radio" name="tipo_solicitante" id="tipo_solicitante" value="pf" onChange="Solicitante_pf();">
			<label for="tipo_solicitante">Pessoa F&iacutesica </label> 
		
  		</fieldset>
		
		 <div id="solicitante"> 
			 <?php	include("solicitante_pj.php"); ?> 
		 </div>


	</fieldset>

	<fieldset>
	<legend>Recomposi&ccedil&atildeo de:</legend>

		<input type="radio" name='orc["tipo_recomposicao"]' id="tipo_recomposicao" value="app" onChange="Medidas(0)" checked>
		<label for="tipo_recomposicao"> &Aacuterea de preserva&ccedil&atildeo permanente - APP </label>
  
		<input type="radio" name='orc["tipo_recomposicao"]' id="tipo_recomposicao" value="arl" onChange="Medidas(1)">
		<label for="tipo_recomposicao">&Aacuterea de reserva legal - RL</label>
 
		<input type="radio" name='orc["tipo_recomposicao"]' id="tipo_recomposicao" value="are" onChange="Medidas(2)">
		<label for="tipo_recomposicao">&Aacuterea de reserva excedente - RE</label>
  	
	</fieldset>
 	
	<div id="medidas">
		<script> Medidas(0); </script>
	</div>

	<fieldset>
	<legend>Custos:</legend>

		<fieldset>
		<legend>Custos Fixos:</legend>

			<label for="custo_fixo">Valor:</label>
			<input type="text" name="custo_fixo" id="custo_fixo">

		</fieldset>

		<fieldset>
		<legend>Custos Vari&aacuteveis: </legend>

			<fieldset>
			<legend>Preparo da &Aacuterea: </legend>
			<table>
				<tr>
				<td> 
					<input type="checkbox" name='cv["terrap_a_cult"]' id="terrap_a_cult">
					<label for="terrap_a_cult">Terraplanagem de &Aacuterea de Cultivo</label>
				</td>
				<td>
					<input type="checkbox" name='cv["terraceamento"]' id="terraceamento">
					<label for="terraceamento">Terraceamento</label>
				</td>
				<td>
					<input type="checkbox" name='cv["isol_a"]' id="isol_a">
					<label for="isol_a">Isolamento da &Aacuterea</label>
				</td>
				</tr>
				<tr>
				<td>
					<input type="checkbox" name='cv["rocada_previa"]' id="rocada_previa">
					<label for="rocada_previa">Ro&ccedilada Manual e Mecanizada Pr&eacutevia</label>
				</td>
				<td>
					<input type="checkbox" name='cv["comb_form"]' id="comb_form">
					<label for="comb_form">Combate a Formigas</label>
				</td>
				<td>
					<input type="checkbox" name='cv["medicao"]' id="medicao">
					<label for="medicao">Medi&ccedil&atildeo</label>
				</td>
				</tr>
				<tr>
				<td>
					<input type="checkbox" name='cv["marcacao"]' id="marcacao">
					<label for="marcacao">Marca&ccedil&atildeo de Covas</label>
				</td>
				<td>
					<input type="checkbox" name='cv["coroamento"]' id="coroamento">
					<label for="coroamento">Coroamento para Plantio</label>
				</td>
				<td>
					<input type="checkbox" name='cv["coveamento"]' id="coveamento">
					<label for="coveamento">Coveamento Manual</label>
				</td>
				</tr>
				<tr>
				<td>
					<input type="checkbox" name='cv["fecha_covas"]' id="fecha_covas">
					<label for="fecha_covas">Fechamento Parcial de Covas</label>
				</td>
				<td>
					<input type="checkbox" name='cv["adubacao"]' id="adubacao">
					<label for="adubacao">Aduba&ccedil&atildeo na Cova de Plantio</label>
				</td>
				</tr>
			</table>
			</fieldset>

			<fieldset>
			<legend>Plantio:</legend>
			<table>
				<tr>
				<td> 
					<input type="checkbox" name='cv["plantio_mudas"]' id="plantio_mudas">
					<label for="plantio_mudas">Plantio de Mudas</label>
				</td>
				<td>
					<input type="checkbox" name='cv["irrigacao"]' id="irrigacao">
					<label for="irrigacao">Irriga&ccedil&atildeo</label>
				</td>
				</tr>
			</table>
			</fieldset>

			<fieldset>
			<legend>P&oacutes Plantio:</legend>
			<table>
				<tr>
				<td> 
					<input type="checkbox" name='cv["pos_irrigacao"]' id="pos_irrigacao">
					<label for="pos_irrigacao">Irriga&ccedil&atildeo</label>
				</td>
				<td>
					<input type="checkbox" name='cv["replantio"]' id="replantio">
					<label for="replantio">Replantio Florestal</label>
				</td>
				<td>
					<input type="checkbox" name='cv["pos_rocada"]' id="pos_rocada">
					<label for="pos_rocada">Ro&ccedilada Manual e Mecanizada de Manuten&ccedil&atildeo</label>
				</td>
				</tr>
				<tr>
				<td>
					<input type="checkbox" name='cv["capina"]' id="capina">
					<label for="capina">Capina Manual em Coroa</label>
				</td>
				<td>
					<input type="checkbox" name='cv["p_adubacao"]' id="p_adubacao">
					<label for="p_adubacao">Aduba&ccedil&atildeo Localizada em Cobertura</label>
				</td>
				<td>
					<input type="checkbox" name='cv["construcao"]' id="construcao">
					<label for="construcao">Constru&ccedil&atildeo/manuten&ccedil&atildeo de Aceiros</label>
				</td>
				</tr>
			</table>
			</fieldset>


		</fieldset>
	</fieldset>

	<fieldset>
		<legend>Validade do Or&ccedilamento: </legend>
		<table>
			<tr>
			<td> 
				<input type="radio" name="validade" id="validade" value="7" checked>
				<label for="validade">7 dias</label>
			</td>
			<td>
				<input type="radio" name="validade" id="validade" value="15">
				<label for="validade">15 dias</label>
			</td>
			<td>
				<input type="radio" name="validade" id="validade" value="30">
				<label for="validade">30 dias</label>
			</td>
			</tr>
				
		</table>
		</fieldset>
		
		<button type="submit" value="Submit">Submit</button>
	</fieldset>
</form>

		<div id="solicitante_pf" class="escondido"> 
			 <?php	include("solicitante_pf.php"); ?> 
		 </div> 
		
		 <div id="solicitante_pj" class="escondido"> 
			 <?php	include("solicitante_pj.php"); ?> 
		 </div>