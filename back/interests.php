<?php

include("config.php");
include ("header.php");

$result = [];
$rqt = "SELECT InteretID From Interets" ;

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

$output = array (
    'InteretID' => $id,
    'nom' => $nom
);
echo json_encode($output);