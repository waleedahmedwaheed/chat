<ul>
<?php
include 'connection.php';
session_start();
	 
	 
	 $sqli = "SELECT * FROM users where email = '".$_SESSION['email']."'";
	$result =$conn->query($sqli);
    // output data of each row
    $rows = $result->fetch_assoc();
	
	//////////

	 

$sqli = "SELECT * FROM user_message where (to_user_id = '".$_GET['user_id']."' and from_user_id = '".$rows['user_id']."') or
(from_user_id = '".$_GET['user_id']."' and  to_user_id = '".$rows['user_id']."') order by um_id";
$result =$conn->query($sqli);



if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      

	
 //echo strip_tags ($row ['text']."<br>" );

?>
   
<li title="<?php 
    $sqlt = "SELECT * FROM users where user_id = '".$row['from_user_id']."'";
	$resultt =$conn->query($sqlt);
    // output data of each row
    $rowst = $resultt->fetch_assoc();
	echo $rowst['email'];
   ?>" class="<?php if($row['from_user_id']==$rows['user_id']){ ?>sent <?php } else { ?>replies<?php } ?>">
	<img src="user-icon.png" alt="" />
	<p><?php echo $row['message']; ?></p>
</li>	
              
 <?php

                }
                }
                

   
       
 else {
    echo "<li>Previous Chat History not Found</li>";
}



 
?>

</ul>