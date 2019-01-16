<?php
	session_start();
	require 'utils.inc.php';
 if(empty($_SESSION['est_connecte'])){
   start_page('inscription');
	 creer_menu('inscription');
   charger_scripts();
   ?>
<body>


	<div class="form1">

		<div class="">
			<div id="">
				<h1><a href="index.php">Catch Database</a></h1>
			</div>
		</div>

	</div>
	<div class="form">

		<div class="">
			<h1>Inscription</h1>
		</div>
		<form id="inscription" method="post" action="inscription.php">
			<fieldset>
				<p><label>Nom utilisateur (Votre Mail):
          <input name="username" type="text" required></label></p>
				<p><label>mot de passe :
          <input name="password" type="password" required></label></p>
			</fieldset>
			<p><input type="submit" value="S'inscrire"></input>
			</p>
			<fieldset>
				<p id="result"></p>
			</fieldset>
		</form>

	</div>



</body>
<?php
 } else {
   header('Location: index.php');
 }
