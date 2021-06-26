<?php 
	session_start();
	$userId = isset($_SESSION['uid']) ? $_SESSION['uid'] : ""; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
</head>
<body>

	<h1>Welcome, <?php echo $userId; ?></h1>

	
</body>
</html>