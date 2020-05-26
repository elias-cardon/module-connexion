<?php
session_start();
if (isset($_SESSION['login'])) {
	$username = $_SESSION['login'];
	if (isset($_POST['submit'])) {
		$prenom = $_POST['prenom'];
		$newprenom = $_POST['newprenom'];
		$repeatnewprenom = $_POST['repeatnewprenom'];
		if ($prenom && $newprenom && $repeatnewprenom) {
			if ($newprenom == $repeatnewprenom) {
				$db = mysqli_connect('localhost', 'root', '') or die('Erreur');
				mysqli_select_db($db, 'moduleconnexion');
				$query = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '$username' AND prenom = '$prenom'");
				$rows = mysqli_num_rows($query);
				if ($rows==1) {
					$newpass = mysqli_query($db, "UPDATE utilisateurs SET prenom='$newprenom' WHERE login='$username'");
					die("Votre prénom a bien été modifié. Vous pouvez vous <a href='connexion.php'>connecter</a>.");
				}
				else
				{
					echo "Votre ancien prénom est incorrect";
				}
			}
			else
				{echo "Les deux champs doivent être identiques";}
		
		}
		else
		{
			echo "Veuillez saisir tous les champs";
		}
	}


echo '<form method="POST" action="changement_prenom.php">
<p>Votre ancien prénom</p>
<input class="input" type="text" name="prenom"<br/>
<p>Votre nouveau prénom</p>
<input class="input" type="text" name="newprenom">
<p>Répétez votre nouveau prénom</p>
<input class="input" type="text" name="repeatnewprenom"><br/><br/>
<input class="input" type="submit" value="Changer de prénom" name="submit"</input>
</form>
	';
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