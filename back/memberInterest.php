<?php

    include("config.php");
    include ("header.php");

    session_start(); 
    if(empty($_SESSION['id']))  {
        http_response_code(403);
        echo json_encode(["status" => "KO", "description" => "L'utilisateur n'est pas connecté"]);
        exit; 
    }

   
    if($_SERVER['REQUEST_METHOD'] == 'POST') { // On met à jour la liste des centres d'intérêts de l'utilisateur connecté
        $userId= $_SESSION['id'];

        // on recup la liste des centre d.interets que l'utilisateur a choisi :     
        $contentType = getallheaders()["Content-Type"];
        //$checkedNames = array(); 
       // echo ($_POST["resultTest"]);
        if( $contentType == "application/json") {
            // On traite un objet JSON
            echo json_encode('')+"TEST";
        } else {
            // On considère que le front nous a renvoyé des checkbox.     
            if(!empty($_POST["resultTest"])) {
                $resultTest= $_POST["resultTest"];
              
            }
        }
      // je recup un tableau de tableau 
        //le tableau est dynamique il récupére les centres d'interets
        // clé valeur nom : interet; InteretID: 1; 
//permet enregistrement d'UN centre
    $rqt = "INSERT INTO InteretAdherent (AdherentID, CentreInteretID) VALUES (:id, :interet) ";
    
    try {
        $statement = $connexion->prepare($rqt); 
        $statement->bindParam(':interet', $resultTest);
        $statement->bindParam(':id', $userId);
        $statement->execute();
        echo ($rqt);
        /*foreach($resultTest as $i){
            $statement->bindParam(':id', $userId);
            $statement->bindParam(':interet', $i);
            $statement->execute();
        } */
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode($e->getMessage());
        exit;
    }

    echo json_encode(["status" => "ok", "description" => "La liste des centres d'intérêts à été mise à jour"]);
}
