<?php
session_start();
if (isset($_SESSION['login'])) {
	$username = $_SESSION['login'];
	if (isset($_POST['submit'])) {
		$nom = $_POST['nom'];
		$newnom = $_POST['newnom'];
		$repeatnewnom = $_POST['repeatnewnom'];
		if ($nom && $newnom && $repeatnewnom) {
			if ($newnom == $repeatnewnom) {
				$db = mysqli_connect('localhost', 'root', '') or die('Erreur');
				mysqli_select_db($db, 'moduleconnexion');
				$query = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '$username' AND nom = '$nom'");
				$rows = mysqli_num_rows($query);
				if ($rows==1) {
					$newpass = mysqli_query($db, "UPDATE utilisateurs SET nom='$newnom' WHERE login='$username'");
					die("Votre nom a bien été modifié. Vous pouvez vous <a href='connexion.php'>connecter</a>.");
				}
				else
				{
					echo "Votre ancien nom est incorrect";
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


echo '<form method="POST" action="changement_nom.php">
<p>Votre ancien nom</p>
<input class="input" type="text" name="nom"<br/>
<p>Votre nouveau nom</p>
<input class="input" type="text" name="newnom">
<p>Répétez votre nouveau nom</p>
<input class="input" type="text" name="repeatnewnom"><br/><br/>
<input class="input" type="submit" value="Changer de nom" name="submit"</input>
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