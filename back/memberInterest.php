<?php

    include("config.php");
    include ("header.php");

    session_start();
    if(empty($_SESSION['id']))  {
        http_response_code(403);
        echo json_encode(["status" => "KO", "description" => "L'utilisateur n'est pas connecté"]);
        exit; 
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET') { // On renvoi la liste des centres d'intérêts
        $rqt = "SELECT * FROM Interets";
        $stmt = $connexion->prepare($rqt); 
        $stmt->execute(); 
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') { // On met à jour la liste des centres d'intérêts de l'utilisateur connecté
        $userId= $_SESSION['id'];
        $checkedNames = array(['checkedNames']); 
        $contentType = getallheaders()["Content-Type"];
        if( $contentType == "application/json") {
            // On traite un objet JSON
            echo json_encode('');
        } else {
            // On considère que le front nous a renvoyé des checkbox.     
            if(!empty($_POST["checkedNames"])) {
                $interests= $_POST["checkedNames"];
            }
        }
      // je recup un tableau de tableau 
        //le tableau est dynamique il récupére les centres d'interets
        // clé valeur nom : interet; InteretID: 1; 

    $rqt = "INSERT INTO InteretAdherent (AdherentID, CentreInteretID) VALUES (:id, :interet) ";

    try {
        $statement = $connexion->prepare($rqt); 
        foreach($checkedName as $i){
            $statement->bindParam(':id', $_SESSION['id']);
            $statement->bindParam(':interet', $i);
            $statement->execute();
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode($e->getMessage());
        exit;
    }

    echo json_encode(["status" => "ok", "description" => "Les liste des centres d'intérêts à été mise à jour"]);
}