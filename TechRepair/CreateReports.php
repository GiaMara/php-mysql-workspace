<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Create Reports Table</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<p>
	<?php
	include("db_report.php");
	if ($DBConnect !== FALSE) {
	 $TableName = "reports";
	 $SQLstring = "SHOW TABLES LIKE '$TableName'";
	 $QueryResult = @mysql_query($SQLstring, $DBConnect);
	 if (mysql_num_rows($QueryResult) == 0) {
	 $SQLstring = "CREATE TABLE reports (reporterID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(40), product VARCHAR(40), hardware VARCHAR(40), os VARCHAR(40), occurrence VARCHAR(5), solution VARCHAR(40) )";
	 $QueryResult = @mysql_query($SQLstring, $DBConnect);
	 if ($QueryResult === FALSE)
	 echo "<p>Unable to create the reports table.</p>" . "<p>Error code " . mysql_errno($DBConnect). ": " . mysql_error($DBConnect) . "</p>";
	 else
	 echo "<p>Successfully created the ". "reports table.</p>";
	 }
	 else
	 echo "<p>The reports table already exists.</p>";
	 mysql_close($DBConnect);
	}
	?>
	    
	</p>
</body>
</html>