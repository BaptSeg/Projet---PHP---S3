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

/* ------------------------------------------------------ */
/* ------------------ METHODES  ------------------------- */
/* ------------------------------------------------------ */

/* ------------------------- VERIFIE SI LE PSEUDO EXISTE DEJA DANS LA BD ------------------------- */

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

/* ------------------------- VERIFIE SI L'EMAIL EXISTE DEJA DANS LA BD ------------------------- */

    function email_exist($email) : array {
      $email_low = strtolower($email);
      $reponse = $this->db->query("SELECT email FROM Utilisateur WHERE email = '$email_low'");
      $result = $reponse->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    }

/* ------------------------- RECUPERE L'ID D'UN UTILISATEUR AVEC SON PSEUDO ------------------------- */

    function getIdUtilisateur($pseudo) : array{
      $pseudo_low = strtolower($pseudo);
      $reponse = $this->db->query("SELECT id FROM Utilisateur WHERE pseudo = '$pseudo_low'");
      $result = $reponse->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

/* ------------------------- RECUPERE LE MDP HACHÉ D'UN UTILISATEUR AVEC SON PSEUDO  ------------------------- */


    function getPass($pseudo) : array {
      $pseudo_low = strtolower($pseudo);
      $reponse = $this->db->query("SELECT mdp FROM Utilisateur WHERE pseudo = '$pseudo_low'");
      $result = $reponse->fetch(PDO::FETCH_ASSOC);
      return $result;
    }

/* ------------------------- RECUPERE TOUTE LES CATEGORIE EXISTANTE DANS LA BD ------------------------- */

    function getAllCategorie() : array {
      $reponse = $this->db->query("SELECT DISTINCT categorie FROM Categorie");
      $categorie = $reponse->fetchall(PDO::FETCH_ASSOC);
      return $categorie;
    }

/* ------------------------- RECUPERE TOUTE LES REGIONS EXISTANTE DANS LA BD ------------------------- */

    function getAllRegions() : array {
      $reponse = $this->db->query("SELECT DISTINCT region FROM Localisation");
      $categorie = $reponse->fetchall(PDO::FETCH_ASSOC);
      return $categorie;
    }

/* ------------------------- RECUPERE TOUTE LES VILLES EXISTANTE DANS LA BD ------------------------- */

    function getAllVille() : array {
      $reponse = $this->db->query("SELECT DISTINCT ville FROM Localisation");
      $ville = $reponse->fetchall(PDO::FETCH_ASSOC);
      return $ville;
    }

/* ------------------------- RECHERCHE TOUT LES ANNONCE CORRESPONDANT AUX PARAMETRES  ------------------------- */

    function rechercherAnnonce($cat, $region , $prixMin, $prixMax) : array {
      $intPMin = (int) $prixMin;
      $intPMax = (int) $prixMax;

      $reponse = $this->db->query("SELECT a.* FROM Annonce a, Localisation l WHERE l.region = '$region' and l.ville = a.ville and a.categorie = '$cat' and a.prix >= $intPMin and a.prix <= $intPMax ");
      $annonces = $reponse->fetchall(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Annonce');
      return $annonces;
    }

/* ------------------- AJOUTER UN UTILISATEUR A LA BD ------------------- */

    function crea_utilisateur($pseudo, $mdp, $email, $adresse, $tel) {
      $pass_hache = password_hash($mdp, PASSWORD_DEFAULT);                      // Hachage du mot de passe
      $pseudo = strtolower($pseudo);
      $email = strtolower($email);
      $reponse = $this->db->query("SELECT max(id) FROM Utilisateur");                // Récupération de l'ID max de la table utilisateur
      $max = $reponse->fetch();


      $req = $this->db->prepare("INSERT INTO Utilisateur(id, pseudo, mdp, email, adresse, telephone, date_inscription) VALUES(:id, :pseudo, :mdp, :email, :adresse, :telephone, :date_inscription)");
      $req->execute(array(
        "id" => $max[0]+1,
        "pseudo" => $pseudo,
        "mdp" => $pass_hache,
        "email" => $email,
        "adresse" => $adresse,
        "telephone" => $tel,
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


/* ------------------- DEPOSER UNE ANNONCE ------------------- */

    function depotAnnonce($pseudo,$intitule,$prix,$description,$ville,$categorie) : int { // retourbe l'indice de l'annonce
      //traite pas les ville
      $id_utilisateur = $this->getIdUtilisateur($pseudo);

      $datePublication = date('d/m/o');

      $dateSupression = date('d/m/o',strtotime('+3 month'));

      $reponse = $this->db->query("SELECT max(id) FROM Annonce");               // Récupération de l'ID max de la table Annonce
      $idAnnonce = $reponse->fetch();

      if($idAnnonce['max(id)'] == null){                                        // si null car aucune annonce
        $idAnnonce['max(id)'] = 0;
      }

      $req = $this->db->prepare("INSERT INTO Annonce(id, utilisateur, intitule, prix, description, date_publication, date_suppression, ville, categorie) VALUES(:id, :utilisateur, :intitule, :prix, :description, :date_publication, :date_suppression, :ville, :categorie)");
      $req->execute(array(
        "id" => $idAnnonce['max(id)']+1,
        "utilisateur" => $id_utilisateur['id'],
        "intitule" => $intitule,
        "prix" =>$prix,
        "description" =>$description ,
        "date_publication" => $datePublication,
        "date_suppression" => $dateSupression,
        "ville" => $ville,
        "categorie" => $categorie
      ));
      return $idAnnonce['max(id)']+1;
    }

/* ------------------- ENREGISTREMENT DES PHOTOS SUITE AU DEPOT D'UNE ANNONCE ------------------- */

      function uploadPhotos($pseudo, $file, $id_annonce) {

        $nb_photos = count($file['name']);
        if ($nb_photos > 5) {
          $nb_photos = 5;
        }

        for ($i = 0; $i<$nb_photos; $i++) {
          if ($file['error'][$i] <= 0) {

            $reponse = $this->db->query("SELECT max(id) FROM Photos");
            $id_photos = $reponse->fetch();
            $id_photos = $id_photos[0];
            if($id_photos == null){                                        // si null car aucune annonce
              $id_photos = 1;
            } else {
              $id_photos += 1;
            }

            $url = "../model/data/img_annonce/".$file['name'][$i];
            move_uploaded_file($file['tmp_name'][$i], $url);
            $this->photosAnnonce($id_photos, $url, $id_annonce);

          }
        }
      }

/* ------------------- AJOUT D'UNE PHOTOS A UNE ANNONCE  ------------------- */

      function photosAnnonce($id_photos, $url,$idAnnonce) {
        $req = $this->db->prepare("INSERT INTO Photos(id,url,annonce) VALUES(:id,:url,:annonce)");
        $req->execute(array(
          "id" => $id_photos,
          "url" => $url,
          "annonce" => $idAnnonce
        ));
      }

/* ------------------- RECUPERE UNE ANNONCE AVEC L'ID DE SON UTILISATEUR  ------------------- */

      function recupererAnnonce($id_utilisateur) {
        $res = $this->db->query("SELECT * FROM Annonce WHERE utilisateur=$id_utilisateur");
        $annonce = $res->fetchall(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Annonce');
        return $annonce;
      }

/* ------------------- RECUPERE UNE LES PHOTOS D'UNE ANNONCE  ------------------- */

      function recupererPhotos($id_annonce) {
        $res = $this->db->query("SELECT url FROM Photos WHERE annonce=$id_annonce");
        $photos = $res->fetchAll();
        return $photos;
      }

/* ------------------- RECUPERE UN UTILISATEUR AVEC SON ID ------------------- */

      function recupererUtilisateur($id) : Utilisateur {
        $res = $this->db->query("SELECT * FROM Utilisateur WHERE id='$id'");
        $utilisateur = $res->fetchall(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Utilisateur');
        return $utilisateur[0];
      }

  /* ------------------- RECUPERE UNE ANNONCE AVEC SON ID ------------------- */
      function recupererAnnonceID($id) : Annonce {
        $int_id = (int) $id;
        $res = $this->db->query("SELECT * FROM Annonce WHERE id='$id'");
        $annonce = $res->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Annonce');
        return $annonce[0];
      }

}
 ?>
