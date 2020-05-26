<?php
session_start();
if ($_SESSION['login']) {
	echo "
	<html>
<head>
<title>Profil</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' />
<link href='default.css' rel='stylesheet' type='text/css' media='all' />
<link href='fontawesome-templategit.css' rel='stylesheet' type='text/css' media='all' />
</head>
<body>
<div id='header-wrapper'>
	<div id='header' class='container'>
		<div id='logo'>
			<h1><a href='index.php'>Botanique</a></h1>
		</div>
		<div id='menu'>
			<ul=>
				<li><a href='#' accesskey='1' title=''>Page d'accueil</a></li>
				<li><a href='logout.php'>Se déconnecter</a></p></li>
				<li><a href='#' accesskey='3' title=''>++++++++++</a></li>
				<li><a href='#' accesskey='4' title=''>++++++++++</a></li>
				<li><a href='#' accesskey='5' title=''>++++++++++</a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>
	<p>Bienvenue ".$_SESSION['login']. " ! <br/><br/>

	<a href='changement_mdp.php'>Changer de mot de passe</a><br/>

	<a href='changement_login.php'>Changer de login</a><br/>

	<a href='changement_prenom.php'>Changer de prénom</a><br/>

	<a href='changement_nom.php'>Changer de nom</a>";
}
else
{
	header("Location:connexion.php");
}
?>


<?php
echo '<style>
p
{
	text-align : center;
	font-family: "Source Sans Pro", Helvetica, sans-serif;
	font-size: 16pt;
	font-weight: 400;
	line-height: 1.75em;
	color : white;
}

.input
{
	display:block;
	margin:auto;
}

body
{
	background-image: linear-gradient(#95a445, #844613);
}
</style>';
?>