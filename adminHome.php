<?php
 include "connect.php";

if (!loggedin() && $Level != 'Admin') {
	header ("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="css/adminHome.css">
</head>
<body>
	<?php
 include "navbar.php";
?>
<div class="up">
  		<div class="ourService" >
  			<h2>Our Service</h2>
  		</div>
  	<div class="region"><h1>Regions we covered</h1>
  	</div>
  	<div class="recentNews"><h1>Recent News</h1>
  		<div class="recentText">
  			Medical Humanities presents the international conversation around medicine and its engagement with the humanities and arts, social sciences, health policy, medical education, patient experience and the public at large. Led by Dr Brandy Schillace, the journal publishes scholarly and critical articles on a broad range of topics. These include history of medicine, cultures of medicine, disability studies, gender and the body, communities in crisis, bioethics, and public health.
  		</div>
  	</div>
</div>
<div class="middle">
	<div class="futureTarget">
		<h2>Future Projects</h2>
		
	</div>
	<div class="billing">
		<button type="button" class="billButton">Check billing</button>
	</div>
	<div class="employee">
		<div class="e_text">
			<h2>Our Employee</h2>
		</div>
	</div>
</div>
<br><br><br><br><br><br>
  	<?php
      include "footer.html";
?>
</body>
</html>