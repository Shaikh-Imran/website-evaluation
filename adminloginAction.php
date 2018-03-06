<?php

    include_once 'include/sqlConnect.php';
    if(isset($_POST['login'])){
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        
        $loginSql = "SELECT * FROM members WHERE mId = '$username' AND mPwd = '$pwd'";

        $result = mysqli_query($db, $loginSql);

        if (mysqli_num_rows($result) > 0) {
            session_start();
			$_SESSION['member_id'] = $username;
            header('location:admin/index.php');

        }
           
        else{

            $message = 'Wrong id or Password';
            echo "<script type='text/javascript'>alert('$message');window.location.href = 'adminlogin.html';</script>";
            
	 }
        }
           
        
        

    
       

 
    


?>