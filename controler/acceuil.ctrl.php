<?php

  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');

  $bdd = new DAOClass($config['database_path']);

  session_start ();

  $categorie = $bdd->getCategorie();
  include("../view/acceuil.view.php");

?>
