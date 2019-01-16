<?php
session_start();
$retour = false;
if (isset($_SESSION['est_connecte'])) {
	  $retour = $_SESSION['est_connecte'];
}
///////////////////////////////////////////////////////////////////////////////////////////
///Envoie du résultat///
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($retour);

?>