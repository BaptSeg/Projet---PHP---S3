<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);

  $categorie = $bdd->getAllCategorie();
if (isset($_POST['depotAnnonce'])) {

  if (($_POST['Categorie']!= 'categorie')){

    $idAnnonce = $bdd->depotAnnonce($_SESSION['pseudo'],$_POST['intitule'],$_POST['prix'],$_POST['description'],null,$_POST['Categorie']);
    $name_file = $_FILES['image']['name'] ;
    $fileExtension = strrchr($name_file,".");
    var_dump($idAnnonce);
    $url = "../model/img_upload/".$idAnnonce.$fileExtension;
    move_uploaded_file ($name_file,$url);
    $bdd->photosAnnonce($url,$idAnnonce);
    include("../view/test.html");

  } else {
    $view = new View('depotAnnonce.view.php');
    $view->categorie = $categorie;
    $view->erreur = "il faut remplire tout les parametres";
    $view->show();
  }

} else {
  $view = new View('depotAnnonce.view.php');
  $view->categorie = $categorie;
  $view->show();

}

 ?>
