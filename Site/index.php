<?php
	session_start();
	require 'utils.inc.php';
  start_page('Accueil');
	creer_menu('index');
  charger_scripts();
	
?>
<body>


	<div class="form1">

		<div class="">
			<div id="">
				<h1><a href="index.php">Catch Database</a></h1>
			</div>
		</div>
		<!-- tab-content -->

	</div>
	<!-- /form -->
	<div class="form">

		<div class="">

			<p>
				Afin de simplifier la BD, tous les catcheurs/titres/règnes ne sont pas listés et sont limités dans le temps. La base de données est donc tout sauf exhaustive. 
				Ce site internet a pour but à long therme de stocker mes chroniques et reviews par shows/catcheurs.
				PS : Pour l'instant, s'inscrire ne sert à rien à part à ne pas pouvoir accéder à la page d'inscription !
			</p>


		</div>
		<!-- tab-content -->
		<form id="connexion" method="post" action="connexion.php">
			<h1>
				Connexion
				</h1>
			<fieldset>

				<p><label>Nom utilisateur (Votre Mail):
          <input name="username" type="text" required></label></p>
				<p><label>Mot de passe :
          <input name="password" type="password" required></label></p>
			</fieldset>
			<p><input type="submit" value="Connection"></input>
			</p>
			<fieldset>
				<p id="result"></p>
			</fieldset>

			<p><a href="pageinscription.php">Pas encore inscris?</a></p>
		</form>

		<div id="deconnexion" style="display:none">
			<p>
				<button>
        Se déconnecter
        </button>
			</p>
		</div>

	</div>
	<!-- /form -->



</body>