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
        <?php echo 'Votre login est '.$_SESSION['login'].' et votre mot de passe est '.$_SESSION['pwd'].'.'; ?>
        <a href="../controler/deconnexion.ctrl.php"></a>
      </body>
    </html>
