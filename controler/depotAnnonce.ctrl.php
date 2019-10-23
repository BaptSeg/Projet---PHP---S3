<?php
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);

  $categorie = $bdd->getCategorie();
if (isset($_POST['inscription'])) {
  if(isset($_POST['categorie']) || $_POST['description'] != 'Saisir ici'){
    include("../view/test.html");

  }else {
    $view = new View('depotAnnonce.view.php');
    $view->categorie = $categorie;
    $view->erreur = "il faut remplire tout les parametres";
    $view->show();
  }

}else{
  $view = new View('depotAnnonce.view.php');
  $view->categorie = $categorie;
  $view->show();

}

 ?>
