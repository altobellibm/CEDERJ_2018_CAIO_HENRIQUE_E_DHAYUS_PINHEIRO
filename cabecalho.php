<!-- trecho que contém uma coleção de códigos e referencias que serão requisitadas em diversos pontos -->

<style type="text/css">
html {
	font-family: Arial, Helvetica, sans-serif;
}
table { 
	cellspacing: "10"; 
}
header {
	display:block; 
	margin-bottom:1px;
}
nav {
	display:block; 
	position:fixed;
	width: 17%; 
	float:left;
	height:100%;
	background-color:#666633;
}
section {
	display:block; 
	width:80%; 
	float:right;
	position:fixed;
	left:19%;
	overflow-y: auto;
	height:100%;
	bottom:1%;

}
.invisivel{
	visibility: hidden;
}
.rolagem {
    height:300px;
    width: 100%;    
    overflow-y: auto;
}
.w100 {
		width:100%;
		text-align:center;
}
.centrado{
	position: absolute;
    z-index: 1;
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%)
}
.escondido{ 
	display : none ;
}
.escuro{
	background: #DCDCDC;
}
.escuro:hover{
	background: #A9A9A9;
	color : #ffffff;
}
.claro{
	background: #ffffff	;
}
.claro:hover{
	background: #696969;
	color : #ffffff;
}
fieldset{
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 0px 0px 10px 0px;
	border: 1px solid #FFD2D2;
	background: #f4f7f8;
}
input[type=text],textarea{
	border:1px solid #e1e1e1;
	padding:10px;
	font-size:16px;
	background: rgba(255,255,255,.1);
}
input:focus{
	background: #d2d9dd;
}
button{
	cursor:pointer;
	background-color: #35aa47;
	color:#fff;
	font-size:15px;
	border:none;
	border-radius:3px;
}
button:hover{
	background-color: #1d943b !important;
}
a{
	display:inline-block;
	text-decoration: none;
	color:#666;
}
.menu {
		width:100%;
		font-family: Arial, Helvetica, sans-serif;
		font-weight: bold;
		text-align:center;
		cursor:pointer;
		background-color: #35aa47;
		color:#fff;
		font-size:15px;
		border:none;
		padding:10px 0px;
}
.menu:hover{
	background-color: #1d943b !important;
	text-decoration: none;
}
a:hover{
	text-decoration: underline;
}
a.seq{
	margin-left:30px;
}
	
</style>
<!-- favicon -->
<link rel="shortcut icon" href="favicon.png" />
<!-- arquivo de máscaras -->
<script type="text/javascript" src="mask.js"></script>
<!-- arquivo com códigos para a manipulacao das páginas -->
<script type="text/javascript" src="manip_forms.js"></script>
<!-- arquivo com código necessário para verificar se o usuário permanece autenticado -->
<?php include("verificacao.php"); ?>
