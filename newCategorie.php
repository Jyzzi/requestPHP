<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");


$server = 'localhost';
$database = 'DrinkMobBdd';
$user = 'user';
$password = '123';
$conn = @mysqli_connect($server,$user,$password,$database);
if(!$conn){
    echo"Erreur de connexion au serveur !";
    echo $server;
    echo $database;
    echo $user;
    exit;
}

$data = json_decode(file_get_contents("php://input"));
$nameCategorie = $data ->name;

$createCategorie = "INSERT INTO categorie VALUES (NULL, '$nameCategorie')";

try {
  $conn->query($createCategorie);
}
catch(Exception $e){
  echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
  