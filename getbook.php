<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
//header('Access-Control-Allow-Headers: X-Requested-With');
//header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

include_once('conn.php');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

$data = json_decode(file_get_contents("php://input"));

$tableData =  array();


$sql = "select * from item";
$result = mysqli_query($con,$sql);

while($rows =  mysqli_fetch_assoc($result)){
    extract($rows);
 
    array_push($tableData, $rows);
 
 
 }
 
 
 echo json_encode($tableData);



}

?>