<?php
session_start();
$user = $_SESSION['user_id'];
include_once "../include/sqlConnect.php";
if(isset($_POST['addweb'])){

    $web = $_POST['website'];
    $tags =  $_POST['tags'];
    
    $sqlCheck = "SELECT * FROM `websites` where website_name = '$web'";
    $result = mysqli_query($db, $sqlCheck);
    if(mysqli_num_rows($result) > 0)
        echo "exists";
    else{
        $webInsertSql = "INSERT INTO `websites`(`website_name`,`add_by_user`,`tags`)
         VALUES ('$web','$user','$tags')";
          mysqli_query($db, $webInsertSql);
          echo "success";
    }

}

if(isset($_POST['score'])){

    $score = $_POST['score']*10;
    $cmt = $_POST['cmt'];
    $type = $_POST['type'];
    $webId= $_POST['webId'];

    $comment = "INSERT INTO `webcomment`(`web_id`, `user_id`, `comment`, `score`, `type`) VALUES 
    ('$webId','$user','$cmt','$score','$type')";
    //  if(mysqli_query($db, $comment))

    if(mysqli_query($db, $comment)){
     
        $scores = "SELECT MAX(webcomment.score) as 'max' ,websites.avg_score from webcomment,websites where webcomment.web_id ='$webId'  and websites.web_id = '$webId'";
        $result = mysqli_query($db, $scores);
        if($row = mysqli_fetch_assoc($result)){
            echo $row['max']."::".$row['avg_score'];
        }
    }
    else
        echo "error";

}

if(isset($_POST['webIdd'])){

    $webId = $_POST['webIdd'];
    $sql = "SELECT * FROM webcomment where web_id = '$webId' ORDER BY `webcomment`.`comment_id` DESC";
    $result = mysqli_query($db, $sql);
    $rr = array();
        while($row = mysqli_fetch_assoc($result)){
            $rr[] = $row;
        }
        echo json_encode($rr);

}

if(isset($_POST['searchWebsite'])){

    $searchWebsite = $_POST['searchWebsite'];
    $type = $_POST['type'];
      $sql = "SELECT website_name,avg_score,tags from websites WHERE ";
      
      if($type=="match")
         $sql.= "MATCH(tags) Against('$searchWebsite') ORDER BY avg_score DESC";
      else
        $sql.= "tags LIKE '%$searchWebsite%' ORDER BY avg_score DESC";
     
       
        $result = mysqli_query($db, $sql);
         $rr = array();
        while($row = mysqli_fetch_assoc($result))
            $rr[] = $row;
        
        echo json_encode($rr);


  

}


?>