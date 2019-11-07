<?php
/* --------- DEFINITION DE LA CLASSE UTILISATEUR --------- */
  class Utilisateur {
    private $id;
    private $pseudo;
    private $mdp;
    private $email;
    private $adresse;
    private $telephone;
    private $date_inscription;
/* --------- GETTEUR --------- */
    function getId() {
      return (int) $this->id;
    }
    function getPseudo() : string {
      return $this->pseudo;
    }
    function getMdp() : string {
      return $this->mdp;
    }
    function getEmail() : string {
      return $this->email;
    }
    function getAdresse() : ?string {
      return $this->adresse;
    }
    function getTelephone() : ?string {
      return $this->telephone;
    }
    function getDate_Inscription() : string {
      return $this->date_inscription;
    }

  }
 ?>
