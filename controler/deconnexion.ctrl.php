<?php

$config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
require_once('../model/DAOClass.class.php');
require_once('../framework/view.class.php');
$bdd = new DAOClass($config['database_path']);

// On démarre la session
session_start ();

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
$view = new View('accueil.view.php');
$view->confirm = "Déconnexion reussie.";
$categorie = $bdd->getAllCategorie();
$region = $bdd->getAllRegions();
$view->categorie = $categorie;
$view->region = $region;
$view->show();
?>
