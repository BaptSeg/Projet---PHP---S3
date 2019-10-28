<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);

if (isset($_POST['Rechercher'])) {
  $resAnnonces = $bdd->rechercher($_POST['Categorie'], $_POST['Region'], $_POST['prixMin'],  $_POST['prixMax']);
$image = array;
for ($i=0; $i <sizeof($resAnnonces) ; $i++) {
  $image[$resAnnonces[$i]['id']] = getUrl($resAnnonces[$i]['id'])
}


  $view = new View('annonce.view.php');
  $view->resAnnonces = $resAnnonces;
  $view->image = $image
  $view->show();
}




?>
