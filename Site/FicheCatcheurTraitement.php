<?php
session_start();
require 'utils.inc.php';

if (isset($_POST['choixW'])) {
	
	$choix = $_POST['choixW'];
	$ok = true;
	$connection = connection();
	///On récupère les informations du catcheur choisis///
	$query = 'SELECT * FROM Wrestler WHERE NAME = ?';
	$select = $connection->prepare($query);
	$select->execute(array($choix));
	$result = $select->fetchAll();
	$id = $result[0]['ID'];
	$name = $result[0]['NAME'];
	$isMen = $result[0]['ISMEN'];
	$origin = $result[0]['ORIGIN'];
	$age = $result[0]['AGE'];
	$brand = $result[0]['BRAND'];
	$height = $result[0]['HEIGHT'];
	$weight = $result[0]['WEIGHT'];
	$signMove = $result[0]['SIGNMOVE'];
	$hightlights = $result[0]['HIGHTLIGHTS'];
	$titleACID = $result[0]['TITLEAC'];
	$runac = $result[0]['RUNAC'];
	///On récupère son titre actuel///
	$selectTitleAC = $connection->prepare('SELECT NAME FROM Title WHERE ID = ?');
	$selectTitleAC->execute(array($titleACID));
	$resultTitleAC = $selectTitleAC->fetchAll();
	$titleAC = $resultTitleAC[0]['NAME'];
	
	//On compte le nombre de fois où il a été champion du monde///
	///Sont considérés comme titres mondiaux pour les hommes : le WWE Champions et le Universal Champions, pour les femmes
	///les deux titres disponibles sont considérés comme mondiaux///
	if($isMen == 1) { 
		$countworldtitles = $connection->prepare('SELECT COUNT(IDRUN) FROM Run WHERE WRESTLER = ? AND (TITLE = 1 OR TITLE = 2)');
	} else {
		$countworldtitles = $connection->prepare('SELECT COUNT(IDRUN) FROM Run WHERE WRESTLER = ? AND (TITLE = 6 OR TITLE = 7)');
	}
		$countworldtitles->execute(array($id));
		$resultcount = $countworldtitles->fetchAll();
		$worldTitlesNb = $resultcount[0]['COUNT(IDRUN)'];
	///On récupère l'historique des règnes
		$selectruns = $connection->prepare('SELECT IDRUN, DURATION, YEAR, TITLE, NAME FROM Run, Title WHERE WRESTLER = ? AND Run.TITLE=Title.ID');
		$selectruns->execute(array($id));
		$resultruns = $selectruns->fetchAll();
		/*
		$selecttitres = $connection->prepare('SELECT IDRUN FROM Run WHERE TITLE = ' + resultruns[0]['TITLE']);
		$selecttitres->execute(array($id));
		$resulttitres = $selecttitres->fetchAll();
		*/
		//$worldTitlesNb = $resultcount[0]['COUNT(IDRUN)'];
} else {
	$ok = false;
	$error = 'Erreure dans votre demande.';
}

$retour = new stdClass();
$retour->ok = $ok;
$retour->name =$name;
$retour->error = $error;
$retour->id = $id;
$retour->isMen = $isMen;
$retour->origin = $origin;
$retour->age = $age;
$retour->brand = $brand;
$retour->height = $height;
$retour->weight = $weight;
$retour->signMove = $signMove;
$retour->hightlights = $hightlights;
$retour->titleAC = $titleAC;
$retour->worldTitlesNb = $worldTitlesNb;
$retour->runs = $resultruns;
/*
$retour->runac = $runac;*/
///////////////////////////////////////////////////////////////////////////////////////////
///Envoie du résultat///
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($retour);
