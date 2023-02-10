<?php

function connect(){
    $host = "localhost";
    $dbname = "testexcel";
    $username = "root";
    $password = "jojo123";


    try{
        $db = new PDO('mysql:host='.$host.';dbname='.$dbname . ';charset=utf8',$username,
            $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;

    }
    catch(Exception $e){
        $db = NULL;
    }
}
?>