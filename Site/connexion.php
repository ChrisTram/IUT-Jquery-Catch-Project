<?php
require 'utils.inc.php';

session_start();
///////////////////////////////////////////////////////////////////////////////////////////
///Calcul de toutes les variables///
$ok = false;
$message = 'Erreur';
$connection = connection();

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	if(isRegis($username, $password)) {
		$ok = true;
		$message = 'Bienvenue !';
		$_SESSION['est_connecte'] = true;
	} else {
		$message = 'Le nom d\'utilisateur ou le mot de passe est incorrect';
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
