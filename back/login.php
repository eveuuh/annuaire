<?php
include("config.php");
include ("header.php");

//on stock les données soumises dans des variables de connexion:
$user = $_POST['pseudo']; // Comme le formulaire est soumis avec la méthode post, on utilise le tableau $_POSTpour récupérer les valeurs des champs du formulaire
$pass = $_POST['password']; // On a le mot de passe saisi par l'utilisateur
 
$req = "SELECT pseudo,password,photo,Adherents.id FROM Adherents left join Profils on Adherents.id=AdherentID WHERE pseudo = :pseudo ";   //Préparation de la requête 
//Execution de la rqt
try {
    $statement = $connexion->prepare($req);
    $statement->bindParam(':pseudo', $user);
    //$statement->bindParam(':password', $pass);
    $statement->execute();
    $resultat = $statement->fetch(PDO::FETCH_ASSOC);
    $hash = $resultat['password']; // je recupere le mot de passe dans le resultat
    $photo = $resultat['photo'];
    $userId = $resultat['id'];

} catch(Exception $exception) {
    echo json_encode($exception->getMessage());
    exit;
}

    //On compare les mots avec la fonction password_verify si($password === $hash) afin de se connecter
      
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
       
  

