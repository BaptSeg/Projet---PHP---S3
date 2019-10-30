<?php

  class Annonce {
    private $id;
    private $utilisateur;
    private $intitule;
    private $prix;
    private $description;
    private $date_publication;
    private $date_suppression;
    private $ville;
    private $categorie;

    function getId() {
      return (integer) $this->id;
    }
    function getUtilisateur(){
      return (integer) $this->utilisateur;
    }
    function getIntitule() : string {
      return $this->intitule;
    }
    function getPrix() {
      return (float) $this->prix;
    }
    function getDescription() : string {
      return $this->description;
    }
    function getDate_Publication(){
      return $this->date_publication;
    }
    function getDate_Suppression() : string {
      return $this->date_suppression;
    }
    function getVille() : string {
      return $this->ville;
    }
    function getCategorie() : string {
      return $this->categorie;
    }
  }

 ?>
