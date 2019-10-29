<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profil</title>
    <link rel="stylesheet" href="../view/css/profil.view.css">
  </head>
  <body>
    <header>
      <nav>
        <div class="logo">
          <a href="../controler/acceuil.ctrl.php">
            <img src="../model/img/L'encoignure_adequate.png" alt="logo" height="55 px" width="55 px">
          </a>
          <div class="titre">
            <h1>L'encoignure adéquate</h1>
            <p>Le site pour trouver la parfaite encoignure sans contentieux</p>
          </div>
        </div>
        <div class="navbar">
          <ul>
            <li>
              <a href="../controler/acceuil.ctrl.php">
              <img src="../model/img/icone_retour.png" alt="icon_user" height="30 px" width="30 px">Retour à l'acceuil</a>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <h2>Voici votre profil <?= $pseudo ?></h2>

    <fieldset>
      <h3>Vos informations</h3>
      <table>
        <tr>
          <th>Pseudo : </th>
          <td><?= $pseudo ?></td>
        </tr>
        <tr>
          <th>Adresse mail : </th>
          <td><?= $email ?></td>
        </tr>
        <tr>
          <th>Adresse : </th>
          <td><?= $adresse ?></td>
        </tr>
        <tr>
          <th>Telephone : </th>
          <td><?= $telephone ?></td>
        </tr>
        <tr>
          <th>Date d'inscription : </th>
          <td><?= $date_inscription ?></td>
        </tr>
      </table>
    </fieldset>
  </body>
</html>
