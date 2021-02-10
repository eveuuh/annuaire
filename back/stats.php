<?php

include("config.php");
include ("header.php");

$result = [];
$rqt = "SELECT * FROM Adherents LEFT JOIN Profils on Profils.AdherentID=Adherents.id " ;

try {
    $statement = $connexion->prepare($rqt);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
exit;
}catch(Exception $exception) {
    // echo $exception->getMessage();
    echo json_encode('{
        "statut": "error",
        "description": "'.$exception->getMessage().'";
    }');
} 

