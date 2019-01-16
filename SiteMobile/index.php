<?php
	session_start();
	require 'utils.inc.php';
  start_page('Accueil');
  charger_scripts();
	
?>



			<div data-role="header" data-position="fixed">
				<ul class="menu">
					<li class="case"><a class="courante" href="index.php" rel="external">Accueil</a></li>
					<li id="reload" class="case">
						<a href="FicheCatcheur.php" rel="external">Catcheurs</a></li>
					<li class="case">
						<a href="FicheCeinture.php" rel="external">Ceintures</a></li>
				</ul>

			</div>
			<div data-role="main" class="ui-content">
				<form id="connexion" method="post" action="connexion.php">
					<h1>
						CatchDatabase - Connexion
					</h1>

					<label>nom d'utilisateur :
          <input name="username" type="text" required></label>
					<label>mot de passe :
          <input name="password" type="password" required></label>
					<input type="submit" value="Connection"></input>

					<p id="result"></p>

					<a id="inscriptionlink" href="pageinscription.php" rel="external">Pas encore inscrit?</a>
				</form>

					

				<div id="deconnexion" style="display:none">
					<p>
						<button>
        				Se déconnecter
        			</button>
					</p>
				</div>

			</div>
		</div>



	</body>