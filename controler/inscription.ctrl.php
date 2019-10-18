<?php
// Vérification de la validité des informations

$bdd = new PDO('sqlite:../data/utilisateur.db');

echo "ok1";
if (isset($_POST['inscription'])) {
  echo "ok2";
  $reponse = $bdd->query('SELECT pseudo FROM Utilisateur WHERE pseudo = "'.$_POST['pseudo'].'"');
  $pseudo = $reponse->fetch();
  if (mb_strtolower($pseudo) != mb_strtolower($_POST['pseudo'])) {
    $reponse = $bdd->query("SELECT max(id) FROM Utilisateur");
    $max = $reponse->fetch();
    $req = $bdd->prepare("INSERT INTO Utilisateur(id, pseudo, mdp, email, date_inscription) VALUES(:id, :pseudo, :mdp, :email, :date_inscription)");
    $req->execute(array(
      "id" => $max[0]+1,
      "pseudo" => $_POST['pseudo'],
      "mdp" => $_POST['mdp1'],
      "email" => $_POST['email'],
      "date_inscription" => date('d//m//o')
    ));
    include("../view/test.html")
    // $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, CURDATE())');
    // $req->execute(array(
  }elseif(mb_strtolower($pseudo) == mb_strtolower($_POST['pseudo'])){
    $erreur = "Votre pseudo est deja utilisé";
    include("../view/inscription.view.php");
  }elseif ($email == $_POST['email']) {
    $erreur = "Cette adresse mail est deja associer a un compte";
    include("../view/inscription.view.php");
  }elseif ($_POST['mdp1']!=$_POST['mdp2']) {
    $erreur = "Les deux mots de passe ne sont pas identique";
    include("../view/inscription.view.php");
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

include("../view/inscription.view.php");

?>
