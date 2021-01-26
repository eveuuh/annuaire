<?php 
include ("header.php");

    session_start(); 
    if(!empty($_SESSION['Adherents'])) {
        echo json_encode(["connected" => true, 'pseudo' => $_SESSION['Adherents'], 'photo' => $_SESSION['photo']]);
    } else {
        echo json_encode(["connected" => false]);
    }