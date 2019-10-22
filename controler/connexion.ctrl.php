<?php



    if (($login_valide == $_POST['pseudo']) && password_verify($_POST['mdp'] , $pass_bdd)) {
      session_start();
      $_SESSION['pseudo'] = $_POST['pseudo'];
      $_SESSION['mdp'] = $_POST['mdp'];
      // on redirige notre visiteur vers une page de notre section membre
		  header ('location: ../view/test_connexion.php');
    }else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=index.htm">';
	  }
 ?>
