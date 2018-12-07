<!-- formulário para consultar orcamentos já armazenados no banco de dados.
Um usuário só é capaz de visualizar os orcamentos criados por ele -->
<BR>
<form method="GET" id="form_cs_orc" name="form_cs_orc">
<fieldset>
	<fieldset>
		<legend>Solicitante:</legend>

			<input type="radio" name="tipo_solicitante" id="tipo_solicitante" value="pj" onChange="Solicitante_consulta(1);" checked>
			<label for="tipo_solicitante"> Pessoa Jur&iacutedica </label>
  
			<input type="radio" name="tipo_solicitante" id="tipo_solicitante" value="pf" onChange="Solicitante_consulta(0);">
			<label for="tipo_solicitante">Pessoa F&iacutesica </label> 
			
			<div id="dados_solicitante_consulta">
			<script> Solicitante_consulta(1); </script>
			</div>
		
  	</fieldset>
	<fieldset>
		<legend>Tipo de Recomposi&ccedil&atildeo:</legend>

			<input type="checkbox" name="tipo_recomposicao[]" id="tipo_recomposicao" value="app">
			<label for="tipo_solicitante"> &Aacuterea de Preserva&ccedil&atildeo Permantente </label>
  
			<input type="checkbox" name="tipo_recomposicao[]" id="tipo_recomposicao" value="arl">
			<label for="tipo_solicitante">&Aacuterea de Reserva Legal </label> 
			
			<input type="checkbox" name="tipo_recomposicao[]" id="tipo_recomposicao" value="are">
			<label for="tipo_solicitante">&Aacuterea de Reserva Excedente </label>		
  	</fieldset>
	
	<input type=submit value="Filtrar">
	
	<br><br>
	
	<?php  include("filtro_consultar_orcamento.php"); ?>
			
	<input type="hidden" id="pg" name="pg" value="form_consultar_orcamento.php">
</fieldset>
</form>