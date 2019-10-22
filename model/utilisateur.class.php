<?php
  class Utilisateur {
    private $pseudo;// il faut qu'on rajoute nom prenom ou pas dans le formulaire d'inscription ? et telephone ?
    private $mdp;
    private $email;
    private $adresse;
    private $telephone;

    function getPseudo() : string {
      return $this->pseudo;
    }
    function getMdp() : string {
      return $this->mdp;
    }
    function getEmail() : string {
      return $this->email;
    }
    function getAdresse() : string {
      return $this->adresse;
    }
    function getTelephone() : string {
      return $this->telephone;
    }

  }
 ?>
