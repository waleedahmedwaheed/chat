<?php

include("connection.php");

session_start();

if(isset($_GET['email_id'])){
$_SESSION['email'] = $_GET['email_id'];
 $sqli = "SELECT * FROM users where email = '".$_GET['email_id']."'";
	$result =$conn->query($sqli);
	if ($result->num_rows > 0) {
	}
	else
	{
		$sqli = "INSERT  INTO users( email )
                VALUES ('".$_GET['email_id']."')";
	$result =$conn->query($sqli);
	}
}
error_reporting(0);
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

<link rel="stylesheet"  href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
		$(document).ready(function (e) {
		var user_id = <?php echo $_GET['user_id']; ?>;
		setInterval(function(){
				$.ajax({
		  url: "chat_load.php?user_id="+user_id,
		  cache: false,
		  success: function(html){
			$("#chatbox").html("");
			$("#chatbox").append(html);
		  }
			});
		}, 2000);
		});
	</script>
</head>
<body>

<?php include('menu.php'); ?> 
 
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-12">
 
 <table  name="chatbox" class="table table-bordered" style="overflow-y:scroll" id="chatbox" >
             
       </table>
 
<?php
$sqli = "SELECT * FROM users where email = '".$_SESSION['email']."'";
	$result =$conn->query($sqli);
    // output data of each row
    $rows = $result->fetch_assoc();
?>
 
<form action="chat.php" method="post" >
 <br> 
 <input type="text" name="msg" placeholder="Enter your message here" required style="border:solid #000;height:50px;width:500px;">
 <input type="hidden" name="to_user_id" value="<?=$_GET['user_id']?>">
 <input type="hidden" name="from_user_id" value="<?=$rows['user_id']?>">
    
    
 <input  name="submit"  type="submit" value="Send" style="background: green;
    color: white;
    border: azure;
    height: 40px;" >
   
   </form>
   </div>
   </div>
   </div>
 

</body>
</html>