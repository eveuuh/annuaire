<?php 
include ("header.php"); // import du fichier contenant les headers

    session_start(); 
    if(!empty($_SESSION['Adherents'])) {
        echo json_encode(["connected" => true, 'pseudo' => $_SESSION['Adherents'], 'photo' => $_SESSION['photo']]);
    } else {
        http_response_code(400);
        echo json_encode(["connected" => false]);
    }