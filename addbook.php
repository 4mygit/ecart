<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
//header('Access-Control-Allow-Headers: X-Requested-With');
//header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

include_once('conn.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$data = json_decode(file_get_contents("php://input"));
//$data = json_decode($_POST);
$title = $data->title;
$author = $data->author;
$price = $data->price;
$category = $data->category;
$description = $data->description;


$sql = "INSERT INTO `item` (`id`,`title`, `author`, `price`, `category`, `description`) VALUES (NULL,'{$title}','{$author}', '{$price}', '{$category}','{$description}')";

if($title != ''){
//$sql = "INSERT INTO `item` (`id`,`title`, `author`, `price`, `category`, `description`) VALUES (NULL,'{$title}','{$author}', '{$price}', '{$category}','{$description}')";
}
//$sql = "INSERT INTO `item` (`id`,`title`, `author`, `price`, `category`, `description`) VALUES (NULL,'Gitanjali','Tagore', '22', 'Fiction','Desc')";
if(mysqli_query($con,$sql)){
$recordId = mysqli_insert_id($con);

echo json_encode(
    array('message' => $recordId
    )
);


}else{
    echo json_encode(
        array('message' => 'failed'
        )
    );
}

}

?>