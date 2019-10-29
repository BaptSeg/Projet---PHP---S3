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
  }

  function getId() : integer {
    return (int) $this->id;
  }

  function getUtilisateur() : integer {
    return (int) $this->utilisateur;
  }

  function getIntitule() : string {
    return $this->intitule;
  }

  function getPrix() : float {
    return (float) $this->prix;
  }

  function getDescription() : string {
    return $this->descriptione;
  }

  function getDate_Publication() : date {
    return $this->date_publication;
  }

  function getDate_Suppression() : string {
    return $this->date_suppression;
  }

  function getVille() : string {
    return $this->ville;
  }

  function getCategorie() : string {
    return $this->categoriee;
  }

 ?>
