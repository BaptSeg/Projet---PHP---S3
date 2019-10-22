<?php
  class Utilisateur {
    private $pseudo;
    private $mdp;
    private $email;

    function getPseudo() : string {
      return $this->pseudo;
    }
    function getMdp() : string {
      return $this->mdp;
    }
    function getEmail() : string {
      return $this->email;
    }

  }
 ?>
