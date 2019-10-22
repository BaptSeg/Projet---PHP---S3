<?php

  class DAOClass {
    private $db;

    function __construct($chemin_acces) {
      $database = 'sqlite:'.$chemin_acces;
          try {
            $this->db = new PDO($database);
          }
          catch (PDOException $e){
            die("erreur de connexion:".$e->getMessage());
          }
        }

    function getPseudo($pseudo) {
      $pseudo_low = strtolower($_POST['pseudo']);
      $reponse = $this->db->query("SELECT pseudo FROM Utilisateur WHERE pseudo = '$pseudo_low'");
      $pseudo = $reponse->fetchall(PDO::FETCH_ASSOC);
    }
  }

 ?>
