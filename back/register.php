<?php


include ("header.php");
require_once("config.php");


//if(isset($_POST["submitButton"])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $number= $_POST['number'];
    $addresse = $_POST['Addresse'];
    $codepostal = $_POST['CodePostal'];
    $ville = $_POST['Ville'];
    $numeroadherent = $_POST['NumeroAdherent'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $dateadhesion = $_POST['DateAdhesion'];
 
//TODO verif format n°adh//
    $hash = password_hash($password, PASSWORD_DEFAULT); 
// Création d'une requête SQL (plus exactement, d'un requête paramétrée)
    $rqt = "INSERT INTO Adherents (Prenom, Nom, Pseudo, email, Numero, Addresse, CodePostal, Ville, NumeroAdherent,Password,  DateAdhesion) 
                VALUES (:prenom, :nom, :pseudo, :email, :numero , :addresse, :codepostal, :ville, :numeroadherent, :password, :dateadhesion )";
    
    //On prépare notre requête et on l'exécute
    try {
        $statement = $connexion->prepare($rqt);
        $statement->bindParam(':prenom', $prenom);
        $statement->bindParam(':nom', $nom);
        $statement->bindParam(':pseudo', $pseudo);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':numero', $number);
        $statement->bindParam(':addresse', $addresse);
        $statement->bindParam(':codepostal', $codepostal);
        $statement->bindParam(':ville', $ville);
        $statement->bindParam(':numeroadherent', $numeroadherent);
        $statement->bindParam(':password', $hash);
        $statement->bindParam(':dateadhesion', $dateadhesion);
        $statement->execute();

        echo json_encode('{
            "statut": "ok",
            "description": "Inscription bien enregistrée" 
        }');
    } catch(Exception $exception) {
        // echo $exception->getMessage();
        echo json_encode('{
            "statut": "error",
            "description": "'.$exception->getMessage().'";
        }');
    }
//}