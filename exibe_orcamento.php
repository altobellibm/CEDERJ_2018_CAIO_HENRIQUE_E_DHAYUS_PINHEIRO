<?php

include("conexao.php");

/* Carrega a classe DOMPdf */
require_once("dompdf/dompdf_config.inc.php");

/* Cria a instância */
$dompdf = new DOMPDF();

// resgata a tabela de orcamentos

$query="SELECT * from orcamentos WHERE id=".$_GET['id_orc'];

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

// imprimi os dados do orcamento

$ignorados = Array ("solicitante","area_propriedade");

$outros = array ("custo_fixo","validade","data_criacao","total","id","id_usuario");
	
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
				$html .= "Area de Reserva Excedente Existente - RE (ha): ".$tbl['area_re']."<BR><BR>";
			}else{
				array_push($ignorados, "area_re","area_app","l_rio");
				$html .= "Area da Propriedade(ha): ".$tbl['area_propriedade']."<BR>";
				$html .= "Area de Reserva Legal - RL (ha): ".$tbl['area_rl']."<BR><BR>";
			}
		}elseif (in_array($key,$outros)){
			$query="SELECT significado_ex from abreveaturas WHERE sigla='".$key."'";

			$select= mysqli_query($connect,$query);

			$texto=mysqli_fetch_assoc($select);
					
			$html .= $texto['significado_ex'].": ".$value."<BR>";	
			
		}else{
			if ($value=="on"){
				$query="SELECT significado_ex from abreveaturas WHERE sigla='".$key."'";

				$select= mysqli_query($connect,$query);

				$texto= mysqli_fetch_assoc($select);
			
				$html .= $texto['significado_ex'].": ".$tbl["val_$key"]."<BR>";	
			}
			array_push($ignorados,'val_'.$key);
		}
	}

}

/* Carrega seu HTML */
$dompdf->load_html($html);

/* Renderiza */
$dompdf->render();

/* Exibe */
$dompdf->stream(
    "orcamento".$_GET['id_orc'].".pdf", /* Nome do arquivo de saída */
    array(
        "Attachment" => false /* Para download, altere para true */
    )
);
 ?>