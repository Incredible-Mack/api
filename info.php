<?php
    header("Access-control-Allow-Origin: *");
    header("Content-Type:application/json; charset=UTF-8");
    header('Access-Control-Allow-Methods:POST');
    include ('../config/database.php');



     $comment = array();
         
        $comment['errors'] = array();
        
           $comment['records'] = array();
    
     $que = mysqli_query($conn, "SELECT * FROM `info`");
    
        if(mysqli_num_rows($que) > 0)
        {
            while($row = mysqli_fetch_assoc($que))
            {
                $comment_item = array(
                    "id" => $row['id'],
                    "about"=> $row['aboutus'],
                    
                   
                );
                array_push($comment['records'], $comment_item);
            }
    
            http_response_code(200);
    
            echo json_encode($comment);
        }else{
            http_response_code(404);
    
            echo json_encode(array("message"=>"No item found"));
        }
        
        



mysqli_close($conn);