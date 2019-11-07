<?php

$config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
require_once('../model/DAOClass.class.php');
require_once('../framework/view.class.php');

$bdd = new DAOClass($config['database_path']);

if (isset($_POST['inscription'])) {                                           // On test si le formulaire a deja été rempli

  $pseudo = $bdd->pseudo_exist($_POST['pseudo']);
  $email = $bdd->email_exist($_POST['email']);

  if ((empty($pseudo)) && (empty($email)) && ($_POST['mdp1']==$_POST['mdp2']) ) {//on regarde si le pseudo et le mail ne sont pas déjà dans la base de données et si les 2 mots de passe sont identiques

    $bdd->crea_utilisateur($_POST['pseudo'], $_POST['mdp1'], $_POST['email'], $_POST['adresse'], $_POST['tel']);        // Création de l'utilisateur dans la base de données.
    session_start();                                                          // Apres la création d'un compte nous le connectons directement à une session
    $_SESSION['pseudo'] = $_POST['pseudo'];
    // on redirige notre visiteur vers une page de notre section membre
    $view = new View('accueil.view.php');
    $view->confirm = "Inscription reussie.";
    $categorie = $bdd->getAllCategorie();
    $region = $bdd->getAllRegions();
    $view->categorie = $categorie;
    $view->region = $region;
    $view->show();
    // On traite les cas où les données entrées par l'utilisateur ne sont pas valides
  } elseif (!empty($pseudo)) {
    $view = new View('inscription.view.php');
    $view->erreur = "Votre identifiant est deja utilisé ! ";
    $view->show();

  } elseif (!empty($email)) {
    $view = new View('inscription.view.php');
    $view->erreur = "Cette adresse mail est deja associer a un compte !";
    $view->show();

  } elseif ($_POST['mdp1']!=$_POST['mdp2']) {
    $view = new View('inscription.view.php');
    $view->erreur = "Les deux mots de passe ne sont pas identique !";
    $view->show();

  }

} else {                                                                      // On affiche le formulaire si il n'as pas deja été rempli
  $view = new View('inscription.view.php');
  $view->show();
}

?>
