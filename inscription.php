<?php
session_start();
if(isset($_POST['submit']))
{
	$login = htmlentities(trim($_POST['login']));
	$prenom = htmlentities(trim($_POST['prenom']));
	$nom = htmlentities(trim($_POST['nom']));
	$password = htmlentities(trim($_POST['password']));
	$repeatpassword = htmlentities(trim($_POST['repeatpassword']));

	if($login && $prenom && $nom && $password && $repeatpassword)
	{
		if($password == $repeatpassword)
		{
			$db = mysqli_connect('localhost', 'root', '') or die('Erreur');
			mysqli_select_db($db, 'moduleconnexion');

			$query = mysqli_query($db, "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES('$login', '$prenom', '$nom', '$password');");

			die("Inscription terminée. <a href='connexion.php'>Connectez-vous</a>.");
		}
		else
		{
			echo "Les mots de passes doivent être identiques";
		}
	}
	else
	{
		echo "Veuillez saisir tous les champs";
	}
}
?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
		<link rel="icon" type="image/png" href="images/avatar.png">
	</head>
	<body class="color">
		<!-- Header -->
			<header id="header">
				<nav><a href="index.php">Accueil</a> | <a href="connexion.php">Connexion</a></nav>
			</header>
			<!-- Main -->
		<main>
			<h1>Inscription</h1><br/>
				<form method="post" action="inscription.php">
        			<p>Login</p>
        			<input class="input" type="text" name="login">
        			<p>Prénom</p>
        			<input class="input" type="text" name="prenom">
        			<p>Nom</p>
        			<input class="input" type="text" name="nom">
        			<p>Mot de passe</p>
        			<input class="input" type="password" name="password">
        			<p>Répétez votre mot de passe</p>
        			<input class="input" type="password" name="repeatpassword"><br><br>
        			<input class="input" type="submit" name="submit" value="Valider">
				</form>
		</main>
		<!-- Footer -->
<!-- 			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
					</ul>
				</div>
			</footer> -->

		<!-- Scripts -->
<!-- 			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script> -->
	</body> 
</html>

<?php
echo '<style>
h1
{
	text-align : center;
	text-decoration : underline;
}

p
{
	text-align : center;
	color : black;
}

.input
{
	display:block;
	margin:auto;
}

.color
{
	background-color: #E0D8E0;
}
</style>';
?>