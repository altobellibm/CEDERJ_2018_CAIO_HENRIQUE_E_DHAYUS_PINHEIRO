<!-- trecho de formulário com os dados a serem preenchidos por uma pessoa fisica -->

<fieldset>
<legend>Dados do solicitante:</legend>
	<table>
		<tr>
			<td colspan="2">
				<label for="nome_pf">Nome:</label>
				<input type="text" name='pf["nome_pf"]' id="nome_pf" size="60">
			</td>
			<td>
				<label for="cpf">CPF:</label>
				<input type="text" name="cpf" class="cpf" id="cpf" oninput="mascara(this)" required>
			</td>
		</tr>
		<tr>
			<td>
				<label for="tel">Telefone Fixo:</label>
				<input type="text" name='pf["tel"]' id="tel" oninput="mascara(this)">
			</td>
			<td>
				<label for="cel">Celular:</label>
				<input type="text" name='pf["cel"]' id="cel" oninput="mascara(this)">
			</td>
			<td>
				<label for="email">E-mail:</label>
				<input type="text" name='pf["email"]' id="email">
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<label for="obs">Observa&ccedil&otildees:</label>
				<textarea name='pf["obs"]' id="obs" cols="92">
				</textarea>
			</td>
		</tr>
	</table>
</fieldset>