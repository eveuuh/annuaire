<?php

//Ce fichier sert à regrouper tous les header necessaires pour ce projet 
header ('Content-Type: application/json'); // type mime pour la gestion de l'affichage du JSON sur les navigateurs
header ('Access-Control-Allow-Credentials: true'); //eviter les CORS Policy errors 
header ('Access-Control-Allow-Origin: http://www.poney.local:8081'); // permets les requêtes depuis ce client
