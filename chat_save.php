<?php
include 'connection.php';
 $msg=$_REQUEST['msg']; 
 $to_user_id=$_POST['to_user_id'];
 $from_user_id=$_POST['from_user_id'];
     
    $sqli = "INSERT  INTO user_message(to_user_id , from_user_id, message )
                VALUES ('$to_user_id' , '$from_user_id', '$msg')"; 
	  $result = mysqli_query($conn, $sqli);
	  
?>	  