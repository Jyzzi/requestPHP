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
}


$data = json_decode(file_get_contents("php://input"));
$nameBottle = $data ->name;
$amountBottle = $data ->amount;
$scoreBottle = $data ->score;
$descriptionBottle = $data ->description;
$categorieBottle = $data ->categorie;



$addBottle = "INSERT INTO Bottle ('name', 'amount', 'score', 'description', 'categorieID') 
              VALUES ('$nameBottle', $amoutBottle, $scoreBottle, '$descriptionBottle', $categorieBottle) 
              ";

if ($conn->query($addBottle) === TRUE){
  echo"update ok";
}
else{
  echo"error";
}
 
?>