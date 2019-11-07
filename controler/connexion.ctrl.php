<?php
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);
  if (isset($_POST['connexion'])) {                                           // On test si la page a deja été remplie
    $login_valide = $bdd->pseudo_exist($_POST['pseudo']);
    if (!empty($login_valide)) {                                              // test si le pseudo existe
      $pass_bdd = $bdd->getPass($_POST['pseudo']);
      $pseudo_low = strtolower($_POST['pseudo']);
      if (password_verify($_POST['mdp'] , $pass_bdd['mdp'])) {                // On compare le mot de passe de la basse de donnéeset celui entrée par l'utilisateur
        session_start();                                                      // si tout est ok on demarre la session de l'utilisateur
        $_SESSION['pseudo'] = $pseudo_low;                                    // et on stock dans la session sont pseudo
        // on redirige notre visiteur vers une page de notre section membre
        $view = new View('accueil.view.php');
        $view->confirm = "Connexion reussi.";
        $categorie = $bdd->getAllCategorie();
        $region = $bdd->getAllRegions();
        $view->categorie = $categorie;
        $view->region = $region;
        $view->show();
      } else {                                                                //si le mot de passe est different on le renvoi vers la meme page en mettant à jour l'erreur
        // echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        // echo '<meta http-equiv="refresh" content="0;URL=../view/accueil.view.php">';
        $view = new View('connexion.view.php');
        $view->erreur = "Mot de passe incorrect !";
        $view->show();
      }
    } else {                                                                  //si le pseudo n'existe pas on le renvoi vers la meme page en mettant à jour l'erreur
      $view = new View('connexion.view.php');
      $view->erreur = "Identifiant non reconnu !";
      $view -> show();
    }
  } else{                                                                     //si la page n'as pas encore été remplie on l'affiche sans rien faire
    $view = new View('connexion.view.php');
    $view -> show();
  }
 ?>
