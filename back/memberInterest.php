<?php

include("config.php");
include ("header.php");

$result = [];
$interest =  $_POST["memberInterest"];
$rqt = "INSERT INTO InteretAdherent (AdherentID, CentreInteretID) VALUES (:id, :interet)";

try {
    $statement = $connexion->prepare($rqt);  
    $statement->bindParam(':id', $_SESSION['id']);
    $statement->bindParam(':interet', $interest);
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

