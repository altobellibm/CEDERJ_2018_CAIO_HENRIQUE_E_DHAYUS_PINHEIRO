<?php

include("conexao.php");

/* Carrega a classe DOMPdf */
require_once("../dompdf/dompdf_config.inc.php");

/* Cria a instância */
$dompdf = new DOMPDF();

// resgata a tabela de orcamentos

$query="SELECT * from orcamentos WHERE id=".$_GET['id_orc'];

$select= mysqli_query($connect,$query);

$tbl=mysqli_fetch_assoc($select);

//define o estilo da página pdf
$html='<html><head>
   <style type="text/css">
  @page {
       margin: 150px 50px 80px 50px;
   }
   #head{
       font-size: 20px;
       text-align: center;
       width: 100%;
       position: fixed;
       top: -110px;
       left: 0;
       right: 0;
   }
   #corpo{
	   font-size: 20px;
       width: 600px;
       position: relative;
       margin: auto;
	   top:40px;
   }
   table{
       width: 100%;
       position: relative;
	   margin: auto;
   }
   td{
	      vertical-align: bottom;
   }
   #footer {
       position: fixed;
       bottom: 0;
       width: 100%;
       text-align: right;
       border-top: 1px solid gray;
   }
   #footer .page:after{ 
       content: counter(page); 
   }
   
   </style></head><body>';

date_default_timezone_set('America/Sao_Paulo');

   
//define o rodape e o cabecalho da página
$html.='<div id="footer">
	<table><tr>
	<td style="text-align:left;">Printed on '.date('l jS \of F Y h:i:s A').'</td>
    <td class="page"> Página </td></tr></table>
	</div>
	<div id="head">
	<table style="width:100%;heigth:4000px;"><tr>
	<td style="width:250px;"><img src="../imagens/Reviva logo.png" style="width:250px; heigth:auto; display:block;">
	<br></td><td style="text-align:center;font-weight: bold;font-size:40px;"> Orçamento </td>';


// resgata a tabela de pf ou pj

if ($tbl['tipo_solicitante']=="pf"){
	$query="SELECT * from pf WHERE cpf='".$tbl['solicitante']."'";
}else{
	$query="SELECT * from pj WHERE cnpj='".$tbl['solicitante']."'";
}

$select= mysqli_query($connect,$query);

$sol=mysqli_fetch_assoc($select);



// imprimi os dados do orcamento

$ignorados = Array ("solicitante","area_propriedade");

$outros = array ("custo_fixo","validade","data_criacao","total");

$preparo = Array ("terrap_a_cult","terraceamento","isol_a","rocada_previa","comb_form","medicao","marcacao","coroamento","coveamento","fecha_covas","adubacao");
$t_preparo = "";
$plantio = Array ("plantio_mudas","irrigacao");
$t_plantio="";
$pos_plantio = Array ("pos_irrigacao","replantio","pos_rocada","capina","p_adubacao","construcao");
$t_pos_plantio="";


foreach ($tbl as $key => $value) {	
	if (!in_array($key,$ignorados)){
		
		if ($key=="tipo_solicitante"){

			// imprimi os dados do solicitante

			$html .= '<div id="corpo">Dados do Solicitante<BR><BR>';

			foreach ($sol as $key => $value) {
				
				$query="SELECT significado_ex from abreviaturas WHERE sigla='".$key."'";

				$select= mysqli_query($connect,$query);

				$texto=mysqli_fetch_assoc($select);
				
				if($value==null) $value=" ";
	
				$html .= $texto['significado_ex'].": ".$value."<BR>";
	
			}
		}elseif ($key=="tipo_recomposicao"){

			// imprimi os dados da recomposicao

			$query="SELECT significado_ex from abreviaturas WHERE sigla='".$value."'";

			$select= mysqli_query($connect,$query);

			$texto=mysqli_fetch_assoc($select);
	
			$html .= "<BR>Recomposição de ".$texto['significado_ex']."<BR><BR>";
			
			if ($value=="app"){
				array_push($ignorados, "area_rl","area_re");
				$html .= "Area da Propriedade (ha): ".$tbl['area_propriedade']."<BR>";
				$html .= "Area de Preservacao Permanente - APP (ha): ".$tbl['area_app']."<BR>";
				$html .= "Largura aproximadamente do riacho, corrego ou rio (m): ".$tbl['l_rio']."<BR><BR>";
			}elseif($value=="are"){
				array_push($ignorados, "area_rl","area_app","l_rio");
				$html .= "Área da Propriedade (ha): ".$tbl['area_propriedade']."<BR>";
				$html .= "Area de Reserva Excedente Existente - RE (ha): ".$tbl['area_re']."<BR><BR>";
			}else{
				array_push($ignorados, "area_re","area_app","l_rio");
				$html .= "Area da Propriedade (ha): ".$tbl['area_propriedade']."<BR>";
				$html .= "Area de Reserva Legal - RL (ha): ".$tbl['area_rl']."<BR><BR>";
			}
			$html .= "Custos<BR><BR>";
			
		}elseif (in_array($key,$outros)){
			$query="SELECT significado_ex from abreviaturas WHERE sigla='".$key."'";

			$select= mysqli_query($connect,$query);

			$texto=mysqli_fetch_assoc($select);
					
			$$key=$texto['significado_ex'].": ".$value.'<br>';

		}elseif ($key=="id"){
			$query="SELECT significado_ex from abreviaturas WHERE sigla='".$key."'";

			$select= mysqli_query($connect,$query);

			$texto=mysqli_fetch_assoc($select);
					
			$html .= '<td>'.$texto['significado_ex'].": ".$value;
		
		}elseif ($key=="id_usuario"){
			$query="SELECT significado_ex from abreviaturas WHERE sigla='".$key."'";

			$select= mysqli_query($connect,$query);

			$texto=mysqli_fetch_assoc($select);
					
			$html .= '<br>'.$texto['significado_ex'].": ".$value.'</td></tr></table><hr></div>';
			
		}else{
			if ($value=="on"){
				$query="SELECT significado_ex from abreviaturas WHERE sigla='".$key."'";

				$select= mysqli_query($connect,$query);

				$texto= mysqli_fetch_assoc($select);
				
				if (in_array($key,$plantio)){
					$t_plantio .= $texto['significado_ex'].": ".$tbl["val_$key"]."<BR>";
				}elseif(in_array($key,$pos_plantio)){
					$t_pos_plantio .= $texto['significado_ex'].": ".$tbl["val_$key"]."<BR>";
				}elseif(in_array($key,$preparo)){
					$t_preparo .= $texto['significado_ex'].": ".$tbl["val_$key"]."<BR>";
				}
			}
			array_push($ignorados,'val_'.$key);
		}
	}
}

$html.= $custo_fixo.'<br>';

if ($t_preparo!="")
	$html.='Preparo<br><br>'.$t_preparo;

if ($t_plantio!="")
	$html.='<br>Plantio<br><br>'.$t_plantio;

if ($t_pos_plantio!="")
	$html.='<br>Pós-Plantio<br><br>'.$t_pos_plantio;

$html.= '<br>'.$total.'<br>'.$data_criacao.'<br>'.$validade.'<br>';

$html.='</div>
	</body></html>  ';


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