<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Software Bug Reports</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
 <h2>System Report Log</h2>
	<?php
	include("db_report.php");
	if ($DBConnect !== FALSE) {
		$TableName = "reports";
$SQLstring = "SELECT * FROM $TableName";
$QueryResult = @mysql_query($SQLstring, $DBConnect);
echo "<table width='100%' border='1'>\n";
echo "<tr><th>Report #</th>" .
 "<th>Name</th>" . "<th>Product</th>" .
 "<th>Hardware</th>" .
 "<th>Operating System</th>" .
 "<th>Frequency</th>" . "<th>Solution</th></tr>\n";
while (($Row = mysql_fetch_row($QueryResult)) !== FALSE) {
 echo "<tr><td>{$Row[0]}</td>";
 echo "<td>{$Row[1]}</td>";
 echo "<td>{$Row[2]}</td>";
 echo "<td>{$Row[3]}</td>";
 echo "<td>{$Row[4]}</td>";
 echo "<td>{$Row[5]}</td>";
 echo "<td>{$Row[6]}</td></tr>\n";
};
echo "</table>\n";
mysql_free_result($QueryResult);
 mysql_close($DBConnect);
}
		?>
	    
	</p>
</body>
</html>