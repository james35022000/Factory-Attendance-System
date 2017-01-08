<?php
$success = FALSE;
header("Content-Type:text/html; charset=utf-8");
session_start();
?>
<html>
<head>
<?php

	error_reporting(0);
	include_once('db.php');
    $id = $_POST['id'];
    $password = $_POST['password'];
    
	$query = mysql_query("SELECT * FROM `test` WHERE `id` = '$id' AND `password` = '$password'");
	$data=mysql_fetch_assoc($query);

	//var_dump($data);
	if (!$data){
		$success = FALSE;
	}else{
		$success = TRUE;
		//echo "success";
		$_SESSION['logged_in'] = TRUE;
		$_SESSION['data'] = $data;
?>
		<meta http-equiv="refresh"
   content="0; url=home.php">
   <?php
	}
		
?>

<title></title>
</head>
<body>
<?php
if (!$success) :
	?><font size=\"20px\">Login failed.</font>
        <br />
        <font size="20px">
        <a href="javascript:history.back(-1);">Go back</a>
        </font>
        <?php endif; ?>
</body>
</html>
