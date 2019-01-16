<?php
	session_start();
	require 'utils.inc.php';
 if(empty($_SESSION['est_connecte'])){
   start_page('inscription');
   charger_scripts();
   ?>

			<div data-role="header" data-position="fixed">
				<ul class="menu">
					<li class="case"><a  href="index.php" rel="external">Accueil</a></li>
					<li class="case">
						<a href="FicheCatcheur.php" rel="external">Catcheurs</a></li>
					<li class="case">
						<a href="FicheCeinture.php" rel="external">Ceintures</a></li>
				</ul>
			</div>	
				<div data-role="main" class="ui-content">
						<h1>
							CatchDatabase - Inscription
						</h1>
					<form id="inscription" method="post" action="inscription.php">

						<label>Nom utilisateur
          <input class="form-control" name="username" type="text" required></label>
						<label>mot de passe :
          <input class="form-control" name="password" type="password" required></label>
						<input type="submit" value="S'inscrire"></input>
						<fieldset>
							<p id="result"></p>
						</fieldset>
					</form>
				</div>


		</div>





	</body>
	<?php
 } else {
   header('Location: index.php');
 }