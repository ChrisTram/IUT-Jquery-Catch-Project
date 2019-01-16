<?php
require 'utils.inc.php';
start_page('Fiches');
creer_menu('Ceinture');
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
    echo '<form id="Title" method="post" action="FicheCeintureTraitement.php">' . "\n";
    $connection = connection();
    $select = $connection->prepare('SELECT NAME FROM Title');
    $select->execute();
    echo '<p>' . "\n";
    echo '<label for="choixT">Quel est la ceinture que vous désirez voir?</label><br />' . "\n";
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
<div class="form" id="FormResult">
        <div id="Main">
              <h1 id = "TChosen"> </h1>
              <img id="Titlepic" src="/CatchProject/Pictures/WWE.png"/>
        </div>
        <div id="infos">
          <h1>Informations générales</h1>
            <p>
              <ul class="list">
                 <li id="ACWrestler"></li>
                 <li id="ACWrestler2"></li>
                 <li id="Creation"></li>
              </ul>
            </p>
        </div>
</div>


</body>
