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

$listCategorie = array();

$selectCategorie = "SELECT * 
                    FROM Categorie
                    ORDER BY name
                    ";
$reqCategorie = $conn->query($selectCategorie);
while ($row = mysqli_fetch_row($reqCategorie)) {
  $list = array( 'id' =>  $row[0], 'name' => $row[1]  );
  array_push($listCategorie,$list);
}

echo json_encode($listCategorie);
return json_encode($listCategorie);

?>