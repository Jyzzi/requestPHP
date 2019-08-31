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
$nameBottle = $data ->name;
$amountBottle = $data ->amount;
$scoreBottle = $data ->score;
$descriptionBottle = $data ->description;
$categorieBottle = $data ->categorie;



$editBottle = "UPDATE Bottle 
               SET 'name'= $nameBottle, 'amount'= $amountBottle, 'score'= $scoreBottle, 'description'= $descriptionBottle, 'categorieID'= $categorieBottle
               WHERE ID = '$idBottle' ";


if ($conn->query($editBottle) === TRUE){
    echo"edit ok";
  }
  else{
    echo"error";
  }