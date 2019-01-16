<?php
require 'utils.inc.php';

session_start();
///////////////////////////////////////////////////////////////////////////////////////////
///Calcul de toutes les variables///
$ok = false;
$message = 'Erreur';

if (isset($_POST['username']) && isset($_POST['password'])) {
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	if(!isInDb($user)) {
			$connection = connection();
			$insert = $connection->prepare('INSERT INTO User(MAIL, PASS) VALUES (:username, :pass)');
			$insert->bindParam(':username', $user);
			$insert->bindParam(':pass', $pass);
			$insert->execute();
			$message = 'Felicitation vous etes inscris';
			$_SESSION['est_connecte'] = true;
			$ok=true;
	} else {
		$message = 'Un compte avec ce mail existe deja';
	}
} else {
	$message = 'Rentrez un username/password';
}

$retour = new stdClass();
$retour->ok = $ok;
$retour->message = $message;

///////////////////////////////////////////////////////////////////////////////////////////
///Envoie du résultat///
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($retour);
