<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');
  require_once('../model/Annonce.class.php');

  $bdd = new DAOClass($config['database_path']);

//   $bdd = new DAOClass($config['database_path']);
//
// if (isset($_POST['Rechercher'])) {
//   $resAnnonces = $bdd->rechercher($_POST['Categorie'], $_POST['Region'], $_POST['prixMin'],  $_POST['prixMax']);
// $image = array;
// for ($i=0; $i <sizeof($resAnnonces) ; $i++) {
//   $image[$resAnnonces[$i]['id']] = getUrl($resAnnonces[$i]['id'])
// }
//
//
//   $view = new View('annonce.view.php');
//   $view->resAnnonces = $resAnnonces;
//   $view->image = $image
//   $view->show();
// }


  if (isset($_POST['rechercher'])) {
    if (isset($_POST['categorie'])) {
      if (isset($_POST['region'])) {
        if (isset($_POST['prixMin']) && isset($_POST['prixMax'])) {
          $min = $_POST['prixMin'];
          $max = $_POST['prixMax'];
          if ($min < $max) {
            $annonce = $bdd->rechercherAnnonce($_POST['categorie'], $_POST['region'], $_POST['prixMin'], $_POST['prixMax']);
            $view = new View('rechercheAnnonce.view.php');
            /* ----- On envoie les catégorie et les regions pour conserver la barre de recherche ----- */
            $categorie = $bdd->getAllCategorie();
            $region = $bdd->getAllRegions();
            $view->categorie = $categorie;
            $view->region = $region;

            $view->annonce = $annonce;
            $view->show();
          } else {
            $erreur = "Veuillez indiquer un prix minimum inférieur au prix maximum.";
          }
        } else {
          $erreur = "Veuillez indiquer le prix minimum et le prix maximum.";
        }
      } else {
        $erreur = "Veuillez indiquer la region de votre recherche.";
      }
    } else {
      $erreur = "Veuillez indiquer la catégorie.";
    }
  }

  if (isset($erreur)) {
    $view = new View('accueil.view.php');
    $categorie = $bdd->getAllCategorie();
    $region = $bdd->getAllRegions();
    $view->categorie = $categorie;
    $view->region = $region;
    $view->erreur = $erreur;
    $view->show();
  }

?>
