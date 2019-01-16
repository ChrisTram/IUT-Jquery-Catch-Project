function erreurCritique() {
	$('body').html(
		'Merci de ne pas spammer !'
	);
}
$(document).ready(function() {
	//////////////////////////////CONNEXION////////////////////////////////
	$.ajax({
		type: 'get',
		url: 'est_connecte.php'
	}).done(function(retour) {
		if (retour) {
			$('#deconnexion').slideDown(); //$('form').css({'display':'block'});
			$('#connexion').css({
				'display': 'none'
			});
			$('#inscriptionlink').css({
				'display': 'none'
			});
			$('#inscription').css({
				'display': 'none'
			});
		} else {
			$('#connexion').slideDown(); //$('div').css({'display':'block'});
			$('#inscription').slideDown();
		}
	}).fail(erreurCritique);

	$('#deconnexion').click(function() {
		$.ajax({
			url: 'deconnexion.php'

		}).done(function(retour) { //attend le retour
			if (retour) {
				location.reload(true); //On recharge la page si le retour est bon+
			} else {
				erreurCritique;
			}
		}).fail(erreurCritique);
		return false;
	});

	$('#connexion').submit(function() {
		$.ajax({
			type: $(this).attr('method'), //On envoie l'attribut 'POST' du form
			url: $(this).attr('action'),
			data: $(this).serialize(),

		}).done(function(retour) {
			if (retour.ok) {
				location.reload(true); //On recharge la page si le retour est bon+
			} else {
				$('#result').html(
					'<span style="background-color:red; color:white">' +
					retour.message +
					'<span/>'
				);
			}
		}).fail(erreurCritique);
		return false;
	});

	$('#inscription').submit(function() {
		$.ajax({
			type: $(this).attr('method'), //On envoie l'attribut 'POST' du form
			url: $(this).attr('action'),
			data: $(this).serialize(),

		}).done(function(retour) {
			if (retour.ok) {
				
			location.reload(true); //On recharge la page si le retour est bon+

			} else {
				$('#result').html(
					'<span style="background-color:red; color:white">' +
					retour.message +
					'<span/>'
				);
			}
		}).fail(erreurCritique);
		return false;
	});
	//////////////////////////////WRESTLER/////////////////////////////
	$('#SelectW').change(function() {
		$.ajax({
			type: $('#Wrestler').attr('method'), 
			url: $('#Wrestler').attr('action'),
			data: $('#Wrestler').serialize(),

		}).done(function(retour) {
			
			
			if (retour.ok) {
				$('#FormResult').slideDown();
				$('#WChosen').html(
					retour.name
				);
				$('#Wrestlerpic').attr(
					"src",
					"/CatchProject/Pictures/" + retour.id + ".png"
				);
				$('#audioPlayer').attr(
					"src",
					"/CatchProject/Ressources/" + retour.id + ".mp3"
				);
				$('#Hightlights').html(
					retour.hightlights
				);
				$('#Age').html(
					'Age : ' + retour.age + ' ans'
				);
				$('#Height').html(
					'Taille : ' + retour.height + 'm'
				);
				$('#Weight').html(
					'Poid : ' + retour.weight + 'Kg'
				);
				$('#SignMove').html(
					'Signature : ' + retour.signMove 
				);
				
				if (retour.titleAC === null) {
				$('#Title').html(
					'Titre actuel : Aucun' 
				);
				} else {
				$('#Title').html(
					'Titre actuel : ' + retour.titleAC 
				);
				}
				$('#WorldNb').html(
					'Nombre de fois champion du monde : ' + retour.worldTitlesNb 
				);
				$('#Roster').html(
					'Roster actuel : WWE - ' + retour.brand 
				);
				$('#logo').attr(
					"src",
					"/CatchProject/Pictures/" + retour.brand + ".png"
				);
				if (retour.brand == "RAW") {
					$('.form2').css({
					'background': 'rgba(129, 4, 5, 0.9)'
					});
					
				} else if(retour.brand =="SMACKDOWN") {
					$('.form2').css({
					'background': 'rgba(19, 35, 47, 0.9)'
					});
				} else if(retour.brand =="NXT") {
					$('.form2').css({
					'background': 'rgba(227, 129, 18, 0.9)'
					});
				}
				var liste="";
				for(let i = 0; i<(retour.runs).length;++i) {
					if(retour.runs[i].DURATION == null) {
					liste += "<li> " + retour.runs[i].YEAR + " : "  + retour.runs[i].NAME + " (Run en cours) </li>";
					} else {
					liste += "<li> " + retour.runs[i].YEAR + " : "  + retour.runs[i].NAME + " (" + retour.runs[i].DURATION +" jours) </li>";
					}
				}
				$('#Runs').html(
					liste
				);
			} else {
				$('#error').html(
					'<span style="background-color:red; color:white">' +
					retour.error +
					'<span/>'
				);
			}
		}).fail(erreurCritique);
		return false;
	});
	
	//////////////////////////////CEINTURES////////////////////////////
	$('#SelectT').change(function() {
		$.ajax({
			type: $('#Title').attr('method'), 
			url: $('#Title').attr('action'),
			data: $('#Title').serialize(),

		}).done(function(retour) {
			if (retour.ok) {
				$('#FormResult').slideDown();
				$('#TChosen').html(
					retour.name
				);
				$('#Titlepic').attr(
					"src",
					"/CatchProject/Pictures/t" + retour.id + ".png"
				);
				
				if (retour.acWrestler === null) {
				$('#ACWreslter').html(
					'Détenteur Actuel : Aucun' 
				);
				} else {
				$('#ACWrestler').html(
					'Détenteur actuel : ' + retour.acWrestler
				);
				}
				if (retour.acWrestler2 == null) {
				$('#ACWrestler2').html(
					' '
				);
				} else {
				$('#ACWrestler2').slideDown();
				$('#ACWrestler2').html(
					'Avec : ' + retour.acWrestler2
				);
					
				}
				$('#Creation').html(
					'Fut créé en : ' + retour.creation
				);

			} else {
				$('#result').html(
					'<span style="background-color:red; color:white">' +
					retour.error +
				retour.name +
					'<span/>'
				);
			}
		}).fail(erreurCritique);
		return false;
	});


});

//////////////////////////////AUDIO PLAYER, from Open Classroom//////////////////////////////
function play(idPlayer, control) {
	var player = document.querySelector('#' + idPlayer);

	if (player.paused) {
		player.play();
		control.textContent = 'Pause';
	} else {
		player.pause();
		control.textContent = 'Play';
	}
}

function resume(idPlayer) {
	var player = document.querySelector('#' + idPlayer);

	player.currentTime = 0;
	player.pause();
}

function update(player) {
	var duration = player.duration; // Durée totale
	var time = player.currentTime; // Temps écoulé
	var fraction = time / duration;
	var percent = Math.ceil(fraction * 100);

	var progress = document.querySelector('#progressBar');

	progress.style.width = percent + '%';
	progress.textContent = percent + '%';
}