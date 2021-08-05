<?php
include "connect.php";

if (!loggedin() && $Level != 'Company') {
	header ("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Company Home</title>
	<link rel="stylesheet" type="text/css" href="css/companyHome.css">
</head>
<body>
	<?php
	 	include "navbar.php";
	 ?>
             <h2 align="center">Welcome <?php echo $Name; ?> ! ! !</h2><br>
       <form class="search" method="post">
            <label id="icon" for="Email"><i class="fa fa-search"></i></label>
            <select name="id" required class="Search_O">
                  <option value="">Select patient</option>

           
            <?php
                  $que="SELECT * FROM user_account WHERE company='Square Group' ORDER BY Name ASC";
                  $re=$con->query($que);
                 
                  while ($exe=$re->fetch_object()) {
                        $pes_ID=$exe->UserID;
                        $pes_Name=$exe->Name;
                        echo '<option value="'.$pes_ID.'">'.$pes_Name.'</option>';
                  }

            ?>
             </select>
            <input type="submit" name="search" value="Search" id="submit">
             
       </form>

       <div class="p_search_result">
           
            <?php
                  if (isset($_REQUEST['search']) && !empty($_POST['id'])) {
                        $pid = $_REQUEST['id'];
                        //echo $search=$_REQUEST['id'];
                        $que="SELECT * FROM user_account WHERE UserID='$pid'";
                        $res=$con->query($que);
                       
                        while ($r=$res->fetch_object()) {
                             $pName=$r->Name;
                             $pEmail=$r->Email;
                             $pPhone=$r->Phone;
                             $pDob=$r->dob;
                             $pAddress=$r->Address;
                             echo  'Patient Name: '.$pName.'<hr> Patient Email : '.$pEmail.' <hr>Patient Phone : '. $pPhone.' <hr>Patient DOB: '. $pDob.'<hr> Patient Address:'.$pAddress;
                        }

                  } else {
                        echo 'Search patient ';
                  }
            ?>      
       </div>

            

	 <div class="personalInfo">
      	<div class="head">• Personal Info •</div>
      	<div class="p_table">
      		<table border="2" width="100%" cellpadding="9px" cellspacing="4px">
      			<tr><td width="30%">Name</td><td width="80%"><?php echo $Name; ?></td></tr>
      			<tr><td width="30%">Established</td><td width="80%"><?php echo "1987"; ?></td></tr>     			
      			<tr><td width="30%">Email</td><td width="80%"><?php echo $Email; ?></td></tr>
      			<tr><td width="30%">Phone</td><td width="80%"><?php echo $Ph; ?></td></tr>
      			<tr><td width="30%">Service</td><td width="80%"><?php echo "Dhaka, Barishal, Rajshahi"; ?></td></tr>
      			<tr><td width="30%">Contract-sign</td><td width="80%"><?php echo "13thjune,2019" ?></td></tr>
      			<tr><td width="30%" height="100px">Adress</td><td width="80%" height="100px"><?php echo $AD; ?></td></tr>
      		</table>
      	</div>
      </div>
      <
      <div class="patientInfo">
      	<div class="head">• Patient status•</div>
      	<div class="p_table">
      		<table border="2" width="100%" cellpadding="9px" cellspacing="4px">
      			<tr><td width="30%">Total patient</td><td width="80%">
               
               <?php
                  //$que5="SELECT * FROM user_account WHERE Name='$Name' AND level='Patient'";
                  $que5="SELECT * FROM `user_account` WHERE `Name` = '$Name' AND `level` = 'Patient'";
                  $re5=$con->query($que5);
                 
                  //$no=$re5->num_rows;
                  
                        $cou = $re5->fetch_row();
                             $n = $cou[0];
                             echo $n;
                       
                  
                      
                 

            ?>         55
                        </td></tr>
      			<tr><td width="30%">current patient</td><td width="80%">34</td></tr>     			
      			<tr><td width="30%">current doctor</td><td width="80%">4</td></tr>
      			<tr><td width="30%">Emergency seat</td><td width="80%">5</td></tr>
      			<tr><td width="30%">Emergency filled</td><td width="80%">3</td></tr>
      			<tr><td width="30%">Total pads</td><td width="80%">189</td></tr>
      		</table>
      	</div>
      </div>
      <div class="middle">
      		<div class="doctor">
      			<div class="head">• Doctor status •</div>
      		<table border="2" width="100%" cellpadding="9px" cellspacing="4px">
      			<tr><th width="30%">Name</th><th width="30%">Mobile</th><th width="40%">Slot</th></tr><tr>
      			<tr><td width="30%">DR. Rahim</td><td width="30%">0177</td><td width="40%">Sunday(8.00am- 12.00pm)</td></tr>  <tr>	
      			<tr><td width="30%">DR. Karim</td><td width="30%">0188</td><td width="40%">Monday(8.00am- 12.00pm)</td></tr><tr>
      			<tr><td width="30%">DR. Hasan</td><td width="30%">01236</td><td width="40%">Tuesday(8.00am- 12.00pm)</td></tr><tr>
      			<tr><td width="30%">DR. Maruf</td><td width="30%">01238</td><td width="40%">Thursdayday(8.00am- 12.00pm)</td></tr><tr>
      			<tr><td width="30%">DR. Asad</td><td width="30%">02365</td><td width="40%">Fridayday(8.00am- 12.00pm)</td></tr><tr>
      		</table>
      		</div>
      </div>
      <div class="bottom">
      		<img src="img/emergency.jpg" height="250px" width="250px">
           <div class="emgInfo">
           	<table border="1" width="100%" cellpadding="3px" cellspacing="1px">
      			<tr><th width="10%">Name</th><th width="20%">Mobile</th><th width="10%">Bed</th><th width="50%">Dr in charge</th></tr>
      			<tr><td width="10%">Resma</td><td width="20%">0172</td><td width="10%">1</td><td width="50%">DR. Karim</td></tr>  	
      			<tr><td width="10%">Jui</td><td width="20%">0185</td><td width="10%">4</td><td width="50%">DR. Hasan</td></tr>
      			<tr><td width="10%">Oni</td><td width="20%">0129</td><td width="10%">7</td><td width="50%">DR. Maruf</td></tr>
      			
      		</table>
           </div>
           <button class="btn">Payment</button>
      </div>
      <?php

             if(isset($_REQUEST['prescribe'])){
                
                $pEmail = $_REQUEST['pEmail'];
                $pName = $_REQUEST['pName'];
                $dName = $_REQUEST['dName'];
                $date = $_REQUEST['dob'];              
                $contact = $_REQUEST['contact'];
                $description   = nl2br(htmlentities($_REQUEST['description'], ENT_QUOTES));


                
                $q="SELECT * FROM user_account WHERE Name='$pName'";
                $rea=$con->query($q);
                if(!empty($rea)){
                  while ($ex=$rea->fetch_object()) {
                        $c_id=$ex->UserID;
                  }
                } else {
                  echo mysqli_error($con);
                }
               
                        $qu = "INSERT INTO prescription(patient, doctor, pres_date, contact, description,pEmail) VALUES ('$pName', '$dName', '$date', '$contact', '$description','$pEmail')";

                        $re = $con->query($qu);

                        if($re){

                              echo "<script>alert('Your prescription was posted successfully to the patient !!'); window.location = 'companyHome.php';</script>";

                             

                               $qu2 = "UPDATE `patientproblem` SET `P_status`='Complete' WHERE `pID` = '$c_id'";

                               $re2 = $con->query($qu2);


                               if ($re2) {
                                     echo "<script>alert('Your prescription was posted successfully to the patient !!'); window.location = 'companyHome.php';</script>";
                               } else {
                                    echo mysqli_error($con);
                               }

                              
                              
                        } else {
                              echo mysqli_error($con);
                        }              
                    }
      ?>
      <div class="prescription">
      	   <h1 align="center"> Prescription by Doctor</h1>
		      	   <form class="presc" method="post">
						  <label for="fname">**Patient email**</label>
						  <input type="text" id="fname" name="pEmail" required><br>
                                      <label for="fname">**Patient Name**</label>
                                      <input type="text" id="fname" name="pName" required><br>
						  <label for="lname">**Doctor's name **</label>
						  <input type="text" id="lname" name="dName" required><br><br>
						  <label for="date">**Date**</label>
						  <input type="date" id="date" name="dob" required><br><br>						
						  <label for="mb">**Contact no **</label>
						  <input type="text" id="mb" name="contact" required>
						    <label for="pres">**Prescription **</label>
						  <input type="text" id="pres" name="description" required><br>
						  <input type="submit" name="prescribe" value="Prescribe">
						  
					</form>
      </div>
       <div class="pquestion">
             <h3>Patient's Problems</h3>
             <?php
                  $query="SELECT a.*, b.* FROM user_account a
                  LEFT JOIN patientproblem b ON b.pID=a.UserID
                   WHERE b.P_status='processing' AND a.company='$Name'";

                  $execute=$con->query($query);

                  if (!empty($execute)) {
                        while ($view=$execute->fetch_object()) {
                              $pa_Name=$view->Name;
                              $prob_Date=$view->visit_date;
                              $problem=$view->problem;
                              echo $pa_Name.'<br>'. $prob_Date.'<br>'. $problem.'<hr>';
                        }
                  }
             ?>
       </div>
       <div class="appoint">
            <h3>Doctor's appointment</h3>
             <?php
             if (isset($_REQUEST['appoint'])) {
                $appointment = nl2br(htmlentities($_REQUEST['appointment'], ENT_QUOTES));
                $doctor=$_REQUEST['doctor_name'];
                $patientID=$_REQUEST['patient_id'];
                $ins="INSERT INTO `d_appointment`( `com_ID`, `P_ID`, `appointment`, `d_Name`) VALUES ('$UserID', '$patientID', '$appointment', '$doctor')";
                $result=$con->query($ins);
                if ($result) {
                      echo "<script>alert('Your appointment was posted successfully !!'); window.location = 'companyHome.php';</script>";
                }
          }

      ?>
               <form>
                     <select name="patient_id" required class="Search_O" style="width: 90%;">
                  <option value="">Select patient</option>

           
            <?php
                  $que="SELECT * FROM user_account WHERE company='Square Group' ORDER BY Name ASC";
                  $re=$con->query($que);
                 
                  while ($exe=$re->fetch_object()) {
                        $pes_ID=$exe->UserID;
                        $pes_Name=$exe->Name;
                        echo '<option value="'.$pes_ID.'">'.$pes_Name.'</option>';
                  }

            ?>
             </select><br><br>
             <b>Appointment</b><textarea name="appointment" class="Search_O" style="width: 90%;" placeholder="appoint"> </textarea><br>
             <input type="text" name="doctor_name" class="Search_O" style="margin-left: 20px;" placeholder="Doctor's name">
             <input type="submit" name="appoint" value="appoint" style="margin-left:220px;margin-top: 13px; background-color: blue; color: white; padding: 6px; font-size: 18px;">
               </form>
             
       </div>
       <br><br>
      <?php
      	include "footer.html";
      	?>
</body>
</html>