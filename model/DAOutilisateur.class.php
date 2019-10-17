<?php
  require_once("../model/Categorie.class.php");
  class DAOMembre {
    private $db;

    function __construct() {
          try {
            $this->db = new PDO('sqlite:../data/utilisateur.db');
          }
          catch (PDOException $e){
            die("erreur de connexion:".$e->getMessage());
          }


        }
  }
 ?>
