<?php

include("conexao.php");

/* Carrega a classe DOMPdf */
require_once("../dompdf/dompdf_config.inc.php");

/* Cria a instância */
$dompdf = new DOMPDF();

// resgata a tabela de orcamentos

$query="SELECT * from projetos WHERE id=".$_GET['id_proj'];

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

   
//define o cabeçalho da página
$html.='<div id="footer">
	<table><tr>
	<td style="text-align:left;">Printed on '.date('l jS \of F Y h:i:s A').'</td>
    <td class="page"> Página </td></tr></table>
	</div>
	<div id="head">
	<table style="width:100%;heigth:4000px;"><tr>
	<td style="width:250px;"><img src="../imagens/Reviva logo.png" style="width:250px; heigth:auto; display:block;">
	<br></td><td style="text-align:center;font-weight: bold;font-size:40px;"> Projeto </td>';


// resgata a tabela de pf ou pj

if ($tbl['tipo_solicitante']=="pf"){
	$query="SELECT * from pf WHERE cpf='".$tbl['solicitante']."'";
}else{
	$query="SELECT * from pj WHERE cnpj='".$tbl['solicitante']."'";
}

$select= mysqli_query($connect,$query);

$sol=mysqli_fetch_assoc($select);

// imprimi os dados do projeto

$ignorados = Array ("solicitante","area_propriedade");

$t_preparo = "";
$t_plantio="";
$t_pos_plantio="";

$preparo = Array ("terrap_a_cult","terraceamento","isol_a","rocada_previa","comb_form","medicao","marcacao","coroamento","coveamento","fecha_covas","adubacao");
$plantio = Array ("plantio_mudas","irrigacao");
$pos_plantio = Array ("pos_irrigacao","replantio","pos_rocada","capina","p_adubacao","construcao");

$add=array_merge($preparo,$plantio,$pos_plantio);
	
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
				$html .= "Area de Reserva Excedente Existente - RL (ha): ".$tbl['area_re']."<BR><BR>";
			}else{
				array_push($ignorados, "area_re","area_app","l_rio");
				$html .= "Area da Propriedade (ha): ".$tbl['area_propriedade']."<BR>";
				$html .= "Area de Reserva Legal - RL (ha): ".$tbl['area_rl']."<BR><BR>";
			}
			$html.="<br>Operações do projeto<br><br>";
			
		}elseif ($key=="data_criacao"){
			$query="SELECT significado_ex from abreviaturas WHERE sigla='".$key."'";

			$select= mysqli_query($connect,$query);

			$texto=mysqli_fetch_assoc($select);
					
			$$key= $texto['significado_ex'].": ".$value."<BR>";
			
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
			if (in_array($key,$add)){
				if ($value!="X"){
					$query="SELECT significado_ex from abreviaturas WHERE sigla='".$key."'";

					$select= mysqli_query($connect,$query);

					$texto= mysqli_fetch_assoc($select);
					
					$operacoes= '<br>+ '.$texto['significado_ex'];
					
					if($value=="on"){
						$operacoes.=" [CONCLUIDA]";
					}
					
					$operacoes.=":<br>";	
					
					$query="SELECT * from atividades WHERE id_projeto=".$_GET['id_proj']." and item='".$key."'";

					$select= mysqli_query($connect,$query);

					if(mysqli_num_rows($select)>0){
						$operacoes.=<<<EOT
							<table border=1>
								<tr>
									<th>Operação A/B</th>
									<th>Data</th>
									<th>Hora</th>
									<th>Descrição da atividade</th>
								</tr>
EOT;
						while($texto=mysqli_fetch_assoc($select)){
							$operacoes.=<<<EOD
							<tr>
									<td style="vertical-align: middle;">$texto[oper]</td>
									<td style="vertical-align: middle;">$texto[data_ativ]</th>
									<td style="vertical-align: middle;">$texto[hora]</th>
									<td style="vertical-align: middle;">$texto[descricao]</td>
								</tr>
EOD;
						}
						$operacoes.="</table>";
					}else{
						$operacoes.="Sem atividades para essa operação<br>";
					}	
					if (in_array($key,$plantio)){
						$t_plantio .= $operacoes;
					}elseif(in_array($key,$pos_plantio)){
						$t_pos_plantio .= $operacoes;
					}elseif(in_array($key,$preparo)){
						$t_preparo .= $operacoes;
					}				
				}
			}
		}
	}

}

if ($t_preparo!="")
	$html.='Preparo<br>'.$t_preparo;

if ($t_plantio!="")
	$html.='<br>Plantio<br>'.$t_plantio;

if ($t_pos_plantio!="")
	$html.='<br>Pós-Plantio<br>'.$t_pos_plantio;

$html.= '<br>'.$data_criacao;

$html.='</div>
	</body></html>  ';

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