<?php
  try {
    $bdd = new PDO('sqlite:../model/data/utilisateur.db');
  }
  catch (PDOException $e){
    die("erreur de connexion:".$e->getMessage());
  }
  $reponse = $bdd->query("SELECT DISTINCT categorie FROM Annonce");
  $categorie = $reponse->fetchall(PDO::FETCH_ASSOC);
  var_dump($categorie);
  var_dump($categorie[0]['categorie']);
  include("../view/accueil.view.php");
?>
