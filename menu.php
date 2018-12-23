<?php
if(!isset($_SESSION['email'])){
	echo "<script>window.location='login.php'</script>";	
}
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="javascript:void(0)">Chat</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="check_request.php">Check Request</a></li>
      <li><a href="friends.php">Friends</a></li>
    </ul>
    <a class="btn btn-danger navbar-btn pull-right" href="logout.php">Logout</a>
  </div>
</nav>