<?php

    include("config.php");
    include ("header.php");

    session_start(); 
    if(empty($_SESSION['id']))  {
        http_response_code(403);
        echo json_encode(["status" => "KO", "description" => "L'utilisateur n'est pas connecté"]);
        exit; 
    }

    $userId= $_SESSION['id'];   
    $connexion = new PDO($url, $userBDD, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $rqt = "SELECT nom FROM Interets LEFT JOIN InteretAdherent ON Interets.InteretID = InteretAdherent.CentreInteretID WHERE InteretAdherent.AdherentID = :id";
    try {
        $statement = $connexion->prepare($rqt);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $exception) {
        echo $exception->getMessage(); 
    }
    for($i = 0 ; $i < count($results) ; $i++) {
       
        $nom = utf8_encode($results[$i]['nom']);
        $resultsUTF8[]['nom'] = utf8_encode($results[$i]['nom']);

    }

    //On renvoie ces résultats en JSON : 
    header('Content-Type: application/json');
    echo json_encode($resultsUTF8);