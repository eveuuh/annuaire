<?php
include("config.php");
include ("header.php");

$user = $_POST['pseudo']; // Comme le formulaire est soumis avec la méthode get, on utilise le tableau $_GET pour récupérer les valeurs des champs du formulaire
$pass = $_POST['password']; // On a le mot de passe saisi par l'utilisateur

$req = "SELECT pseudo,password,photo,Adherents.id FROM Adherents left join Profils on Adherents.id=AdherentID WHERE pseudo = :pseudo ";    

try {
    $statement = $connexion->prepare($req);
    $statement->bindParam(':pseudo', $user);
    //$statement->bindParam(':password', $pass);
    $statement->execute();
    $resultat = $statement->fetch(PDO::FETCH_ASSOC);
    $hash = $resultat['password'];
    $photo = $resultat['photo'];
    $userId = $resultat['id'];

} catch(Exception $exception) {
    echo json_encode($exception->getMessage());
    exit;
}

    //On compare les mots avec la fonction password_verify
    //if ($password === $hash){    
        if(password_verify($pass, $hash)) {
            session_start(); 
            $_SESSION['Adherents'] = $user;
            $_SESSION['photo'] = $photo;
            $_SESSION['id'] = $userId;

            http_response_code(200);
            echo json_encode(["connected" => true]);
        } else {
            http_response_code(401); // Non autorisé
            echo json_encode(["connected" => false]);
        }    
       
  

