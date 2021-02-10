<?php

include("config.php");
include ("header.php");

//Permets de recuperer la liste d'interets contenus dans la BDD

$result = [];
$rqt = "SELECT nom,InteretId From Interets" ; // Requête pour recuperer le tableau 
//execution de la requête
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
//affichage de la reponse sous forme de tableau
$output = array (
    'InteretID' => $id,
    'nom' => $nom
);
echo json_encode($output);