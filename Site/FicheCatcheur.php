<?php
require 'utils.inc.php';
start_page('Fiches');
creer_menu('Catcheurs');
charger_scripts();
?>

<body>

<div class="form1">


        <div id="">
          <h1><a href="index.php">Catch Database</a></h1>
        </div>


</div> 
<div class="form2">
<?php
    echo '<form id="Wrestler" method="post" action="FicheCatcheurTraitement.php">' . "\n";
    $connection = connection();
    $select = $connection->prepare('SELECT NAME FROM Wrestler');
    $select->execute();
    echo '<p>' . "\n";
    echo '<label for="choixW">Quel est le catcheur que vous désirez voir?</label><br />' . "\n";
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
<div class="form" id="FormResult">
       

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
              <ul class="list">
                
          
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
