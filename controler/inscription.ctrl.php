<?php
include_once("../view/inscription.view.php");
// Vérification de la validité des informations

$bdd = new PDO('sqlite:../data/utilisateur.db');

if (isset($_POST['inscription'])) {
  $reponse = $bdd->query('SELECT pseudo FROM Utilisateur WHERE pseudo = "'.$_POST['pseudo'].'"');
  $pseudo = $reponse->fetch();
  if (mb_strtolower($pseudo) != mb_strtolower($_POST['pseudo'])) {
    $req = $bdd->prepare("INSERT INTO Utilisateur(id, pseudo, mdp, email, date_inscription) VALUES(:id, :pseudo, :mdp, :email, :date_inscription)");
    $req->execute(array(
      "id" => 1,
      "pseudo" => $_POST['pseudo'],
      "mdp" => $_POST['mdp1'],
      "email" => $_POST['email'],
      "date_inscription" => null
    ));

    // $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
    // $req->execute(array(
  }
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
