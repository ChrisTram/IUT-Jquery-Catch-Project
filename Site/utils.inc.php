<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 11/02/2017
 * Time: 19:35
 */

function start_page($title) {
    echo ' <!DOCTYPE html><html lang="fr">
    <head>' . "\n" . '<title>' . $title . '</title>
    <meta charset="utf-8">
    <link rel="icon" type="ico" href="../Ressources/favicon.ico"/>
    <link id="styles" rel="stylesheet" href="styles.css"/>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"> 
    <link rel="stylesheet" href="../vendor/vegas/vegas.css">
		<link rel="stylesheet" href="../jquery/jquery.mobile-1.4.5.min.css">';
};

function charger_scripts(){
    echo '
    <script>window.jQuery || document.write(\'<script src="../vendor/jquery-3.1.1.min.js"><\/script>\')</script>
		<script src="../vendor/vegas/vegas.js"></script>
		<script src="script.js"></script>' .
     "\n" . '</head>' . "\n" ;
};


function creer_menu($page){
   echo '
   <ul class="menu">
       <li class="case"><a ';
   if($page=='index'){echo 'class="courante" ';}
   echo '
       href="index.php">Accueil</a></li>
       <li class="case"><a ';
   if($page=='Catcheurs'){echo 'class="courante" ';}
   echo '
       href="FicheCatcheur.php">Catcheurs</a></li>
       <li class="case"><a ';
	 if($page=='Ceinture'){echo 'class="courante" ';}
   echo '
       href="FicheCeinture.php">Ceintures</a></li>
       <li id = "inscriptionlink" class="case"><a ';
   if($page=='inscription'){echo 'class="courante" ';}
   echo '
       href="pageinscription.php">Inscription</a></li>
   </ul>';
}


    function connection() {
        try {
            $dbLink = ''; //Ligne 12
            $pdo = new PDO($dbLink, '', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// les erreurs lanceront des exceptions
        }
        catch(PDOException $e) {
            $bilan = ' ATTENTION, Erreur :  ' . $e->getMessage();
            die($bilan);
        }
        return $pdo;
    };
	function isInDb($mail) {

        $connect = connection();
        $req = 'SELECT * FROM User WHERE MAIL=:mail';
        $verif = $connect->prepare($req);
        $verif->bindParam(':mail', $mail);               
        $verif->execute();
        $result = $verif->fetchAll();
        $verif->closeCursor();
        $verif= NULL;
        if($result == NULL) return false;
        else return true;
  }
	function isRegis($mail, $pass) {

        $connect = connection();
        $req = 'SELECT * FROM User WHERE MAIL=:mail AND PASS=:pass' ;
        $verif = $connect->prepare($req);
        $verif->bindParam(':mail', $mail);     
				$verif->bindParam(':pass', $pass);
        $verif->execute();
        $result = $verif->fetchAll();
        $verif->closeCursor();
        $verif= NULL;
        if($result == NULL) return false;
        else return true;
  }
	
