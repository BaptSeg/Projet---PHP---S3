<?php
session_start();
$config = parse_ini_file('../config/config.ini');                           // Recupération des données de configuration.
require_once('../model/DAOClass.class.php');
require_once('../framework/view.class.php');
require_once('../model/Utilisateur.class.php');

$bdd = new DAOClass($config['database_path']);

/* --------- RECUPERATION DES DONNÉES DE L'UTILISATEUR COURANT ------- */

$id = $bdd->getIdUtilisateur($_SESSION['pseudo']);
$utilisateur = $bdd->recupererUtilisateur($id['id']);

/* --------- PASSAGE DES INFORMATIONS DE L'UTILISATEUR A LA VUE --------- */

$view = new View('profil.view.php');
$view->id = $utilisateur->getId();
$view->pseudo = $utilisateur->getPseudo();
$view->mdp = $utilisateur->getMdp();
$view->email = $utilisateur->getEmail();
$view->adresse = $utilisateur->getAdresse();
$view->telephone = $utilisateur->getTelephone();
$view->date_inscription = $utilisateur->getDate_Inscription();
$view->show();

?>
