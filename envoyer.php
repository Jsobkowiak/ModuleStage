<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
echo '<!DOCTYPE html>';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">';

include_once "bd/connect.php";
include_once "object/Question.php";
include_once "object/Reponse.php";
include_once "object/Event.php";
include_once "object/Lot.php";
$db = connect();




if ($db==null){
    echo '<div class="alert alert-danger text-center" role="alert">error bd no connect</div>';
}
else {
    if(empty($_POST)){
        echo '<div class="alert alert-danger text-center" role="alert">Vous venez pas du formulaire</div>';
    } else {
        echo "<meta charset='UTF-8'>";

        //Déclaration des variables
        $tab = $_POST;
        $lastIndexQuestion = 0;
        $listQuestion = [];
        $listelot = [];
        $index = 1;
        // ----------------------------------------------------------------------------------------------------//
                                                        //Event//
        // création de l'event
        $event = new Event($_SESSION["eventLibelle"], $_SESSION["eventLibelle"], $_SESSION["eventDateDebut"], $_SESSION["eventDateFin"]
            ,CreatePass(7), "admin62" . $_SESSION["eventLibelle"], $_SESSION["eventdureequestionnaire"], $_SESSION["eventNombreQuestion"],
            $_SESSION["tirage"], $_SESSION["eventTiragemini"], $_SESSION["eventClause"], $_SESSION["EventRGPD"], $_SESSION["chapo"],
            $_SESSION["reponsevisible"], Date("Y")
        );

        try {
            //Check si l'event existe deja
            $query = $db->prepare('select * from event_tbl where event_lbl LIKE :eventLibelle;');
            if (!$query) return false;
            if (!$query->execute([':eventLibelle'=>$event->getEventLibelle()])) return false;
            $results = $query->fetchAll(\PDO::FETCH_ASSOC);
            //if (empty($results)) return false;

            if($results){
            //si oui fait rien
            }else {
                //Sinon l'envoie dans la base de données
                try {
                    $insertDBPrepare = $db->prepare("insert into event_tbl(event_lbl, event_code, event_actif, event_date_debut, event_date_fin, event_mdp, event_login, event_qrduree, event_nq, event_tirage, event_tirage_mini, event_clause, event_rgpd, event_chapo, event_qr_rep_visible, event_annee)
values (:event_libelle, :event_code, :event_actif, :event_date_debut, :event_date_fin, :event_mdp, :event_login, :event_qrduree, :event_nq, :event_tirage, :event_tirage_mini,:event_clause,:event_rgpd,:event_chapo, :event_qr_rep_visible, :event_annee)");
                    $insertDBPrepare->bindValue("event_libelle", $event->getEventLibelle());
                    $insertDBPrepare->bindValue("event_code", $event->getEventCode());
                    $insertDBPrepare->bindValue("event_actif", "Oui");
                    $insertDBPrepare->bindValue("event_date_debut", Date($event->getEventDateDebut()));
                    $insertDBPrepare->bindValue("event_date_fin", $event->getEventDateFin());
                    $insertDBPrepare->bindValue("event_mdp", $event->getEventMdp());
                    $insertDBPrepare->bindValue("event_login", $event->getEventLogin());
                    $insertDBPrepare->bindValue("event_qrduree", $event->getEventQrduree());
                    $insertDBPrepare->bindValue("event_nq", $event->getEventNq());
                    $insertDBPrepare->bindValue("event_tirage", $event->getEventTirage());
                    $insertDBPrepare->bindValue("event_tirage_mini",$event->getEventTirageMini());
                    $insertDBPrepare->bindValue("event_clause", $event->getEventClause());
                    $insertDBPrepare->bindValue("event_rgpd", $event->getEventRgpd());
                    $insertDBPrepare->bindValue("event_chapo", $event->getEventChapo());
                    $insertDBPrepare->bindValue("event_qr_rep_visible", $event->getEventQrRepVisible());
                    $insertDBPrepare->bindValue("event_annee", $event->getEventAnnee());
                    $insertDBPrepare->execute();

                }catch (Exception $e){
                    echo $e;
                }
            }
        } catch (Exception $e){
            echo $e;
        }

        // ----------------------------------------------------------------------------------------------------//
                                                        //Questions-Réponses//

        // Parcours le tableau $_POST et  créer un object Question, et de le remplir avec les informations du Excel
        foreach($tab as $key => $value) {
            if($tab[$key] === "Q"){
                $question = new Question($tab[$key+1], $tab[$key+2], $tab[$key+3], $tab[$key+4], $tab[$key+5], $tab[$key+8], []);
                $listQuestion[] = $question;
                //var_dump($libelleancienquestion . " Ancienne question");
                if($tab[$key+1] != $listQuestion[$lastIndexQuestion]->getQLibelle()){
                    $lastIndexQuestion++;
                }
            }
            if($tab[$key] === "R"){
                if($tab[$key+3] === "F"){
                    $reponse = new Reponse($tab[$key+1], $lastIndexQuestion, $tab[$key+6], $tab[$key+7], "F");
                } elseif($tab[$key+3] === "B"){
                    $reponse = new Reponse($tab[$key+1], $lastIndexQuestion, $tab[$key+6], $tab[$key+7], "B");
                }
                
                $listQuestion[$lastIndexQuestion]->setQReponse($reponse);
            }
        }

        // Parcours le tableau $listQuestion qui contient l'ensemble de tout les questions et réponse et l'envoie dans la base de donnée
        foreach ($listQuestion as $key => $value){
            //Check si la question existe déjà
            $query = $db->prepare('select * from q_tbl where q_libelle LIKE :qLibelle;');
            if (!$query) return false;
            if (!$query->execute([':qLibelle'=>$value->getQLibelle()])) return false;
            $results = $query->fetchAll(\PDO::FETCH_ASSOC);
            //if (empty($results)) return false;



            if($results){
                //Si oui fait rien
            }else {
                //sinon l'envoie dans la bdd
                try {
                    $getlastidEvent = $db->prepare("select event_id from event_tbl order by event_id desc limit 1");
                    $getlastidEvent->execute();
                    $lastidEvent = $getlastidEvent->fetch(PDO::FETCH_OBJ);


                    $insert = $db->prepare("insert into q_tbl(q_libelle, q_imglibelle, q_sequence, q_textillustration, q_lienillustration, q_categorie, q_event_id) values(:libelle, :imglibelle, :sequence, :textillustration, :lienillustration, :categorie, :q_event_id)");
                    $insert->bindValue("libelle",$value->getQLibelle());
                    $insert->bindValue("imglibelle", $value->getQImglibelle());
                    $insert->bindValue("sequence", $value->getQSequence());
                    $insert->bindValue("textillustration", $value->getQTextillustration());
                    $insert->bindValue("lienillustration", $value->getQLienillustration());
                    $insert->bindValue("categorie", $value->getQCategorie());
                    $insert->bindValue("q_event_id", $lastidEvent->event_id);
                    $insert->execute();

                    $getlastid = $db->prepare("select q_id from q_tbl order by q_id desc limit 1");
                    $getlastid->execute();
                    $lastid = $getlastid->fetch(PDO::FETCH_OBJ);


                }catch (Exception $e){
                    echo $e;
                }
                //Je parcours les réponses pour les envoyers dans la bdd
                foreach ($value->getQReponse() as $reponse){
                    try {
                        $insertReponse = $db->prepare("insert into r_tbl(r_libelle, r_q_id, r_imagereponse, r_type, r_reponsevrai) values (:libelle, :id_question, :imagereponse, :type, :reponsevrai)");

                        $insertReponse->bindValue("id_question", $lastid->q_id);
                        $insertReponse->bindValue("libelle", $reponse->getRLibelle());
                        $insertReponse->bindValue("imagereponse", $reponse->getRImagereponse());
                        $insertReponse->bindValue("type", $reponse->getRType());
                        $insertReponse->bindValue("reponsevrai", $reponse->getRreponsevrai());

                        $insertReponse->execute();
                    }catch (Exception $e){
                        echo $e;
                    }
                }
            }
        }
        // ----------------------------------------------------------------------------------------------------//
                                                        //LOT//

        //Création de l'objet Lot.
        for($i = 0; $i < $_SESSION["nombredelot"]; $i++){
            $listelot[] = new Lot($_SESSION["lotlibelle".$index], $_SESSION["lotfile".$index], intval($_SESSION["lotrepmini".$index]), intval($_SESSION["lotrepmax".$index]), intval($_SESSION["lotquantite".$index]), intval($_SESSION["lotquantite".$index]), $_SESSION["lottype".$index]);
            $index++;
        }


        // Je parcourt la liste de lots puis je l'envoie dans la base de donnée
        foreach ($listelot as $key => $value){
            $getlastidEvent = $db->prepare("select event_id from event_tbl order by event_id desc limit 1");
            $getlastidEvent->execute();
            $lastidEvent = $getlastidEvent->fetch(PDO::FETCH_OBJ);
            try {
                $insertLot = $db->prepare("insert into gain_tbl(gain_libelle, gain_img, gain_quantite, gain_reste, gain_mini, gain_maxi, gain_event_id, gain_type)
values(:gain_libelle, :gain_img, :gain_quantite,:gain_reste,:gain_mini,:gain_maxi,:gain_event_id, :gain_type)");
                $insertLot->bindValue("gain_libelle", $value->getLotLibelle());
                $insertLot->bindValue("gain_img", $value->getLotImg());
                $insertLot->bindValue("gain_quantite", $value->getLotQuantite());
                $insertLot->bindValue("gain_reste", $value->getLotReste());
                $insertLot->bindValue("gain_mini", $value->getLotMini());
                $insertLot->bindValue("gain_maxi", $value->getLotMaxi());
                $insertLot->bindValue("gain_event_id", $lastidEvent->event_id);
                $insertLot->bindValue("gain_type", $value->getTypeReponse());
                $insertLot->execute();
            }catch (Exception $e){
                echo $e;
            }
        }
        echo '<div class="alert alert-success text-center " role="alert">Les données ont bien été envoyées.</div>';
        // var_dump($_SESSION["lot"]);
    }
}

function CreatePass($long_pass)
{
    $consonnes = "bcdfghjklmnpqrstvwxz";
    $voyelles = "aeiouy";
    $mdp='';
    for ($i=0; $i < $long_pass; $i++)
    {
        if (($i % 2) == 0)
        {
            $mdp = $mdp.substr ($voyelles, rand(0,strlen($voyelles)-1), 1);
        }
        else
        {
            $mdp = $mdp.substr ($consonnes, rand(0,strlen($consonnes)-1), 1);
        }
    }
    return $mdp;
}