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
	
	$sqli = "update friends set status = 1 where sender_id = '".$sender_id."' and receiver_id = '".$receiver_id."'";
	$result = mysqli_query($conn, $sqli); 
		echo "<script>alert('Request accepted');</script>";
		echo "<script>window.location='index.php';</script>";
	
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
 
   <b><h2>Friend Requests</h2></b>
   
 
 
 <table  name="chatbox" class="table table-bordered" style="overflow-y:scroll"  method="post" >



 <?php 

     include 'connection.php';
	 

	 

$sqli = "SELECT * FROM friends where receiver_id = $user_id and status = 0";
$result =$conn->query($sqli);

$a = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      
$sqli = "SELECT * FROM users where user_id = '".$row['sender_id']."'";
$result =$conn->query($sqli);
$row = $result->fetch_assoc();	
 //echo strip_tags ($row ['text']."<br>" );

?>
    
                 
                  <tr><td><?php echo $a = $a + 1; ?></td>
				  <td><a href="javascript:void(0)" target="_blank"><?php echo ($row['email']); ?></td>  
				  <td>
				  <form method="post" action="">
				  <input type="hidden" name="sender_id" value="<?=$row['user_id'];?>" />
				  <input type="hidden" name="receiver_id" value="<?=$user_id; ?>" />
				  <input type="submit" name="submit" class="btn btn-primary" value="Accept" />
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