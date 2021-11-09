<?php 
    header("Access-control-Allow-Origin: *");
    header("Content-Type:application/json; charset=UTF-8");

    include ('../config/database.php');

    ///reading from the database 
    $data = $_GET['message'];
    if($data == 'birthday'){
        
        $comment = array();
    
        $comment['records'] = array();
    
        $que = mysqli_query($conn, "SELECT * FROM  `birthdays_image` ");
    
        if(mysqli_num_rows($que) > 0)
        {
            while($row = mysqli_fetch_assoc($que))
            {
                $comment_item = array(
                    "id" => $row['id'],
                    "Birthday_Images"=> $row['img_name'],
                );
                array_push($comment['records'], $comment_item);
            }
    
            http_response_code(200);
    
            echo json_encode($comment);
        }else{
            http_response_code(404);
    
            echo json_encode(array("message"=>"No item found"));
        }


    
    
}elseif($data == "allvideocategory"){
    
    //all video category
    
     $comment = array();
    
        $comment['records'] = array();
    
        $que = mysqli_query($conn, "SELECT * FROM `video_achieve_category`");
    
        if(mysqli_num_rows($que) > 0)
        {
            while($row = mysqli_fetch_assoc($que))
            {
                $comment_item = array(
                    "id" => $row['id'],
                    "video_category"=> $row['video_category'],
                    "mainvideoCategory"=> $row['mainvideoCategory'],
                    "category_img"=> $row['category_img'],
                   
                );
                array_push($comment['records'], $comment_item);
            }
    
            http_response_code(200);
    
            echo json_encode($comment);
        }else{
            http_response_code(404);
    
            echo json_encode(array("message"=>"No item found"));
        }
    
}elseif($data == "lvcomment"){
    
    //all video category
    
     $comment = array();
    
        $comment['records'] = array();
    
        $que = mysqli_query($conn, "SELECT * FROM `comments`");
    
        if(mysqli_num_rows($que) > 0)
        {
            while($row = mysqli_fetch_assoc($que))
            {
                $comment_item = array(
                    
                    "id" => $row['id'],
                    "Name"=> strval($row['name']),
                    "Comment"=> strval($row['comment']),
                );
                array_push($comment['records'], $comment_item);
            }
    
            http_response_code(200);
    
            echo json_encode($comment);
        }else{
            http_response_code(404);
    
            echo json_encode(array("message"=>"No item found"));
        }

}





elseif($data == "comic"){
    
    //all video category
    
     $comment = array();
    
        $comment['records'] = array();
    
        $que = mysqli_query($conn, "SELECT * FROM `comics`");
    
        if(mysqli_num_rows($que) > 0)
        {
            while($row = mysqli_fetch_assoc($que))
            {
                $comment_item = array(
                    "id" => $row['id'],
                    "name"=> $row['name'],
                    "month"=> $row['month'],
                    "filename"=> $row['filename'],
                    "imgsrc"=> $row['imgsrc'],
                   
                );
                array_push($comment['records'], $comment_item);
            }
    
            http_response_code(200);
    
            echo json_encode($comment);
        }else{
            http_response_code(404);
    
            echo json_encode(array("message"=>"No item found"));
        }
    
    
}








    mysqli_close($conn);


