<!-- trecho responsável por encerrar uma sessao de usuário -->

<?php 
// Inicia sessões, para assim poder destruí-las 
session_start(); 
session_destroy(); 
 
header("Location: index.html"); 
?>