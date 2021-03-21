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
$id = $data->id;


$listBottle = array();
$selectBottle = "SELECT * 
                 FROM Bottle
                 WHERE categorieID = $id
                 ";

$reqBottle = $conn->query($selectBottle);
while ($row = mysqli_fetch_row($reqBottle)) {
  $list = array( 'id' =>  $row[0], 'name' => $row[1], 'amount' =>  $row[2], 'score' =>  $row[3], 'description' =>  $row[4], 'categorieID' => $row[5]);
  array_push($listBottle,$list);
}

echo json_encode($listBottle);
return json_encode($listBottle);

?>