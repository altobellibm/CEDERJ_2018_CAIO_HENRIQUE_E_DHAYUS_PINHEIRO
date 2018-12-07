/* Trecho dedicado para a adaptação dos formulários para cada tipo de recomposição  */
/* conforme o usuario seleciona cada radio button, os campos do formulário sao adequados */

ARL='<fieldset><legend>Medidas:</legend>\
	<table><tr><td><label for="area_propriedade"> &Aacuterea da Propriedade(ha):</label>\
	<input type="text" name="area_propriedade" id="area_propriedade" required oninput="mascara(this);"></td>\
	<td><label for="area_rl">&Aacuterea de Reserva Legal - RL (ha):</label>\
	<input type="text" name=\'orc["area_rl"]\' id="area_rl" required oninput="mascara(this);"></td></tr>\
	</table></fieldset>';
    
APP='<fieldset><legend>Medidas:</legend>\
	<table><tr><td><label for="area_propriedade"> &Aacuterea da Propriedade(ha):</label>\
	<input type="text" name="area_propriedade" id="area_propriedade" required oninput="mascara(this);"></td>\
	<td><label for="area_app">&Aacuterea de Preserva&ccedil&atildeo Permanente - APP (ha):</label>\
	<input type="text" name=\'orc["area_app"]\' id="area_app" oninput="mascara(this);"></td></tr>\
	<tr><td><label for="l_rio">Largura aproximadamente<br>do riacho, córrego ou rio (m):</label>\
	<input type="text" name=\'orc["l_rio"]\' id="l_rio" required oninput="mascara(this);"></td></tr>\
	</table></fieldset>';
	  
ARE='<fieldset><legend>Medidas:</legend>\
	<table><tr><td><label for="area_propriedade"> &Aacuterea da Propriedade(ha):</label>\
	<input type="text" name="area_propriedade" id="area_propriedade" required oninput="mascara(this);"></td>\
	<td><label for="area_re">&Aacuterea de Reserva Excedente Existente - RE (ha):</label>\
	<input type="text" name=\'orc["area_re"]\' id="area_re" required oninput="mascara(this);"></td></tr>\
	</table></fieldset>';

regiao_medidas = new Array();

regiao_medidas[0]=APP;
regiao_medidas[1]=ARL;
regiao_medidas[2]=ARE;
						
function Medidas(n) {
	document.getElementById("medidas").innerHTML=regiao_medidas[n];
}

/* Trecho dedicado para a adaptação dos formulários de consulta para cada tipo de solicitante */
/* conforme o usuario seleciona cada radio button, os campos do formulário sao adequados */

PF='<table><tr><td><label for="cpf">CPF: </label>\
	<input type="text" name="solicitante" id="cpf" oninput="mascara(this);"></td>\
	<td><label for="nome_pf">Nome: </label>\
	<input type="text" name="nome_pf" id="nome_pf"></td>';
	
PJ='<table><tr><td><label for="cnpj">CNPJ: </label>\
	<input type="text" name="solicitante" id="cnpj" oninput="mascara(this);"></td>\
	<td><label for="razao_social">Raz&atildeo Social: </label>\
	<input type="text" name="razao_social" id="razao_social"></td>';
	
	
regiao_pessoa = new Array();

regiao_pessoa[0]=PF;
regiao_pessoa[1]=PJ;

function Solicitante_consulta(n) {
	document.getElementById("dados_solicitante_consulta").innerHTML=regiao_pessoa[n];
}

function Solicitante_pf() {
	document.getElementById("solicitante").innerHTML = document.getElementById("solicitante_pf").innerHTML;
}

function Solicitante_pj() {
	document.getElementById("solicitante").innerHTML = document.getElementById("solicitante_pj").innerHTML;
}

/* funcao para exibir as tabelas ou esconde-las, bem como alterar a aparencia do botao */

function exibeAtiv(n) {	
		
	if (n.value == "↓") {
		document.getElementById(n.name).style.display = "block";
		n.value = "↑";
	}else{
		document.getElementById(n.name).style.display = "none";
		n.value = "↓";
	}
	
}

/* Função responsável por inserir linhas na tabela de forma dinâmica*/

function inserirLinhaTabela(n,oper,data_ativ,hora,descricao) {
	var div='tab["'+n+'"]';
	// Captura a referência da tabela com id “div”
    var table = document.getElementById(div);
    // Captura a quantidade de linhas já existentes na tabela
    var numOfRows = table.rows.length;
    // Captura a quantidade de colunas da última linha da tabela
    var numOfCols = table.rows[numOfRows-1].cells.length;

    // Insere uma linha no fim da tabela.
    var newRow = table.insertRow(numOfRows);

    // Faz um loop para criar as colunas
    for (var j = 0; j < numOfCols; j++) {
        // Insere uma coluna na nova linha 
        newCell = newRow.insertCell(j);
        // Insere um conteúdo na coluna
		if (j==0){
			newCell.innerHTML ='<input type="text" name="'+n+'oper[]\'" required id="oper" oninput="mascara(this);" value='+oper+'>';
		} else if (j==1) {
			newCell.innerHTML ='<input type="text" name="'+n+'data_ativ[]\'" id="data" oninput="mascara(this);" required value='+data_ativ+'>';
		} else if (j==2) {
			newCell.innerHTML ='<input type="text" name="'+n+'hora[]\'" id="hora" oninput="mascara(this);" required value='+hora+'>';
		} else if (j==3) {	
			newCell.innerHTML ='<input type="text" name="'+n+'descricao[]\'" required id="desc" oninput="mascara(this);" value='+descricao+'>';
        } else {
			newCell.innerHTML ='<input type="button" onClick=\'removeLinhaTabela(this);\' value="-" />';
		}
    }
}

/* Função responsável por inserir linhas na tabela de forma dinâmica*/

function removeLinhaTabela(n){
	teste = n.parentNode;
	teste.parentNode.parentNode.removeChild(teste.parentNode);
}