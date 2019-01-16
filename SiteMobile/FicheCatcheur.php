<?php
require 'utils.inc.php';
start_page(Fiches);
charger_scripts();
?>

      	<div data-role="header" data-position="fixed">
				<ul class="menu">
					<li class="case"><a  href="index.php" rel="external">Accueil</a></li>
					<li class="case">
						<a id="reload" href="FicheCatcheur.php" class="courante" rel="external">Catcheurs</a></li>
					<li class="case">
						<a href="FicheCeinture.php" rel="external">Ceintures</a></li>
				</ul>
			</div>	
<div class="form2">
<?php
    echo '<form id="Wrestler" method="post" action="FicheCatcheurTraitement.php">' . "\n";
    $connection = connection();
    $select = $connection->prepare('SELECT NAME FROM Wrestler');
    $select->execute();
    echo '<p>' . "\n";
    echo '<select id="SelectW" name="choixW">' . "\n";
    //echo '<option selected="selected"></option> '; //Ajoute un null au début de la liste, inutile finalement.
    foreach ($select->fetchAll() as $catcheur) { //On place tout les catcheurs disponibles depuis la BD dans une liste déroulante
          echo "\n";
          echo '<option  name = " '.$catcheur['NAME'] . ' "> ' .$catcheur['NAME'] . '</option>';       
    }
    echo '</select>';
    echo '</p>';
    echo '</form>';
?>
      <img id="logo" src="/CatchProject/Pictures/WWE.png"/>
</div>
<div data-role="main" id="FormResult">
       

        <div id="Main">
              <h1 id = "WChosen">
              </h1>
              <img id="Wrestlerpic" src="/CatchProject/Pictures/WWE.png"/>
        </div>
        <div id="player">
            <div>
                <div id="progressBarControl">
                    <div id="progressBar"></div>
                </div>
            </div>
            <audio id="audioPlayer" ontimeupdate="update(this)" src="/CatchProject/Ressources/9.mp3"></audio>

            <button class="control" onclick="play('audioPlayer', this)">Play</button>
            <button class="control" onclick="resume('audioPlayer')">Stop</button>      
        </div>
        <div id="infos">
          <h1>Informations générales</h1>
            <p id="Hightlights">
                
            </p>
            <p>
              <ul class="list "data-role="listview">
                
          
                 <li id="Age"> </li>
                 <li id="Height"></li>
                 <li id="Weight"> </li>
                 <li id="SignMove"></li>
                 <li id="Title"></li>
                 <li id="WorldNb"></li>
                 <li id="Roster"></li>   
                </ul>
            </p>
          <h1>Titres obtenus</h1>
            <ul id ="Runs" class="list" data-role="listview">
            </ul>
        </div>

</div>


</body>
