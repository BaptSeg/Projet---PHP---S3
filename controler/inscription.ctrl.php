<?php
// Vérification de la validité des informations
try {
  $bdd = new PDO('sqlite:../data/utilisateur.db');
}
catch (PDOException $e){
  die("erreur de connexion:".$e->getMessage());
}
if (isset($_POST['inscription'])) {

  $pseudo_low = mb_strtolower($_POST['pseudo']);
  $reponse = $bdd->query("SELECT pseudo FROM Utilisateur WHERE pseudo = '$pseudo_low'");
  $pseudo = $reponse->fetchall(PDO::FETCH_ASSOC);

  $email_low = mb_strtolower($_POST['email']);
  $reponse = $bdd->query("SELECT email FROM Utilisateur WHERE email = '$email_low'");
  $email = $reponse->fetchAll(PDO::FETCH_ASSOC);


  if ( empty($pseudo) && empty($email) && ($_POST['mdp1']==$_POST['mdp2']) ) {
    $pass_hache = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);
    $reponse = $bdd->query("SELECT max(id) FROM Utilisateur");
    $max = $reponse->fetch();
    $req = $bdd->prepare("INSERT INTO Utilisateur(id, pseudo, mdp, email, email_verif, date_inscription) VALUES(:id, :pseudo, :mdp, :email, :email_verif, :date_inscription)");
    $req->execute(array(
      "id" => $max[0]+1,
      "pseudo" => $pseudo_low,
      "mdp" => $pass_hache,
      "email" => $email_low,
      "email_verif" => FALSE,
      "date_inscription" => date('d/m/o')
    ));

    // // ENVOIE DE L'EMAIL DE CONFIRMATION
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


    include("../view/test.html");

  }elseif (!empty($pseudo)) {
    $erreur = "Votre pseudo est deja utilisé";
    include("../view/inscription.view.php");

  }elseif (!empty($email)) {
    $erreur = "Cette adresse mail est deja associer a un compte";
    include("../view/inscription.view.php");

  }elseif ($_POST['mdp1']!=$_POST['mdp2']) {
    $erreur = "Les deux mots de passe ne sont pas identique";
    include("../view/inscription.view.php");
  }

} else {
  include("../view/inscription.view.php");
}

// Hachage du mot de passe
//
// $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
//
// // Insertion
// $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
// $req->execute(array(
//     'pseudo' => $pseudo,
//     'pass' => $pass_hache,
//     'email' => $email));



?>
