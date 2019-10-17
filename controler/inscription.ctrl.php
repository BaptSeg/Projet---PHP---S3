<?php
// Vérification de la validité des informations
$bdd = new PDO('sqlite:../data/utilisateur.db');

$reponse = $bdd->query('SELECT pseudo FROM Utilisateur WHERE pseudo="'.$_POST['pseudo'].'"');
$pseudo = $reponse->fetch();
$reponse = $bdd->query('SELECT email FROM Utilisateur WHERE email="'.$_POST['email'].'"');
$email = $reponse->fetch();

if (mb_strtolower($pseudo) == mb_strtolower($_POST['pseudo'])) {
  echo "même pseudo";
}
if (mb_strtolower($email) == mb_strtolower($_POST['email'])) {
  echo "même email";
}

if ($bdd->exec("INSERT INTO Utilisateur VALUES (1, $_POST['pseudo'], $_POST['mdp1'], $_POST['email'], CURDATE())") != 0) {
  echo "succes";
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
