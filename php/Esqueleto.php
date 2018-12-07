<!-- codigo responsável pela estrutura básica do sistema, um esqueleto do sistema, fazendo uma analogia com a biologia -->

<!DOCTYPE html>
<html>

<head>

<?php 

	include("cabecalho.php"); 
	
?>
<title>reVIVA </title>

  
</head>

<body>

<nav>
	<br>
	<img src="../imagens/Reviva Logo.png" style="width:80%; height:auto; display: block;margin-left: auto;margin-right: auto;">
	<br>
	<?php 
		echo '<div style="text-decoration: none; color:#FFFFFF;font-family: Arial, Helvetica, sans-serif;
		font-weight: bold;text-align:center;">Bem vindo, '.$_SESSION['nome']."!</div>";
	?>
	<br><br>
 
	
	<a href="?return" class="menu">INÍCIO</a><br><br>
    <a href="?pg=form_criar_orcamento.php" class="menu">CRIAR ORÇAMENTO</a><br><br>
	<a href="?pg=form_consultar_orcamento.php" class="menu">CONSULTAR ORÇAMENTOS</a><br><br>
	<a href="?pg=form_criar_projeto.php" class="menu">CRIAR PROJETO</a><br><br>
	<a href="?pg=form_consultar_projeto.php" class="menu">CONSULTAR PROJETOS</a><br><br>
	<a href="?pg=form_tarifas.php" class="menu">TARIFAS</a><br><br>
	<a href="sair.php" class="menu">SAIR</a><br><br>


</nav>

<section>

	<?php
		$pg = ( isset( $_GET['pg'] )) ? $_GET['pg'] : null; 
 
		if ($pg!=''){
				include($pg);
			}else{
				echo '<img src="../imagens/Reviva Logo.png" style="width:80%; height:auto; 
				display: block;  margin: 0;position: absolute;top: 40%;
				left: 50%;transform: translate(-50%, -50%);">';
			}
		 
	?>

	
</section>

</body>

</html>