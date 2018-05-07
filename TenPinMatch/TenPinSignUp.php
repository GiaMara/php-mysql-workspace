<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ten-Pin Registration</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
	<?php
if (empty($_POST['name']))
 echo "<p>You must enter your name. Click your browser's Back button to return to the Registration page.</p>\n";
 else {
 $BName = addslashes($_POST['name']);
 $BAge = addslashes($_POST['age']);
 $BScore = addslashes($_POST['score']);
 $Players = fopen("players.txt", "ab");
 if (is_writeable("players.txt")) {
    if (fwrite($Players, $BName . ", " . $BAge . ", " . $BScore. "\n"))
    echo "<p>Thank you for registering!</p>\n";
    else
    echo "<p>Cannot complete registration at the moment.</p>\n";
 }
 else
    echo "<p>Cannot write to the file.</p>\n";
 fclose($Players);
}
	?>
</body>
</html>