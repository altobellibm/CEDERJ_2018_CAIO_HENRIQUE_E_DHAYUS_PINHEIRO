<!-- formulario que exibe um projeto salvo previamente no banco de dados.
Foi necessário diferenciar o formulário que exibe um projeto a ser criado e um que eixibe
os dados de um projeto já criado por causa de algumas peculiaridades na exibição de dados.
Enquanto as atividades do projeto, no criar, vem do orçamento, no manter, vem do projeto, por exemplo,
dentre outras coisas -->

<?php

if (isset($_GET['alt']))
	echo"<script language='javascript' type='text/javascript'>alert('Projeto criado sob nº".$_GET['id_proj']." ');</script>";

if (isset($_GET['id_proj'])){

	include("conexao.php");
	
	$id_tabela=$_GET['id_proj'];
	$tabela="projetos";
			
	// resgata a tabela de projetos
	
	$query="SELECT * from ".$tabela." WHERE id=".$id_tabela;
		
	$select= mysqli_query($connect,$query);
	
	$tbl=mysqli_fetch_assoc($select);
	
	// resgata a tabela de pf ou pj
	
	if ($tbl['tipo_solicitante']=="pf"){
		$query="SELECT * from pf WHERE cpf='".$tbl['solicitante']."'";
	}else{
		$query="SELECT * from pj WHERE cnpj='".$tbl['solicitante']."'";
	}
	
	$select= mysqli_query($connect,$query);
	
	$sol=mysqli_fetch_assoc($select);
	
	$html='<br><fieldset><form method="post" action="armazena_projeto.php" id="form_mt_proj" name="form_mt_proj">';
	
	$html.='<fieldset><legend>Refer&ecircncias do Projeto:</legend>';
	
	$html.='<table><tr><td><label for="id_proj">ID do Projeto: ';
	$html.='<input type="text" name="id_proj" value="'.$id_tabela.'" readonly></td>';
	$html.='<td><label for="id_orc">Ref.Orc: ID </label>';
	$html.='<input type="text" name="id_orc" value="'.$tbl['id_orc'].'" readonly></td>';
	$html.='<td><label for="data_criacao">Data de Criação: </label>';
	$html.='<input type="text" id="id_orc" value="'.$tbl['data_criacao'].'" readonly></td>';

	
	$html.='</tr></table></fieldset>';
	
	// funcao para criar a lista de operacoes
	
	function addOper($item, $y) {				
		
		include("conexao.php");
		
		$ln="";
	
		$query_select = "SELECT significado FROM abreviaturas where sigla=\"".$item."\"";
			
		$select = mysqli_query($connect,$query_select);
			
		$res=mysqli_fetch_assoc($select);
				
		$sign=$res['significado'];
	
		$ln.= <<<EOT
			<tr><td>
					
				<input type="checkbox" name='cv["$item"]' id="$item" 
EOT;

		if($y==1) $ln.="checked";
		
		$ln.=<<<EOR
				>
				<label for="$item">$sign</label>
	
				<input type="button" id='exibe["$item"]' name='ativ["$item"]' onClick='exibeAtiv(this);' value="↓">
	
				<div id='ativ["$item"]' class="escondido">
				
					<input type="hidden" name='teste[]' value="$item">
				
					<table border id='tab["$item"]'>
						<tr>
							<th>Opera&ccedil&atildeo A/B</th>
							<th>Data</th>
							<th>Hora</th>
							<th>Descri&ccedil&atildeo da atividade</th>
							<th>Excluir linha</th>
						</tr>
	
					</table>
	
					<input type="button" name="$item" onClick='inserirLinhaTabela("$item","","","","");' value="+"/>
				</div>
							
			</td></tr>
EOR;
			
		return $ln;
	}
	
	// tratamento para os dados do solicitante
	$html.='<input type="hidden" name="tipo_solicitante" value="'.$tbl['tipo_solicitante'].'">';
	
	if ($tbl['tipo_solicitante']=="pf"){
		$value=array($sol['nome_pf'],$tbl['solicitante'],$sol['tel'],$sol['cel'],$sol['email'],$sol['obs']);
		$html.=<<<SOLPF
			<fieldset>
			<legend>Dados do solicitante:</legend>
				<table>
					<tr>
						<td colspan="2">
							<label for="nome_pf">Nome:</label>
							<input type="text" name='pf["nome_pf"]' id="nome_pf" size="60" value="$value[0]">
						</td>
						<td>
							<label for="cpf">CPF:</label>
							<input type="text" name="cpf" id="cpf" oninput="mascara(this)" onblur="consulta(this)" required value="$value[1]">
						</td>
					</tr>
					<tr>
						<td>
							<label for="tel">Telefone Fixo:</label>
							<input type="text" name='pf["tel"]' id="tel" oninput="mascara(this)" value="$value[2]">
						</td>
						<td>
							<label for="cel">Celular:</label>
							<input type="text" name='pf["cel"]' id="cel" oninput="mascara(this)" value="$value[3]">
						</td>
						<td>
							<label for="email">E-mail:</label>
							<input type="text" name='pf["email"]' id="email" value="$value[4]">
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<label for="obs">Observa&ccedil&otildees:</label>
							<textarea name='pf["obs"]' id="obs" cols="92">"$value[5]"
							</textarea>
						</td>
					</tr>
				</table>
			</fieldset>	
SOLPF;
	}else{
		$value=array($sol['nome_pj'],$tbl['solicitante'],$sol['razao_social'],$sol['ie'],$sol['tel'],$sol['cel'],$sol['email'],$sol['obs']);
		$html.=<<<SOLPJ
			<fieldset>
			<legend>Dados do solicitante:</legend>
				<table>
					<tr>
						<td colspan="2">
							<label for="nome_pj">Nome do Representante:</label>
							<input type="text" name='pj["nome_pj"]' id="nome_pj" size="50" value="$value[0]">
						</td>
						<td>
							<label for="cnpj">CNPJ:</label>
							<input type="text" name="cnpj" id="cnpj" oninput="mascara(this)" onblur="consulta(this)" required value="$value[1]">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<label for="razao_social">Raz&atildeo Social:</label>
							<input type="text" name='pj["razao_social"]' id="razao_social" size="60" value="$value[2]">
						</td>
						<td>
							<label for="ie">Inscri&ccedil&atildeo Estadual:</label>
							<input type="text" name='pj["ie"]' id="ie" value="$value[3]">
						</td>
					</tr>
					<tr>
						<td>
							<label for="tel">Telefone Fixo:</label>
							<input type="text" name='pj["tel"]' id="tel" oninput="mascara(this)" value="$value[4]">
						</td>
						<td>
							<label for="cel">Celular:</label>
							<input type="text" name='pj["cel"]' id="cel" oninput="mascara(this)" value="$value[5]">
						</td>
						<td>
							<label for="email">E-mail:</label>
							<input type="text" name='pj["email"]' id="email" value="$value[6]" >
						</td>
					</tr>
					<tr>
						<td colspan="3">
							<label for="obs">Observa&ccedil&otildees:</label>
							<textarea name='pj["obs"]' id="obs" cols="92">"$value[7]"
							</textarea>
						</td>
					</tr>
				</table>
			</fieldset>
SOLPJ;
	}
	
	// tratamento quanto ao tipo de recomposicao
	
	$html.='<input type="hidden" name="tipo_recomposicao" value="'.$tbl['tipo_recomposicao'].'">';
	
	$query="SELECT significado from abreviaturas WHERE sigla='".$tbl['tipo_recomposicao']."'";
	
	$select= mysqli_query($connect,$query);
	
	$texto=mysqli_fetch_assoc($select);
	
	$html.='<fieldset><legend>Recomposi&ccedil&atildeo de '.$texto['significado'].':</legend>';
	
	if ($tbl['tipo_recomposicao']=="app"){
		$value=array($tbl['area_propriedade'],$tbl['area_app'],$tbl['l_rio']);
		$html.=<<<MED
			<table><tr><td><label for="area_propriedade"> &Aacuterea da Propriedade(ha):</label>
			<input type="text" name="area_propriedade" id="area_propriedade" required oninput="mascara(this);" value="$value[0]"></td>
			<td><label for="area_app">&Aacuterea de Preserva&ccedil&atildeo Permanente - APP (ha):</label>
			<input type="text" name='orc["area_app"]' id="area_app" oninput="mascara(this);" value="$value[1]"></td></tr>
			<tr><td><label for="l_rio">Largura aproximadamente<br>do riacho, córrego ou rio (m):</label>
			<input type="text" name='orc["l_rio"]' id="l_rio" required oninput="mascara(this);" value="$value[2]"></td></tr>
			</table>	
MED;
	}elseif ($tbl['tipo_recomposicao']=="are"){
		$value=array($tbl['area_propriedade'],$tbl['area_re']);
		$html.=<<<MED
			<table><tr><td><label for="area_propriedade"> &Aacuterea da Propriedade(ha):</label>
			<input type="text" name="area_propriedade" id="area_propriedade" required oninput="mascara(this);" value="$value[0]"></td>
			<td><label for="area_re">&Aacuterea de Reserva Excedente Existente (ha) - RL (ha):</label>
			<input type="text" name='orc["area_re"]' id="area_re" required oninput="mascara(this);" value="$value[1]"></td></tr>
			</table>
MED;
	}else{
		$value=array($tbl['area_propriedade'],$tbl['area_rl']);
		$html.=<<<MED
			<table><tr><td><label for="area_propriedade"> &Aacuterea da Propriedade(ha):</label>
			<input type="text" name="area_propriedade" id="area_propriedade" required oninput="mascara(this);" value="$value[0]"></td>
			<td><label for="area_rl">&Aacuterea de Reserva Legal - RL (ha):</label>
			<input type="text" name='orc["area_rl"]' id="area_rl" required oninput="mascara(this);" value="$value[1]"></td></tr>
			</table>
		
MED;
	}
	
	$html.='</fieldset>';
	
	// tratamento das operacoes
	
	// array marcados captura os checkbox que devem ser exibidos
	$marcados=array();
	
	// listar as operacoes selecionados previamente em orcamentos
	foreach($tbl as $key => $val) if ($val=="on"||$val==null) array_push($marcados, $key);
		
	$html.='<fieldset><legend>Opera&ccedil&otildees:</legend><fieldset><legend>Preparo da &Aacuterea:</legend><table>';
	
	$add = Array ("terrap_a_cult","terraceamento","isol_a","rocada_previa","comb_form","medicao","marcacao","coroamento","coveamento","fecha_covas","adubacao");
	
	$add=array_intersect($add,$marcados);
	
	foreach($add as $key => $val){
		if($tbl[$val]=="on"){
			$html.= addOper($val,1);
		}else{
			$html.= addOper($val,0);
		}
	}	
	
	$html.='</table></fieldset><fieldset><legend>Plantio:</legend><table>';
	
	$add = Array ("plantio_mudas","irrigacao");
	
	$add=array_intersect($add,$marcados);
	
	foreach($add as $key => $val){
		if($tbl[$val]=="on"){
			$html.= addOper($val,1);
		}else{
			$html.= addOper($val,0);
		}
	}
	
	$html.='</table></fieldset><fieldset><legend>P&oacutes Plantio:</legend><table>';
				
	$add = Array ("pos_irrigacao","replantio","pos_rocada","capina","p_adubacao","construcao");
	
	$add=array_intersect($add,$marcados);
	
	foreach($add as $key => $val){
		if($tbl[$val]=="on"){
			$html.= addOper($val,1);
		}else{
			$html.= addOper($val,0);
		}
	}
	
	$html.='</table></fieldset></fieldset>';
	
	$html.='<button type="submit" value="Submit">Salvar</button>   &Uacuteltima atualiza&ccedil&atildeo em '.$tbl['versao'].'</form></fieldset>';
	
	$query_ativ="select * from atividades where id_projeto=$id_tabela";
	
	$select=mysqli_query($connect, $query_ativ);
	
	if(mysqli_num_rows($select)>0){
		while($tbl=mysqli_fetch_assoc($select)){
			$oper=$tbl['oper'];
			$data_ativ=$tbl['data_ativ'];
			$hora=$tbl['hora'];
			$descricao=$tbl['descricao'];
			$ativ=$tbl['item'];
			$html.="<script> inserirLinhaTabela(\"$ativ\",\"$oper\",\"$data_ativ\",\"$hora\",\"$descricao\"); </script>";			
		}	
	}	
	
	echo $html;	
}
?>