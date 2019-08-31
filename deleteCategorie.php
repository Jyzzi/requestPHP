<?php
header("Access-Control-Allow-Origin: *");
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
$categorieID = $date ->id;



$deleteCategorie = "DELETE  
                    FROM Categorie
                    WHERE ID = '$categorieID' ";


if ($conn->query($deleteCategorie) === TRUE){
    echo"edit ok";
  }
  else{
    echo"error";
  }