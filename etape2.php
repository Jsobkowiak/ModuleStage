<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION["eventLibelle"] = $_POST["libelleEvent"];
$_SESSION["eventDateDebut"] = $_POST["datedebut"];
$_SESSION["eventDateFin"] = $_POST["datefin"];
$_SESSION["eventdureequestionnaire"] = $_POST["dureequestionnaire"];
$_SESSION["eventNombreQuestion"] = $_POST["nombrequestion"];
$_SESSION["eventTiragemini"] = $_POST["tiragemini"];
$_SESSION["eventClause"] = $_POST["clause"];
$_SESSION["EventRGPD"] = $_POST["rgpd"];
$_SESSION["chapo"] = $_POST["chapo"];
$_SESSION["tirage"] = $_POST["tirageselect"];
$_SESSION["reponsevisible"] = $_POST["reponsevisible"];

if($_SESSION["eventLibelle"] === null){
    header('Location: etape1.php');
    exit();
}


?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-light">
<div class="container">
    <form method="post" action="etape3.php">
        <!-- Formulaire Creation Lot -->
        <div class="container formEvent">
            <h1 class="text-center">Formulaire Lot</h1>
            <span>Combien de lot voulez-vous faire gagner? <input type="number" id="lotchange" name="lotchange"/></span>
            <div id="lot"></div>
            <div class="text-center">
                <input type="button" class="btn-lg btn-dark mt-4 mb-4" value="Précédent" id="preceetape2">
                <button type="submit" class="btn-lg btn-dark mt-4  mb-4">Suivant</button>
            </div>
        </div>
    </form>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/formulaire.js"></script>
<script src="js/formulaireLot.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</body>
</html>
