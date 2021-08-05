
	<link href="css/navbarstyle.css" rel="stylesheet" type="text/css">

	<div class="main">
		<nav>
			<img src="img/logo.png" height="80" width="120" class="logo">
			<ul>
			 <li><a href="index.php">Home</a></li>
			 <li><a href="#">Service</a></li>
			 <li><a href="gallery.php">Gallery</a></li>
			 <li><a href="forum.php">Forum</a></li>
			 <li><a href="about.php">About Us</a></li>
		   </ul>
		</nav>
</div>

<?php
if(!empty($_SESSION['Username_ict'])){
?>

<div class="main">
	<h6 align="right"><button class="logout"><a href="logout.php">Log Out</a></button></h6>
</div>
<?php
}
?>

