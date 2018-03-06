<?php

    include_once 'include/sqlConnect.php';
    if(isset($_POST['login'])){
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        
        $loginSql = "SELECT * FROM users WHERE username = '$username' AND upwd = '$pwd'";

        $result = mysqli_query($db, $loginSql);

        if (mysqli_num_rows($result) > 0) {
            session_start();
			$_SESSION['user_id'] = $username;
            header('location:user/index.php');

        }
           
        else{

            $message = 'Wrong id or Password';
            echo "<script type='text/javascript'>alert('$message');window.location.href = 'userlogin.html';</script>";
            
	 }
        }
           
        
        

    
       

 
    


?>