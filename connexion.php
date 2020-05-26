<?php
session_start();
if (isset($_POST['submit'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];
	if ($login && $password) {
		$db = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($db, 'moduleconnexion');

		$query = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login='$login' && password='$password'");
		$rows = mysqli_num_rows($query);
		if ($rows==1) {
			$_SESSION['login'] = $login;
			header('Location:profil.php');
		}
		else
		{
			echo "Login ou password incorrect";
		}
	}

	else
	{
		echo "Veuillez saisir tous les champs.";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
		<link rel="icon" type="image/png" href="images/avatar.png">
	</head>
	<body class="color">
		<!-- Header -->
			<header id="header">
				<nav><a href="index.php">Accueil</a> | <a href="inscription.php">Inscription</a></nav>
			</header>
			<!-- Main -->
		<main>
			<h1>Connexion</h1>
				<form method="post" action="connexion.php">
        			<p>Login</p>
        			<input class="input" type="text" name="login">
        			<p>Mot de passe</p>
        			<input class="input" type="password" name="password"><br/><br/>
        			<input class="input" type="submit" name="submit" value="Valider"><br/>
				</form>
		</main>
		<!-- Footer -->
			<!-- <footer id="footer">
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
			<!-- <script src="assets/js/jquery.min.js"></script>
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

.color
{
	background-color: #E4E0E0;
}
</style>';
?>