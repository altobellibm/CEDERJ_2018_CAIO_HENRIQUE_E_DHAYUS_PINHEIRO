<!-- trecho de formulário com os dados a serem preenchidos por uma pessoa juridica -->

<fieldset>
<legend>Dados do solicitante:</legend>
	<table>
		<tr>
			<td colspan="2">
				<label for="nome_pj">Nome do Representante:</label>
				<input type="text" name='pj["nome_pj"]' id="nome_pj" size="50">
			</td>
			<td>
				<label for="cnpj">CNPJ:</label>
				<input type="text" name="cnpj" id="cnpj" oninput="mascara(this)" required>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<label for="razao_social">Raz&atildeo Social:</label>
				<input type="text" name='pj["razao_social"]' id="razao_social" size="60">
			</td>
			<td>
				<label for="ie">Inscri&ccedil&atildeo Estadual:</label>
				<input type="text" name='pj["ie"]' id="ie">
			</td>
		</tr>
		<tr>
			<td>
				<label for="tel">Telefone Fixo:</label>
				<input type="text" name='pj["tel"]' id="tel" oninput="mascara(this)">
			</td>
			<td>
				<label for="cel">Celular:</label>
				<input type="text" name='pj["cel"]' id="cel" oninput="mascara(this)">
			</td>
			<td>
				<label for="email">E-mail:</label>
				<input type="text" name='pj["email"]' >
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<label for="obs">Observa&ccedil&otildees:</label>
				<textarea name='pj["obs"]'  cols="92">
				</textarea>
			</td>
		</tr>
	</table>
</fieldset>