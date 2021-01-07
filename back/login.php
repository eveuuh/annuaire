<?php
header ('Access-Control-Allow-Origin: http://localhost:8081');
header ('Content-Type: application.json');

$userlogin=$_POST['userlogin'];
$userpassword=$_POST['userpassword'];
echo json_encode([$userlogin,$userpassword]);

