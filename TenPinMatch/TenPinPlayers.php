<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Registered Ten-Pin Players</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<h2>Registered Ten-Pin Players</h2>
<hr />	<?php
echo "<pre>";
$playerList = file_get_contents("players.txt");
echo $playerList;
echo "</pre>";
?>
</body>
</html>