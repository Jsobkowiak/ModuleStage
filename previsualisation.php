<?php
include_once "bd/connect.php";
$db = connect();


$selectAllEvent = $db->prepare("select * from event_tbl");
$selectAllEvent->execute();
$listeEvent = $selectAllEvent->fetchAll();


$selectAllLot = $db->prepare("select * from gain_tbl");
$selectAllLot->execute();
$listeLot = $selectAllLot->fetchAll();


$selectAllQuestion = $db->prepare("select * from q_tbl");
$selectAllQuestion->execute();
$listeQuestion = $selectAllQuestion->fetchAll();


$selectAllReponse = $db->prepare("select * from r_tbl");
$selectAllReponse->execute();
$listeReponse = $selectAllReponse->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container-fluid">
    <table class="table table-striped caption-top  border border-dark rounded">
      <caption class="text-dark h2 text-center">Liste des Events</caption>
      <thead>
        <tr>
          <th scope="col" class="bg-light">ID</th>
          <th scope="col" class="bg-light">Libelle</th>
          <th scope="col" class="bg-light">Code</th>
          <th scope="col" class="bg-light">Actif</th>
          <th scope="col" class="bg-light">Date Début</th>
          <th scope="col" class="bg-light">Date Fin</th>
          <th scope="col" class="bg-light">Mot de passe</th>
          <th scope="col" class="bg-light">Login</th>
          <th scope="col" class="bg-light">Question Durée</th>
          <th scope="col" class="bg-light">Nombre Question</th>
          <th scope="col" class="bg-light">Tirage</th>
          <th scope="col" class="bg-light">Tirage Minimum</th>
          <th scope="col" class="bg-light">Clause</th>
          <th scope="col" class="bg-light">RGPD</th>
          <th scope="col" class="bg-light">Chapo</th>
          <th scope="col" class="bg-light">Reponse visible</th>
          <th scope="col" class="bg-light">Année</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($listeEvent as $key) {
          echo "<tr>";
          echo '<th scope="row" id="' . $key["event_id"] . '">' . $key["event_id"] . '</th>';
          echo '<td>' . $key["event_lbl"] . '</td>';
          echo '<td>' . $key["event_code"] . '</td>';
          echo '<td>' . $key["event_actif"] . '</td>';
          echo '<td>' . $key["event_date_debut"] . '</td>';
          echo '<td>' . $key["event_date_fin"] . '</td>';
          echo '<td>' . $key["event_mdp"] . '</td>';
          echo '<td>' . $key["event_login"] . '</td>';
          echo '<td>' . $key["event_qrduree"] . '</td>';
          echo '<td>' . $key["event_nq"] . '</td>';
          echo '<td>' . $key["event_tirage"] . '</td>';
          echo '<td>' . $key["event_tirage_mini"] . '</td>';
          echo '<td>' . $key["event_clause"] . '</td>';
          echo '<td>' . $key["event_rgpd"] . '</td>';
          echo '<td>' . $key["event_chapo"] . '</td>';
          echo '<td>' . $key["event_qr_rep_visible"] . '</td>';
          echo '<td>' . $key["event_annee"] . '</td>';
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>


  <div class="container-fluid">
    <table class="table table-striped caption-top  border border-dark rounded">
      <caption class="text-dark h2 text-center">Liste des Lots</caption>
      <thead>
        <tr>
          <th scope="col" class="bg-light">ID</th>
          <th scope="col" class="bg-light">Libelle</th>
          <th scope="col" class="bg-light">imageLibelle</th>
          <th scope="col" class="bg-light">Quantité</th>
          <th scope="col" class="bg-light">Reste</th>
          <th scope="col" class="bg-light">Type de réponse</th>
          <th scope="col" class="bg-light">Nombre de réponse minimum</th>
          <th scope="col" class="bg-light">Nombre de réponse maximum</th>
          <th scope="col" class="bg-light">Event ID</th>

        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($listeLot as $key) {
          echo "<tr>";
          echo '<th scope="row">' . $key["gain_id"] . '</th>';
          echo '<td>' . $key["gain_libelle"] . '</td>';
          echo '<td>' . $key["gain_img"] . '</td>';
          echo '<td>' . $key["gain_quantite"] . '</td>';
          echo '<td>' . $key["gain_reste"] . '</td>';
          echo '<td>' . $key["gain_type"] . '</td>';
          echo '<td>' . $key["gain_mini"] . '</td>';
          echo '<td>' . $key["gain_maxi"] . '</td>';
          echo '<td><a href="#' . $key["gain_event_id"] . '">' . $key["gain_event_id"] . '</a></td>';
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>


  <div class="container-fluid">
    <table class="table table-striped caption-top  border border-dark rounded">
      <caption class="text-dark h2 text-center">Liste des questions</caption>
      <thead>
        <tr>
          <th scope="col" class="bg-light">ID</th>
          <th scope="col" class="bg-light">Libelle</th>
          <th scope="col" class="bg-light">imageLibelle</th>
          <th scope="col" class="bg-light">Séquences</th>
          <th scope="col" class="bg-light">Text illustration</th>
          <th scope="col" class="bg-light">Lien illustration</th>
          <th scope="col" class="bg-light">catégorie</th>
          <th scope="col" class="bg-light">Event ID</th>
          <th scope="col" class="bg-light">Réponses</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($listeQuestion as $key) {
          echo "<tr>";
          echo '<th scope="row">' . $key["q_id"] . '</th>';
          echo '<td>' . $key["q_libelle"] . '</td>';
          echo '<td>' . $key["q_imglibelle"] . '</td>';
          echo '<td>' . $key["q_sequence"] . '</td>';
          echo '<td>' . $key["q_textillustration"] . '</td>';
          echo '<td>' . $key["q_lienillustration"] . '</td>';
          echo '<td>' . $key["q_categorie"] . '</td>';
          echo '<td><a href="#' . $key["q_event_id"] . '">' . $key["q_event_id"] . '</a></td>';
          echo '<td>';
          echo '<ul class="list-group">';
          foreach ($listeReponse as $reponse) {
            if ($reponse["r_q_id"] == $key["q_id"]) {
              if ($reponse["r_reponsevrai"] === "F") {
                echo '<li class="list-group-item bg-danger mt-2">' . $reponse["r_libelle"] . '</li>';
              }elseif($reponse["r_reponsevrai"] === "B"){
                echo '<li class="list-group-item bg-success mt-2">' . $reponse["r_libelle"] . '</li>';

              }
            }
          }
          echo '</ul>';
          echo '</td>';
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>