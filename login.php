<!-- codigo do login -->

<?php 
include_once("php/conexao.php");

	$login = $_POST['login'];
	$senha = $_POST['senha'];
  
	$sql = "SELECT * FROM usuarios WHERE login = '". $login."' AND senha = '".$senha."'";
	
    $verifica = mysqli_query($connect,$sql);
	if (mysqli_num_rows($verifica)<=0){
		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";
		session_destroy();

		unset ($_SESSION['id']);
		unset ($_SESSION['nome']);
		
		die();

	}else{
		$res=mysqli_fetch_assoc($verifica);
				
		session_start();
	
		$_SESSION['id'] = $res['id'];
		$_SESSION['nome'] = $res['nome'];
		  
		// trocar redirecionamento.php pela pagina principal
		header("Location:php/esqueleto.php");
	}
  
?>
