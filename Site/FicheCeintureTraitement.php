<?php
session_start();
require 'utils.inc.php';

if (isset($_POST['choixT'])) {
	
	$choix = $_POST['choixT'];
	$ok = true;
	$connection = connection();
	$query = 'SELECT * FROM Title WHERE NAME = ?';
	$select = $connection->prepare($query);
	$select->execute(array($choix));
	$result = $select->fetchAll();
	$id = $result[0]['ID'];
	$name = $result[0]['NAME'];
  $creation = $result[0]['CREATION'];
  $wrestlerACID = $result[0]['CHAMPID'];
  $wrestlerACID2 = $result[0]['CHAMPID2'];
	$type = $result[0]['TYPE'];
	///On récupère son détenteur actuel///
  $query2 = 'SELECT NAME FROM Wrestler WHERE ID = ?';
	$selectWrestlerAC = $connection->prepare($query2);
	$selectWrestlerAC->execute(array($wrestlerACID));
	$resultWrestlerAC = $selectWrestlerAC->fetchAll();
  $acWrestler = $resultWrestlerAC[0]['NAME'];
  ///On récupère le deuxième détenteur potentiel (ex : Ceintures par équipes) 
	$selectWrestlerAC2 = $connection->prepare($query2);
	$selectWrestlerAC2->execute(array($wrestlerACID2));
	$resultWrestlerAC2 = $selectWrestlerAC2->fetchAll();
	$acWrestler2 = $resultWrestlerAC2[0]['NAME']; 									
	
  
  

} else {
	$ok = false;
	$error = 'Erreure dans votre demande.';
}

$retour = new stdClass();
$retour->ok = $ok;
$retour->name = $name;
$retour->creation = $creation;
$retour->type = $type;
$retour->error = $error;
$retour->id = $id;
$retour->acWrestler = $acWrestler;
$retour->acWrestler2 = $acWrestler2;
///////////////////////////////////////////////////////////////////////////////////////////
///Envoie du résultat///
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($retour);
