<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json; charset=UTF-8');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Max-Age:3600');
header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers,Authorization,X-Requested-With');


include('../config/conn.php');



//$_POST['name']= $_POST['msg']='';
$comment = array();
$comment['records'] = array();
$id = mysqli_real_escape_string($conn,$_POST['id']);

$que = mysqli_query($conn, "SELECT * FROM `comments` WHERE id = '$id' ");

$name = mysqli_real_escape_string($conn,$_POST['name']);
$msg  = mysqli_real_escape_string($conn,$_POST['msg']);




if(mysqli_num_rows($que) > 0)
{
    $query = mysqli_query($conn,"UPDATE `comments` SET name = '$name', msg = '$msg' WHERE id = $id ");

    $que = mysqli_query($conn, "SELECT * FROM `comments` WHERE id = '$id' ");

    while ($row = mysqli_fetch_assoc($que)) {
        $comment_item = array(
            "id" => $row['id'],
            "name" => $row['name'],
            "msg" => $row['msg']
        );
        array_push($comment['records'], $comment_item);
    }

    http_response_code(200);
    echo json_encode($comment);


        
}else{
    echo json_encode(array("message"=>"No item found"));
}





mysqli_close($conn);