<?php
  try {
    $bdd = new PDO('sqlite:../data/utilisateur.db');
  }
  catch (PDOException $e){
    die("erreur de connexion:".$e->getMessage());
  }
  $reponse = $bdd->query("SELECT DISTINCT categorie FROM Annonce");
  $Categorie = $reponse->fetchall(PDO::FETCH_ASSOC);
  var_dump($Categorie);
  include("../view/acceuil.view.php");
?>