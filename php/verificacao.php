<!-- trecho responsável por verificar se a sessão de algum usuário continua ativa -->

<?PHP
session_start();

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['id']) and !isset($_SESSION['nome']) ) {
	//Destrói
	session_destroy();

	//Limpa
	unset ($_SESSION['id']);
	unset ($_SESSION['nome']);
	
	//Redireciona para a página de autenticação
	header('location:../index.html');
}
?>