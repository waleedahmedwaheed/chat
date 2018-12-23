<?php
include("connection.php");

session_start();
 
$_SESSION['email'] = $_POST['email_id'];

 $sqli = "SELECT * FROM users where email = '".$_POST['email_id']."'";
	$result =$conn->query($sqli);
	if ($result->num_rows > 0) {
	}
	else
	{
		$sqli = "INSERT  INTO users( email )
                VALUES ('".$_POST['email_id']."')";
	$result =$conn->query($sqli);
	}
echo "<script>window.location='index.php'</script>";
//error_reporting(0);
?>