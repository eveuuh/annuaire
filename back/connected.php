<?php 
//header ('Access-Control-Allow-Origin: http://localhost:8082');
header ('Access-Control-Allow-Credentials: true');
header ('Access-Control-Allow-Origin: http://www.poneyfront.localhost');
session_set_cookie_params (['samesite' => 'Lax']);

    session_start(); 
    if(!empty($_SESSION['Adherents'])) {
        echo json_encode(["connected" => true, 'pseudo' => $_SESSION['Adherents']]);
    } else {
        echo json_encode(["connected" => false]);
    }