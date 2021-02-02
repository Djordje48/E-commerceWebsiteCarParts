<?php
session_start();



?>

<html>
<head>
<title>home page</title>

</head>
<body>
	<a href="logout.php">Log out</a>
	<h1> Dobrodosli <?php echo $_SESSION['username']; ?></h1>
</body>

</html>