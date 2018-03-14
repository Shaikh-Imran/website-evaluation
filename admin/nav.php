<?php

session_start();
if(!isset($_SESSION['member_id'])){
	echo "<SCRIPT type='text/javascript'> //not showing me this
	alert('plz login');
	window.location.replace('../userlogin.html');
	</SCRIPT>";
 }



?>

<nav class="navbar navbar-inverse right">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Website Evaluator</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="viewusers.php">View Users</a></li>
          <li><a href="viewcomments.php">View Comments</a></li>
          <li><a href="websitecomment.php">websites Comments</a></li>
          <li><a href="viewfeedback.php">View Feedback</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          
          <li class = "btn-danger"><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>