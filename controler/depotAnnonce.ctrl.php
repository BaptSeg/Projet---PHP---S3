<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');

  $bdd = new DAOClass($config['database_path']);


  if (isset($_POST['depotAnnonce'])) {
    if (isset($_POST['categorie'])) {
      if (isset($_POST['ville'])) {
        $id_annonce = $bdd->depotAnnonce($_SESSION['pseudo'], $_POST['intitule'], $_POST['prix'], $_POST['description'], $_POST['ville'], $_POST['categorie']);
        $msg = "Votre annonce a bien été deposé. Vous pouvez consulter vos annonces sur votre profil.";
        if (isset($_FILES['image'])) {

          $nb_photos = count($_FILES['image']['name']);
          if ($nb_photos > 5) {
            for ($i = 0; $i<5; $i++) {
              if ($_FILES['image']['error'][$i] > 0)
              $erreur[] = $i;
            }
          } else {
            for ($i = 0; $i<$nb_photos; $i++) {
              if ($_FILES['image']['error'][$i] > 0)
              $erreur[] = $i;
            }
          }

          if (isset($erreur)) {
            if (count($erreur) != $nb_photos) {
              $bdd->uploadPhotos($_SESSION['pseudo'], $_FILES['image'], $id_annonce);
            }
          } else {
            $bdd->uploadPhotos($_SESSION['pseudo'], $_FILES['image'], $id_annonce);
          }
        }
      } else {
        $erreur = "Veuillez renseigner la ville.";
      }
    } else {
      $erreur = "Veuillez renseigner la categorie.";
    }

  }

  $view = new View('depotAnnonce.view.php');
  $categorie = $bdd->getAllCategorie();
  $ville = $bdd->getAllVille();
  $view->categorie = $categorie;
  $view->ville = $ville;
  if (isset($erreur)) {
    $view->erreur = $erreur;
  }
  if (isset($msg)) {
    $view->msg = $msg;
  }
  $view->show();


 ?>
