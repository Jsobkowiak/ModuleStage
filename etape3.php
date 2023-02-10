<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION["lot"] = $_POST;
$index = 1;

if(empty($_POST)){
    header('Location: etape1.php');
}

$_SESSION["nombredelot"] = $_POST["lotchange"];
for ($i = 0; $i < $_POST["lotchange"] ; $i++){
    $_SESSION["lotlibelle".$index] = $_POST["libelle".$index];
    $_SESSION["lotfile".$index] = $_POST["file".$index];
    $_SESSION["lotquantite".$index] = $_POST["quantity".$index];
    $_SESSION["lotrepmini".$index] = $_POST["repmini".$index];
    $_SESSION["lotrepmax".$index] = $_POST["repmax".$index];
    $_SESSION["lottype".$index] = $_POST["type".$index];
    
    $index++;
    
}
?>
    <!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PhpExcel</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body class="bg-light">
<div class="container mt-5  ">
    <h1>Ajouter le fichier Excel des Questions-Réponses</h1>
    <form method="post"  enctype='multipart/form-data' id="formload">
        <div class="row">
            <label for="file">Fichier Excel</label>
            <input type="file" name="file" id="file" class="form-control">
            <div class="col">
            <input type="button" class="align-self-center mt-4 btn btn-outline-dark form-control" id="preceetape3" value="Recommencer">
            </div>
            <div class="col">
            <input type="submit" class="align-self-center mt-4 btn btn-outline-dark form-control">
            </div>
        </div>
    </form>
    <br>
    <form method="post" action="envoyer.php" id="formsend">
        <div id="excel_area">
    </form>
</div>
<script src="js/formulaireetape3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

<?php
//$nomevent = $_POST["libel"];

//$_SESSION["nomevent"] = $_POST;

//var_dump($_SESSION);

