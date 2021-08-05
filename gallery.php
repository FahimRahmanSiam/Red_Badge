<!DOCTYPE html>
<?php
 include "connect.php";
?>
<html>
<head>
	<title>Gallery</title>
	<link rel="stylesheet" type="text/css" href="css/gallery.css">
	<link href="https://fonts.googleapis.com/css?family=Mountains+of+Christmas&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
	<script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
</head>
<body>
     <?php
     	include "navbar.php";
     ?>

	<h1>• • Our Journey throughout the year • •</h1>
	<div class="gallery">
		<a href="img/gal/1.jpg" data-lightbox="mygallery"><img src="img/gal/1-small.jpg"></a>
		<a href="img/gal/2.jpg" data-lightbox="mygallery"><img src="img/gal/2-small.jpg"></a>
		<a href="img/gal/3.jpg" data-lightbox="mygallery"><img src="img/gal/3-small.jpg"></a>
		<a href="img/gal/4.jpg" data-lightbox="mygallery"><img src="img/gal/4-small.jpg"></a>
		<a href="img/gal/5.png" data-lightbox="mygallery"><img src="img/gal/5-small.jpg"></a>
		<a href="img/gal/6.jpg" data-lightbox="mygallery"><img src="img/gal/6-small.jpg"></a>
		<a href="img/gal/7.jpg" data-lightbox="mygallery"><img src="img/gal/7-small.jpg"></a>
		<a href="img/gal/8.jpg" data-lightbox="mygallery"><img src="img/gal/8-small.jpg"></a>
	</div>
	<?php
     	include "footer.html";
     ?>
</body>
</html>