<?php
  session_start();
  $config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
  require_once('../model/DAOClass.class.php');
  require_once('../framework/view.class.php');
  require_once('../model/Annonce.class.php');

  $bdd = new DAOClass($config['database_path']);
  // Recupere les critères de recherche lorsque l'on fait retour après la consultation d'une annonce
  if (isset($_GET['categorie'])) {
    $_POST['categorie'] = $_GET['categorie'];
  }
  if (isset($_GET['region'])) {
    $_POST['region'] = $_GET['region'];
  }
  if (isset($_GET['prixMin'])) {
    $_POST['prixMin'] = $_GET['prixMin'];
  }
  if (isset($_GET['prixMax'])) {
    $_POST['prixMax'] = $_GET['prixMax'];
  }
  if (isset($_GET['num_annonce'])) {
    $num_annonce = $_GET['num_annonce'];
  } else {
    $num_annonce = 0;
  }

  if (isset($_POST['categorie'])) {                                           // On regarde si les données on bien été initialisés
    if (isset($_POST['region'])) {
      if (isset($_POST['prixMin']) && isset($_POST['prixMax'])) {
        $min = $_POST['prixMin'];
        $max = $_POST['prixMax'];
        if ($min < $max) {                                                    // On s'assure que le prix min est inférieur au prix max
          $annonces = $bdd->rechercherAnnonce($_POST['categorie'], $_POST['region'], $_POST['prixMin'], $_POST['prixMax']);
          foreach ($annonces as $key => $value) {                             // Recupération des images des annonces
            $photos = $bdd->recupererPhotos($value->getId());
            $les_photos[] = $photos;
          }
          $view = new View('rechercheAnnonce.view.php');
          /* ----- On envoie les catégorie et les regions pour conserver la barre de recherche ----- */
          $categorie = $bdd->getAllCategorie();
          $region = $bdd->getAllRegions();
          $view->categorie = $categorie;
          $view->region = $region;
          $view->num_annonce = $num_annonce;
          $view->nb_photo = count($annonces);

          $view->annonces = $annonces;
          if (isset($les_photos)) {
            $view->les_photos = $les_photos;
          }

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

  if (isset($erreur)) {                                                       // On renvoie sur la page d'accueil en cas d'erreur
    $view = new View('accueil.view.php');
    $categorie = $bdd->getAllCategorie();
    $region = $bdd->getAllRegions();
    $view->categorie = $categorie;
    $view->region = $region;
    $view->erreur = $erreur;
    $view->show();
  }

?>
