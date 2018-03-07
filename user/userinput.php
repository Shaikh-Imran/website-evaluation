<?php
session_start();
$user = $_SESSION['user_id'];
include_once "../include/sqlConnect.php";
if(isset($_POST['addweb'])){

    $web = $_POST['website'];
    
    $sqlCheck = "SELECT * FROM `websites` where website_name = '$web'";
    $result = mysqli_query($db, $sqlCheck);
    if(mysqli_num_rows($result) > 0)
        echo "exists";
    else{
        $webInsertSql = "INSERT INTO `websites`(`website_name`,`add_by_user`)
         VALUES ('$web','$user')";
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
     
        $scores = "SELECT MAX(webcomment.score) as 'max' ,avgscore.avg_score from webcomment,avgscore where webcomment.web_id ='$webId' ";
        $result = mysqli_query($db, $scores);
        if($row = mysqli_fetch_assoc($result)){
            echo $row['max']."::".$row['avg_score'];
        }
    }
    else
        echo "error";

}


?>