<?php

include("config.php");
include('users.php'); 
//header ('Access-Control-Allow-Origin: http://localhost:8082');
header ('Content-Type: application/json');
header ('Access-Control-Allow-Origin: http://www.poneyfront.localhost');
header ('Access-Control-Allow-Credentials: true');
session_set_cookie_params (['samesite' => 'Lax']);

$user = $_POST['pseudo']; // Comme le formulaire est soumis avec la méthode get, on utilise le tableau $_GET pour récupérer les valeurs des champs du formulaire
$pass = $_POST['password']; // On a le mot de passe saisi par l'utilisateur

    // Pour récupérer le hash qui est stocké : 
  
    $hash = $users[$user]; // Ici j'ai récupéré la valeur du mot de passe hashé pour l'utilisateur choisi dans le formulaire

    //On compare les mots avec la fonction password_verify
    if(password_verify($pass, $hash)) { // si vrai le mot de passe correspond au $hash
        // On vient de récupérer l'utilisateur, on créé sa session
        session_start(); 
        $_SESSION['Adherents'] = $user; // les variable de session sont stockées dans le tableau super global $_SESSION
        
        // On s'occupe de préparer les réponses à envoyer au front en JSON, sans oublier le code de réponse http
        http_response_code(200);
        echo json_encode(["connected" => true]);
    } else { // Sinon, on redirige vers index.php pour qu'il retente de se connecter. 
        // On s'occupe de préparer les réponses à envoyer au front en JSON, sans oublier le code de réponse http
        http_response_code(401); // Non autorisé
        echo json_encode(["connected" => false]);
    }
    
  

