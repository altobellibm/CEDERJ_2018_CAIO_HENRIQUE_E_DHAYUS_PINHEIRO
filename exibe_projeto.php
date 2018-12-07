<?php

include("conexao.php");

/* Carrega a classe DOMPdf */
require_once("dompdf/dompdf_config.inc.php");

/* Cria a instância */
$dompdf = new DOMPDF();

// resgata a tabela de orcamentos

$query="SELECT * from projetos WHERE id=".$_GET['id_proj'];

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

$html= "";

// imprimi os dados do projeto

$ignorados = Array ("solicitante","area_propriedade");

$outros = array ("data_criacao","id","id_usuario");

$add1 = Array ("terrap_a_cult","terraceamento","isol_a","rocada_previa","comb_form","medicao","marcacao","coroamento","coveamento","fecha_covas","adubacao");
$add2 = Array ("plantio_mudas","irrigacao");
$add3 = Array ("pos_irrigacao","replantio","pos_rocada","capina","p_adubacao","construcao");

$add=array_merge($add1,$add2,$add3);
	
foreach ($tbl as $key => $value) {	
	if (!in_array($key,$ignorados)){
		
		if ($key=="tipo_solicitante"){

			// imprimi os dados do solicitante

			$html .= "<BR>Dados do Solicitante<BR><BR>";

			foreach ($sol as $key => $value) {
				
				$query="SELECT significado_ex from abreveaturas WHERE sigla='".$key."'";

				$select= mysqli_query($connect,$query);

				$texto=mysqli_fetch_assoc($select);
				
				if($value==null) $value=" ";
	
				$html .= $texto['significado_ex'].": ".$value."<BR>";
	
			}
		}elseif ($key=="tipo_recomposicao"){

			// imprimi os dados da recomposicao

			$query="SELECT significado_ex from abreveaturas WHERE sigla='".$value."'";

			$select= mysqli_query($connect,$query);

			$texto=mysqli_fetch_assoc($select);
	
			$html .= "<BR>Recomposição de ".$texto['significado_ex']."<BR><BR>";
			
			if ($value=="app"){
				array_push($ignorados, "area_rl","area_re");
				$html .= "Area da Propriedade(ha): ".$tbl['area_propriedade']."<BR>";
				$html .= "Area de Preservacao Permanente - APP (ha): ".$tbl['area_app']."<BR>";
				$html .= "Largura aproximadamente do riacho, corrego ou rio (m): ".$tbl['l_rio']."<BR><BR>";
			}elseif($value=="are"){
				array_push($ignorados, "area_rl","area_app","l_rio");
				$html .= "Área da Propriedade(ha): ".$tbl['area_propriedade']."<BR>";
				$html .= "Area de Reserva Excedente Existente - RL (ha): ".$tbl['area_re']."<BR><BR>";
			}else{
				array_push($ignorados, "area_re","area_app","l_rio");
				$html .= "Area da Propriedade(ha): ".$tbl['area_propriedade']."<BR>";
				$html .= "Area de Reserva Legal - RL (ha): ".$tbl['area_rl']."<BR><BR>";
			}
			$html.="Operações do projeto<br>";
			
		}elseif (in_array($key,$outros)){
			$query="SELECT significado_ex from abreveaturas WHERE sigla='".$key."'";

			$select= mysqli_query($connect,$query);

			$texto=mysqli_fetch_assoc($select);
					
			$html .= $texto['significado_ex'].": ".$value."<BR>";	
			
		}else{
			if (in_array($key,$add)){
				if ($value!="X"){
					$query="SELECT significado_ex from abreveaturas WHERE sigla='".$key."'";

					$select= mysqli_query($connect,$query);

					$texto= mysqli_fetch_assoc($select);
				
					$html .= '<br>+ '.$texto['significado_ex'];
					
					if($value=="on"){
						$html.=" [CONCLUIDA]";
					}
					
					$html.=":<br>";	
					
					$query="SELECT * from atividades WHERE id_projeto=".$_GET['id_proj']." and item='".$key."'";

					$select= mysqli_query($connect,$query);

					if(mysqli_num_rows($select)>0){
						$html.=<<<EOT
							<table border=1>
								<tr>
									<th>Operação A/B</th>
									<th>Data</th>
									<th>Hora</th>
									<th>Descrição da atividade</th>
								</tr>
EOT;
						while($texto=mysqli_fetch_assoc($select)){
							$html.=<<<EOD
							<tr>
									<td>$texto[oper]</td>
									<td>$texto[data_ativ]</th>
									<td>$texto[hora]</th>
									<td>$texto[descricao]</td>
								</tr>
EOD;
						}
						$html.="</table>";
					}else{
						$html.="Sem atividades para essa operação<br>";
					}					
				}
			}
		}
	}

}

/* Carrega seu HTML */
$dompdf->load_html($html);

/* Renderiza */
$dompdf->render();

/* Exibe */
$dompdf->stream(
    "projeto".$_GET['id_proj']."pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
	
?>