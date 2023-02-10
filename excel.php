    <?php

include 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

    $tab = [];
if($_FILES["file"]["name"] != '') // condition qui regarde si ont a choisie un fichier ou pas.
{
    $allowed_extension = array('xls', 'xlsx'); // je stock les 2 extensions dans un tableau.
    $file_array = explode(".", $_FILES['file']['name']); // Explode retourne un tableau de chaine de caractère
    $file_extension = end($file_array); // retourne le dernier element d'un tableau

    if(in_array($file_extension, $allowed_extension)) { // permet de charger les fichiers Xls ou Xlsx
        if($_FILES["file"]["type"] == "application/vnd.ms-excel"){
            $reader = IOFactory::createReader('Xls');
        } else {
            $reader = IOFactory::createReader('Xlsx');
        }
        $spreadsheet = $reader->load($_FILES['file']['tmp_name']);
        $message = "";
        $test = $spreadsheet->getSheet(0);
        //$writer = IOFactory::createWriter($spreadsheet, 'Html');
        createTableau($test);

    } else {
        $message = '<div class="alert alert-danger">Seul les Xls et Xlsx son possible.</div>';
    }
} else {
    $message = '<div class="alert alert-danger">Veuillez mettre un fichier</div>';
}
echo $message;
//var_dump($tab);
function createTableau($test){
        echo '<table class="table border-dark table-striped">';
        echo '<thead>';
        echo '<tr>';
        foreach ($test->getRowIterator() as $row){
            foreach ($row->getCellIterator() as $cell) {
                //echo '<td>'.$cell->getRow() . '</td>';
                if($cell->getRow() == 1){
                    echo '<th>'.$cell->getValue() . '</th>';
                }
            }
        }
        echo '</tr>';
        echo '<tr>';
        foreach ($test->getRowIterator() as $row){
            foreach ($row->getCellIterator() as $cell) {
                if($cell->getRow() == 2){
                    echo '<th>'.$cell->getValue() . '</th>';
                }
            }
        }
        echo '</tr>';
        echo '<tbody>';
        $ancienneval = 0;
        $numligne = 0;
        foreach ($test->getRowIterator() as $row) {
            foreach ($row->getCellIterator() as $cell) {
                $numligne++;
                if ($cell->getRow() > 3) {
                    if($cell->getRow() != $ancienneval) {
                        echo "<tr>";
                        $ancienneval = $cell->getRow();
                    }
                    $value = $cell->getValue();
                    //var_dump($value);
                    echo '<td><input type="hidden"  name="'. $numligne .'"   value="'. $value .'">'. $value.'</td>';
                }
            }
        }
        echo '</thead>';
        echo "</table>";
    }
?>

