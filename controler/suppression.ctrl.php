<?php

session_start();
$config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
require_once('../model/DAOClass.class.php');
require_once('../framework/view.class.php');
require_once('../model/Utilisateur.class.php');
require_once('../model/Annonce.class.php');
$bdd = new DAOClass($config['database_path']);


$id = $_GET['id'];
$bdd->deleteAnnonce($id);

$id = $bdd->getIdUtilisateur($_SESSION['pseudo']);
$utilisateur = $bdd->recupererUtilisateur($id['id']);
$id = (int) $id['id'];

$annonces = $bdd->recupererAnnonce($id);
if (isset($_GET['id_annonces'])) {
  $id_annonces = $_GET['id_annonces'];
} else {
  $id_annonces = 0;
}

foreach ($annonces as $key => $value) {
  $photos = $bdd->recupererPhotos($annonces[$key]->getId());
  $les_photos[] = $photos;
}
if (isset($_GET['id_photo'])) {
  $id_photo = $_GET['id_photo'];
} else {
  $id_photo = 0;
}

/* --------- PASSAGE DES INFORMATIONS DE L'UTILISATEUR A LA VUE --------- */

$view = new View('profil.view.php');
$view->id = $utilisateur->getId();
$view->pseudo = $utilisateur->getPseudo();
$view->mdp = $utilisateur->getMdp();
$view->email = $utilisateur->getEmail();
$view->adresse = $utilisateur->getAdresse();
$view->telephone = $utilisateur->getTelephone();
$view->date_inscription = $utilisateur->getDate_Inscription();

$view->annonces = $annonces;
$view->id_annonces = $id_annonces;
if (isset($les_photos)) {
  $view->les_photos = $les_photos;
}
$view->id_photo = $id_photo;

$view->show();


?>
