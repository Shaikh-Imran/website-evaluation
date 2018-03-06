<?php

    include_once 'include/sqlConnect.php';

    if(isset($_POST['register'])){
        $username = $_POST['fname'];
        $uFname = $_POST['lname'];
        $uLname = $_POST['username'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $upwd = $_POST['pwd'];
       
        $insertUserSql= "INSERT INTO `users`(`username`, `uFname`, `uLname`, `uEmail`, `uContact`, `uPwd`) VALUES 
        
        ('$username','$uFname','$uLname','$email','$contact','$upwd')";

        $result = mysqli_query($db, $insertUserSql);
         if($result)
            echo "<script type='text/javascript'>alert('Success!plz login to enter ');window.location.href = 'userlogin.html';</script>";

         

       
    }
    
    ?>