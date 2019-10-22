<?php

  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');

  $bdd = new DAOClass($config['database_path']);

  $reponse = $bdd->query("SELECT DISTINCT categorie FROM Annonce");
  $Categorie = $reponse->fetchall(PDO::FETCH_ASSOC);
  var_dump($Categorie);
  include("../view/acceuil.view.php");

?>
