

<?php 
if(isset($_GET['urll'])){
  echo file_get_contents("".$_GET['urll']);
  // echo $_GET['urll'];
}
else
  echo file_get_contents("http://www.google.com");
?>
