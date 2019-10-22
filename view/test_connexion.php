<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();
    ?>
    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>test</title>
      </head>
      <body>
        <?php echo 'Votre login est '.$_SESSION['pseudo'].' et votre mot de passe est '.$_SESSION['mdp'].'.'; ?>
        <a href="../controler/deconnexion.ctrl.php">deconnexion</a>
      </body>
    </html>
