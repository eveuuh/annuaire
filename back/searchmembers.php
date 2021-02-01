<?php

include("config.php");
include ("header.php");

$results = [];
$rqt = "SELECT * FROM Adherents LEFT JOIN Profils ON Adherents.id = Profils.AdherentID WHERE pseudo LIKE :search OR nom LIKE :search OR prenom LIKE :search";
    try {
        $statement = $connexion->prepare($rqt);
        $search = "%" . $_GET["search"] . "%";
        $statement->bindParam(':search', $search);
        $statement->execute();
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);

        exit;
}catch(Exception $exception) {
    // echo $exception->getMessage();
    echo json_encode('{
        "statut": "error",
        "description": "'.$exception->getMessage().'";
    }');
} 








