<?php
require 'utils.inc.php';
start_page('Fiches');
charger_scripts();
?>

      	<div data-role="header" data-position="fixed">
				<ul class="menu">
					<li class="case"><a  href="index.php" rel="external">Accueil</a></li>
					<li class="case">
						<a href="FicheCatcheur.php" rel="external">Catcheurs</a></li>
					<li class="case">
						<a href="FicheCeinture.php" class="courante" rel="external">Ceintures</a></li>
				</ul>
			</div>	
      <div class ="form2">
<?php
    echo '<form id="Title" method="post" action="FicheCeintureTraitement.php">' . "\n";
    $connection = connection();
    $select = $connection->prepare('SELECT NAME FROM Title');
    $select->execute();
    echo '<p>' . "\n";
    echo '<select id="SelectT" name="choixT">' . "\n";
    foreach ($select->fetchAll() as $title) { //On place tout les titres disponibles depuis la BD dans une liste déroulante
          echo "\n";
          echo '<option  name = " '.$title['NAME'] . ' "> ' .$title['NAME'] . '</option>';       
    }
    echo '</select>';
    echo '</p>';
    echo '</form>';
?>
      </div>
  <div data-role="main" class="ui-content" id="FormResult">
        <div id="Main">
              <h1 id = "TChosen"> </h1>
              <img id="Titlepic" src="/CatchProject/Pictures/WWE.png"/>
        </div>
        <div id="infos">
          <h1>Informations générales</h1>
            <p>
              <ul class="list" data-role="listview">
                 <li id="ACWrestler"></li>
                 <li id="ACWrestler2"></li>
                 <li id="Creation"></li>
              </ul>
            </p>
        </div>
  </div>
</div>


</body>
