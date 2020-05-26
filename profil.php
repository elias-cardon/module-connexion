<?php
session_start();
if ($_SESSION['login']) {
	echo "<nav><a href='index.php'>Accueil</a></nav>
	<p>Bienvenue ".$_SESSION['login']. " ! <br/><br/>

	<a href='changement_mdp.php'>Changer de mot de passe</a><br/>

	<a href='changement_login.php'>Changer de login</a><br/>

	<a href='changement_prenom.php'>Changer de prénom</a><br/>

	<a href='changement_nom.php'>Changer de nom</a><br/>

	<a href='logout.php'>Se déconnecter</a></p>";
}
else
{
	header("Location:connexion.php");
}
?>


<?php
echo '<style>
h1
{
	text-align : center;
	font-family: "Source Sans Pro", Helvetica, sans-serif;
	text-decoration : underline;
}
p
{
	text-align : center;
	font-family: "Source Sans Pro", Helvetica, sans-serif;
	font-size: 16pt;
	font-weight: 400;
	line-height: 1.75em;
	color : black;
}

.input
{
	display:block;
	margin:auto;
}

body
{
	background-color: #E4E0E0;
}
</style>';
?>