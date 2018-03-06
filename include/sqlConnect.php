<?php
	// MySQL Connection
	$db = new mysqli("localhost", "root", "", "WebsiteEvaluation");
	if ($db->connect_errno) 
		echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	

?>