<?php

  class DAOClass {
    private $db;

/* ------------------ CONSTRUCTEUR  ------------------------- */


    function __construct($chemin_acces) {
      $database = 'sqlite:'.$chemin_acces;
          try {
            $this->db = new PDO($database);
          }
          catch (PDOException $e){
            die("erreur de connexion:".$e->getMessage());
          }
        }

/* ------------------ METHODES  ------------------------- */

    function pseudo_exist($pseudo) : ?array {
      $pseudo_low = strtolower($pseudo);
      $reponse = $this->db->query("SELECT pseudo FROM Utilisateur WHERE pseudo = '$pseudo_low'");
      $result = $reponse->fetch(PDO::FETCH_ASSOC);
      if (!empty($result)) {
          return $result;
      } else {
        return null;
      }
    }
    function getIdUtilisateur($pseudo) : array{
      $pseudo_low = strtolower($pseudo);
      $reponse = $this->db->query("SELECT id FROM Utilisateur WHERE pseudo = '$pseudo_low'");
      $result = $reponse->fetch(PDO::FETCH_ASSOC);
      return $result;
    }
    function email_exist($email) : array {
      $email_low = strtolower($email);
      $reponse = $this->db->query("SELECT email FROM Utilisateur WHERE email = '$email_low'");
      $result = $reponse->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

    function getPass($pseudo) : array {
      $pseudo_low = strtolower($pseudo);
      $reponse = $this->db->query("SELECT mdp FROM Utilisateur WHERE pseudo = '$pseudo_low'");
      $result = $reponse->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

    function getAllCategorie() : array {
      $reponse = $this->db->query("SELECT DISTINCT categorie FROM Categorie");
      $categorie = $reponse->fetchall(PDO::FETCH_ASSOC);
      return $categorie;
    }
    function getIdCategorie($categorie) : array {
      $reponse = $this->db->query("SELECT id FROM Categorie where categorie = $categorie");
      $Idcategorie = $reponse->fetchall(PDO::FETCH_ASSOC);
      return $Idcategorie;
    }

    function crea_utilisateur($pseudo, $mdp, $email) {
      $pass_hache = password_hash($mdp, PASSWORD_DEFAULT);                      // Hachage du mot de passe
      $pseudo = strtolower($pseudo);
      $email = strtolower($email);
      $reponse = $this->db->query("SELECT max(id) FROM Utilisateur");                // Récupération de l'ID max de la table utilisateur
      $max = $reponse->fetch();

      $req = $this->db->prepare("INSERT INTO Utilisateur(id, pseudo, mdp, email, email_verif, date_inscription) VALUES(:id, :pseudo, :mdp, :email, :email_verif, :date_inscription)");
      $req->execute(array(
        "id" => $max[0]+1,
        "pseudo" => $pseudo,
        "mdp" => $pass_hache,
        "email" => $email,
        "email_verif" => FALSE,
        "date_inscription" => date('d/m/o')

        // ENVOIE DE L'EMAIL DE CONFIRMATION
        // $destinataire = $_POST['email'];
        // $sujet = "Activer votre compte";
        // $entete = "From: segeat.b@gmail.com";
        // $message = 'Bienvenue sur VotreSite,
        //
        // Pour activer votre compte, veuillez cliquer sur le lien ci dessous
        // ou copier/coller dans votre navigateur internet. ';
        //
        // ../view/verificationMail.php?pseudo='.urlencode($_POST['pseudo']).'&cle='.urlencode($cle).'
        //
        //
        // ---------------
        // Ceci est un mail automatique, Merci de ne pas y répondre.';
        //
        // ini_set('SMTP','smtp.sfr.com');
        // ini_set('sendmail_from', 'mail@automatique.fr');
        // mail($destinataire, $sujet, $message, $entete) ;
      ));
    }
    function depotAnnonce($pseudo,$intitule,$prix,$description,$ville,$categorie){
      //traite pas les ville
      $id_utilsisateur = $this->bd->getIdUtilisateur($pseudo);
      var_dump($id_utilsisateur);

      $datePublication = date('d/m/o');
      var_dump($datePublication);

      $dateSupression = date('d/m/o',strtotime('+2 month'));
      var_dump($dateSupression);

      $idCategorie = $this->bd->getIdCategorie($categorie);
      var_dump($idCategorie);

      $reponse = $this->db->query("SELECT max(id) FROM Annonce");                // Récupération de l'ID max de la table utilisateur
      $idAnnonce = $reponse->fetch();
      var_dump($idAnnonce);


      /*$req = $this->db->prepare("INSERT INTO Annonce(id, utilisateur, intitule, prix, description, date_publication, date_suppression, ville, categorie) VALUES(:id, :utilisateur, :intitule, :prix, :description, :date_publication, :date_suppression, :ville, :categorie)");
      $req->execute(array(
        "id" => $idAnnonce,
        "utilisateur" => $id_utilsisateur,
        "intitule" => $intitule,
        "prix" =>$prix,
        "description" =>$description ,
        "date_publication" => $datePublication,
        "date_suppression" => $dateSupression,
        "ville" => null,
        "categorie" => $idCategorie
      ));*/
    }


  }

 ?>
