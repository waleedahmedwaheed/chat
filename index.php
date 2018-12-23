<?php
include("connection.php");

session_start();

 $sqli = "Select * from users where email = '".$_SESSION['email']."'"; 
 $result = mysqli_query($conn, $sqli);
 $row = mysqli_fetch_array($result);
 $user_id = $row['user_id'];

if(isset($_POST['submit'])){
	$sender_id = $_POST['sender_id'];
	$receiver_id = $_POST['receiver_id'];
	
	$sqli = "SELECT * FROM friends where (sender_id = '".$sender_id."' and receiver_id = '".$receiver_id."')
	or (sender_id = '".$receiver_id."' and receiver_id = '".$sender_id."')";
	$result =$conn->query($sqli);
	if ($result->num_rows > 0) {
		echo "<script>alert('Request already sent');</script>";
		echo "<script>window.location='index.php';</script>";
	}
	else
	{
		$sqli = "INSERT  INTO friends( sender_id, receiver_id )
                VALUES ('".$sender_id."','".$receiver_id."')";
		$result =$conn->query($sqli);
		echo "<script>alert('Request send successfully');</script>";
		echo "<script>window.location='index.php';</script>";
	}
	
}
 
?>


<!DOCTYPE html>
<html>
<title>Chat</title>


<head>
    
    <link rel="stylesheet"  href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<script src="javascript/jquery.js"></script>
</head>
<body>

<?php include('menu.php'); ?> 

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-12">
 
   <b><h2>Add Users to Friend List</h2></b>
   

 
 
 <table  name="chatbox" class="table table-bordered" style="overflow-y:scroll"  method="post" >



 <?php 

     include 'connection.php';
	 

	 

$sqli = "SELECT * FROM users where user_id <> $user_id and ( user_id not in (
(select receiver_id from friends where sender_id = '$user_id')) and user_id not in (select sender_id from friends where receiver_id = '$user_id'))";
$result =$conn->query($sqli);

$a = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      

	
 //echo strip_tags ($row ['text']."<br>" );

?>
    
                 
                  <tr><td><?php echo $a = $a + 1; ?></td>
				  <td><a href="javascript:void(0)" target="_blank"><?php echo ($row['email']); ?></td>  
				  <td>
				  <form method="post" action="">
				  <input type="hidden" name="sender_id" value="<?=$user_id;?>" />
				  <input type="hidden" name="receiver_id" value="<?=$row['user_id']; ?>" />
				  <input type="submit" name="submit" class="btn btn-primary" value="Add Friend" />
				  </form>
				  </td>
				  </tr>
              
 <?php

                }
                }
                

   
       
 else {
    echo "0 results";
}




?>



             
       </table>
       </div>
       </div>
       </div>
 

</body>
</html> 

<?php 


if (isset($_POST['submit'])) 
{ 
     include 'connection.php';
 $msg=$_POST['msg']; 
 $email_id=$_POST['email_id'];
     
   $sqli = "INSERT  INTO messages(text , email )
                VALUES ('$msg' , ' $email_id')"; 
              
	
	  $result = mysqli_query($conn, $sqli);
	  if($result)
	  	echo("Successfully saved");
             
} 

?> 

