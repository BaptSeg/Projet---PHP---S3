<?php

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

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inscription</title>
  </head>
  <body>
    <h1>Inscription</h1>
    <form method="post" action="">
       <fieldset>
         <p>
           <label for="pseudo">Votre pseudo : </label> <input type="text" name="pseudo" id="pseudo" placeholder="Ex : Zozor" required> <br>  #pseudo deja utilisé ?
           <label for="mdp1"> Mots de passe : </label> <input type="password" name="mdp1" id="mdp1" required> <br>   #verifier egamité des mots de passe
           <label for="mdp2"> Mots de passe : </label> <input type="password" name="mdp2" id="mdp2" required> <br>  #apparament javascript ça
           <label for="email"> Email : </label> <input type="email" name="email" id="email" placeholder="exemple@exemple.com" required/> <br>
           <input type="submit" value="Inscription" name="inscription" />
         </p>
       </fieldset>
    </form>

  </body>
</html>
