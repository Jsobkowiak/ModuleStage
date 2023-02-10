<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="bg-light">
    <div class="container ">
        <form method="post" action="etape2.php">
            <!-- Formulaire Creation Event -->
            <div class="container formEvent">
                <h1 class="text-center">Formulaire Event</h1>
                <div class="form-group">
                    <label for="libelleEvent">Nom de l'événement (Obligatoire)</label>
                    <input type="text" class="form-control" name="libelleEvent" id="libelleEvent" placeholder="Exemple : Enduro" required>
                </div>
                <div class="form-group mt-2">
                    <label class="control-label" for="datestart">Date de début (Obligatoire)</label>
                    <input class="form-control" type="date" id="datestart" name="datedebut" required />
                    <small id="durequestio" class="form-text text-muted">Format de date : JOUR/MOIS/ANNEE</small>

                </div>
                <div class="form-group mt-2">
                    <label class="control-label" for="datefin">Date de fin (Obligatoire)</label>
                    <input class="form-control" type="date" id="datefin" name="datefin" required />
                    <small id="durequestio" class="form-text text-muted">Format de date : JOUR/MOIS/ANNEE</small>

                </div>
                <div class="form-group">
                    <label class="control-label" for="durequestio">Durée du questionnaire (Obligatoire)</label>
                    <input class="form-control" type="number" id="durequestio" name="dureequestionnaire" placeholder="Exemple : 180" required />
                    <small id="durequestio" class="form-text text-muted">La durée du questionnaire est en seconde</small>
                </div>
                <div class="form-group">
                    <label class="control-label" for="nombrequestion">Nombre de question (Obligatoire)</label>
                    <input class="form-control" type="number" id="nombrequestion" name="nombrequestion" placeholder="Exemple : 20" required />
                </div>
                <div class="form-group mt-2">
                    <span>Voulez-vous un tirage? (Obligatoire)</span>
                    <select class="form-select" aria-label="Default select example" name="tirageselect" id="tirageselect" required>
                        <option value="Non">Non</option>                        
                        <option value="Oui">Oui</option>
                    </select>
                </div>
                <div class="form-group mt-2" id="tirageminimum">
                    <label class="control-label" for="tiragemini">Tirage minimum</label>
                    <input class="form-control" type="number" name="tiragemini" id="tiragemini" placeholder="Exemple : 20"  value="0"/>
                </div>
                <div class="form-group mt-2">
                    <span>Voulez-vous que les réponses soient visibles à la fin du questionnaire ?</span>
                    <select class="form-select" aria-label="Default select example" name="reponsevisible" id="reponsevisible" required>
                        <option value="Non">Non</option>                        
                        <option value="Oui">Oui</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="clause">Clause (Obligatoire)</label>
                    <textarea class="form-control" id="clause" name="clause" placeholder="Clause" required></textarea>
                </div>

                <div class="form-group mt-2">
                    <label for="rgpd">RGPD (Obligatoire)</label>
                    <textarea class="form-control" id="rgpd" name="rgpd" placeholder="RGPD" required></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="chapo">Chapo</label>
                    <textarea class="form-control" id="chapo" name="chapo" placeholder="Chapo"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn-lg btn-dark mt-4  mb-4">Suivant</button>
                </div>
            </div>
        </form>
    </div>
    <script src="js/bootstrap.js"></script>
    <script src="js/formulaire.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>