<?php

include("config.php");
include ("header.php");

// Je recherche un membre par son nom ou par son pseudo 
// TODO recherche par centre d'interet
$results = [];
$rqt = "SELECT * FROM Adherents LEFT JOIN Profils ON Adherents.id = Profils.AdherentID WHERE pseudo LIKE :search OR nom LIKE :search OR prenom LIKE :search  LIMIT 2 OFFSET :offset " ;
    try {
        $statement = $connexion->prepare($rqt);
        $search = "%" . $_GET["search"] . "%";
        $page =  $_GET["page"];
        $offset= (int)$_GET["page"]*2;
        $statement->bindParam(':search', $search);
        $statement->bindParam(':offset', $offset,PDO::PARAM_INT);
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








