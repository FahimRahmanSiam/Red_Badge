<?php
include "connect.php";

if (!loggedin() && $Level != 'Patient') {
	header ("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient Home</title>
	<link rel="stylesheet" type="text/css" href="css/patientHome.css">
</head>
<body>
	 <?php
	 	include "navbar.php";
	 ?>
      <h2 align="center">Welcome <?php echo $Name; ?>!!!</h2><br><br>
     <div class="personalInfo">
      	<div class="head">• Personal Info •</div>
      	<div class="p_table">

      		<table border="2" width="100%" cellpadding="9px" cellspacing="4px">
      			<tr><td width="20%">Name</td><td width="80%"><?php echo $Name; ?></td></tr>
      			<tr><td width="20%">Age</td><td width="80%"><?php echo 23; ?></td></tr>     			
      			<tr><td width="20%">Email</td><td width="80%"><?php echo $Email; ?></td></tr>
      			<tr><td width="20%">Phone</td><td width="80%"><?php echo $Ph; ?></td></tr>
      			<tr><td width="20%">Hospital</td><td width="80%"><?php echo $Com; ?></td></tr>
      			<tr><td width="20%" height="100px">Adress</td><td width="80%" height="100px"><?php echo $AD?></td></tr>
      		</table>
      	</div>
      </div>

      <div class="MedicInfo">
      	<div class="head">Doctor's Appointment</div>
      	<div class="appointment">

             <?php

                  $sql="SELECT * FROM d_appointment WHERE P_ID='$UserID'";
                  $rslt=$con->query($sql);
                  if (!empty($rslt)) {
                        while ($rw=$rslt->fetch_object()) {
                              $DRN=$rw->d_Name;
                              $APP=$rw->appointment;

                              echo 'Appointed BY: '.$DRN.'<br>Time: '.$APP.'<hr>';
                        }
                  }else{
                        echo 'No appointments yet';
                  }

             ?>

            </div>
      	<div class="head">Prescription</div>
      	<div class="prescription">
             <?php
                 $query="SELECT * FROM prescription WHERE patient='$Name'"  ;   
                 $res=$con->query($query);
                    if (!empty($res)) {
                        while ($view=$res->fetch_object()) {
                              $dName=$view->doctor;
                              $pres_Date=$view->pres_date;
                              $contact=$view->contact;
                              $des=$view->description;

                              echo 'Prescription By: '.$dName.'<br>Prescription date: '. $pres_Date.'<br>doctor contact no: '. $contact.'<br>prescription details: '. $des.'<hr>';
                        }
                  }
              ?>
            </div>
      </div>
      <?php
             if (isset($_REQUEST['post'])) {
                $comment = nl2br(htmlentities($_REQUEST['comment'], ENT_QUOTES));
                $date=date('Y-m-d');
                $ins="INSERT INTO `patientproblem`(`pID`, `visit_date`, `problem`, `P_status`) VALUES ('$UserID', '$date', '$comment', 'processing')";
                $result=$con->query($ins);
                if ($result) {
                      echo "<script>alert('Your problem was posted successfully !!'); window.location = 'patientHome.php';</script>";
                }
          }

      ?>
      <div class="comment">
      	   <div class="commentHead"> In case of emergency, post here</div><hr><br>
      	   <form action="" method="post">
      	   	 <textarea name="comment" id="commentbox" placeholder="write your problem ......."></textarea> <br><br>
      	   	 <input type="submit" name="post" value="POST" class="button" id="submit">
      	   </form>
      </div>
      <?php
	 	include "footer.html";
	 ?>
</body>
</html>