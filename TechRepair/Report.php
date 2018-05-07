<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Software Bug Report</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<h1>Fill up the form to report a software bug.</h1>
	<?php
	if (isset($_POST['Submit'])) {
		$FormErrorCount = 0;
 if (isset($_POST['ReporterName'])) {
 $ReporterName = stripslashes($_POST
['ReporterName']);
 $ReporterName = trim($ReporterName);
 if (strlen($ReporterName) == 0) {
 echo "<p>You must include your
 name!</p>\n";
 ++$FormErrorCount;
 }
 }
 else {
 echo "<p>Form submittal error (No
 'ReporterName' field)!</p>\n";
 ++$FormErrorCount;
 }
 if (isset($_POST['RepProduct'])) {
 $RepProduct = stripslashes($_POST['RepProduct']);
 $RepProduct = trim($RepProduct);
 if (strlen($RepProduct) == 0) {
 echo "<p>You must include product name and version!</p>\n";
 ++$FormErrorCount;
 }
 }
 else {
 echo "<p>Form submittal error (No
 'RepProduct' field)!</p>\n";
 ++$FormErrorCount;
 }
 
 if (isset($_POST['RepHardware'])) {
 $RepHardware = stripslashes($_POST['RepHardware']);
 $RepHardware = trim($RepHardware);
 if (strlen($RepHardware) == 0) {
 echo "<p>You must include product hardware!</p>\n";
 ++$FormErrorCount;
 }
 }
 else {
 echo "<p>Form submittal error (No
 'RepHardware' field)!</p>\n";
 ++$FormErrorCount;
 }
 
 if (isset($_POST['RepOS'])) {
 $RepOS = stripslashes($_POST['RepOS']);
 $RepOS = trim($RepOS);
 if (strlen($RepOS) == 0) {
 echo "<p>You must include product's operating system!</p>\n";
 ++$FormErrorCount;
 }
 }
 else {
 echo "<p>Form submittal error (No
 'RepOS' field)!</p>\n";
 ++$FormErrorCount;
 }
 
 if (isset($_POST['RepOccurrence'])) {
 $RepOccurrence = stripslashes($_POST['RepOccurrence']);
 $RepOccurrence = trim($RepOccurrence);
 if (strlen($RepOccurrence) == 0) {
 echo "<p>You must include frequency of bug occurrence!</p>\n";
 ++$FormErrorCount;
 }
 }
 else {
 echo "<p>Form submittal error (No
 'RepOccurrence' field)!</p>\n";
 ++$FormErrorCount;
 }
 
  if (isset($_POST['RepSolution'])) {
 $RepSolution = stripslashes($_POST['RepSolution']);
 $RepSolution = trim($RepSolution);
 if (strlen($RepSolution) == 0) {
 echo "<p>You must include a proposed solution!</p>\n";
 ++$FormErrorCount;
 }
 }
 else {
 echo "<p>Form submittal error (No
 'RepSolution' field)!</p>\n";
 ++$FormErrorCount;
 }
 
 if ($FormErrorCount == 0) {
 	$ShowForm = FALSE;
 include("db_report.php");
 if ($DBConnect !== FALSE) {
 	$TableName = "reports";
 $SQLstring = "INSERT INTO $TableName " .
 "(name, product, hardware, os, occurrence, solution) VALUES " .
 "('$ReporterName', '$RepProduct', '$RepHardware', '$RepOS', '$RepOccurrence', '$RepSolution')";
 $QueryResult = @mysql_query($SQLstring, $DBConnect);
 if ($QueryResult === FALSE)
 echo "<p>Unable to insert the values into
 the report table.</p>"
 . "<p>Error code " . mysql_errno($DBConnect)
 . ": " . mysql_error($DBConnect) . "</p>";
 else {
 $ReporterID = mysql_insert_id($DBConnect);
 echo "<p>" . htmlentities($ReporterName) .
 ", your report has been recorded.<br />";
 echo "Your report reference number is
 $ReporterID.<br />";
 ".</p>";
 }
 mysql_close($DBConnect);
 }
 }
 else
 $ShowForm = TRUE;
}
else {
	$ShowForm = TRUE;
 $SReporterName = "";
 $RepProduct = ""; 
 $RepHardware = ""; 
 $RepOS = ""; 
 $RepOccurrence = ""; 
 $RepSolution = ""; 
}
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
	 echo "<p>Successfully recorded ". "bug report.</p>";
	 }
	 else
	 //echo "<p>The subscribers table already exists.</p>";
	 mysql_close($DBConnect);
	}
	if ($ShowForm) {
 ?>
<form action="Report.php" method="POST">
<p><strong>Name: </strong>
<input type="text" name="ReporterName" value="<?php echo
$Name; ?>" /></p>
<p><strong>Product (Name and Version): </strong>
<input type="text" name="RepProduct" value="<?php echo
$Product; ?>" /></p>
<p><strong>Hardware Type: </strong>
<input type="text" name="RepHardware" value="<?php echo
$Hardware; ?>" /></p>
<p><strong>Operating System: </strong>
<input type="text" name="RepOS" value="<?php echo
$OS; ?>" /></p>
<p><strong>Frequency of Occurrence: </strong>
<input type="text" name="RepOccurrence" value="<?php echo
$Occurrence; ?>" /></p>
<p><strong>Proposed Solution: </strong>
<input type="text" name="RepSolution" value="<?php echo
$Solution; ?>" /></p>
<p><input type="Submit" name="Submit" value="Submit"
/></p>
</form>
<p><a href="ShowReport.php">Show Reports</a></p>

 <?php
}
	?>
	    
	</p>
</body>
</html>