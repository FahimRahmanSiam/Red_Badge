<?php
 include "connect.php";
?>
<html>
<head>
  <title></title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/signupstyle.css">
</style>
</head>
<body>
  <?php include "navbar.php"?>
        
        
    <div class="contain">
        <div class="r_left">
            <div class="testbox">
              <h1>Registration<br> <small>as company</small> </h1>
                
                  <hr>
    <div class="msg">
        <?php
            
            if(isset($_REQUEST['company_r'])){
                $Email = $_REQUEST['Email'];
                $Name = $_REQUEST['Name'];
                $Password = $_REQUEST['Password'];
                $Phone = $_REQUEST['Phone'];
                $Address   = nl2br(htmlentities($_REQUEST['Address'], ENT_QUOTES));
                $level = 'Company';
                
                $que = "SELECT * FROM `user_account` WHERE `Email`= '$Email'";
                
                $result = $con->query($que);                
                    
                
                if(!$result->num_rows){
                    $que = "INSERT INTO `user_account`(`Name`, `Email`, `Password`, `Phone`, `level`, `Address`) VALUES ('$Name', '$Email', '$Password', '$Phone', '$level', '$Address')";
                
                    $result = $con->query($que);

                    if($result){
                        $msg = '<h2 align="center" style="color: #07FD1C;">Account created successfully !</h2>';
                    }
                } else {
                    $msg = '<h2 align="center" style="color: #FDCACB;">This e-mail address already exist!</h2>';
                }
            } else {
                $msg = '';
            }
    
        ?>
        
        <?php
            echo $msg;
        ?>
        
    </div>
                  <hr>
                
              <form method="post" action="">
              <label id="icon" for="Email"><i class="icon-envelope "></i></label>
              <input type="email" name="Email" id="Email" placeholder="Email" required/>
                  
              <label id="icon" for="Name"><i class="icon-user"></i></label>
              <input type="text" name="Name" id="Name" placeholder="Name" required/>
                  
              <label id="icon" for="Password"><i class="icon-shield"></i></label>
              <input type="password" name="Password" id="name" placeholder="Password" required/>
                  
              <label id="icon" for="Phone"><i class="fa fa-phone" style="font-size:18px"></i></label>
              <input type="phone" name="Phone" id="Phone" placeholder="phone no" required/>
              <p style="font-size: 14px; font-weight: bold; color: aqua;">Please enter address</p><br>
              <textarea  name="Address" id="name" placeholder="address" required></textarea><br><br>
         <br>
                  <input type="submit" name="company_r" class="button" value="Register">
   <p style="color: white;">By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>
   <a href="login.php" style="color: white;">Already have an account?</a>
   <br><br>
  </form>
</div>
        </div>
    
        <div class="r_right">
            <div class="testbox">
  <h1>Registration<br> <small>as patient</small> </h1>
                
      <hr><div class="msg">
        <?php
            
            if(isset($_REQUEST['patient_r'])){
                $Email = $_REQUEST['Email'];
                $Name = $_REQUEST['Name'];
                $Password = $_REQUEST['Password'];
                $Phone = $_REQUEST['Phone'];
                $Address   = nl2br(htmlentities($_REQUEST['Address'], ENT_QUOTES));
                $level = 'Patient';
                $dob = $_REQUEST['dob'];
                $company = $_REQUEST['company'];
                
                $que = "SELECT * FROM `user_account` WHERE `Email`= '$Email'";
                
                $result = $con->query($que);                
                    
                
                if(!$result->num_rows){
                    $que = "INSERT INTO `user_account`(`Name`, `Email`, `Password`, `Phone`, `dob`, `level`, `Address`,`company`) VALUES ('$Name', '$Email', '$Password', '$Phone', '$dob', '$level', '$Address','$company')";
                
                    $result = $con->query($que);

                    if($result){
                        $msg = '<h2 align="center" style="color: #07FD1C;">Account created successfully !</h2>';
                    }
                } else {
                    $msg = '<h2 align="center" style="color: #FDCACB;">This e-mail address already exist!</h2>';
                }
            } else {
                $msg = '';
            }
    
        ?>
        
        <?php
            echo $msg;
        ?>
        
    </div>
      <hr>
                
  <form action="" method="post">
  <label id="icon" for="Email"><i class="icon-envelope "></i></label>
  <input type="email" name="Email" id="Email" placeholder="Email" required/><br>
      
  <label id="icon" for="Name"><i class="icon-user"></i></label>
  <input type="text" name="Name" id="Name" placeholder="Name" required/><br>
      
  <label id="icon" for="Password"><i class="icon-shield"></i></label>
  <input type="password" name="Password" id="Password" placeholder="Password" required/>
      
  <label id="icon" for="Phone"><i class="fa fa-phone" style="font-size:18px"></i></label>
   <input type="phone" name="Phone" id="Phone" placeholder="phone no" required/>
  <p style="font-size: 14px; font-weight: bold; color: aqua;">Please enter address</p><br>
  <textarea name="Address" id="Address" placeholder="address" class="ta_box" required></textarea><br><br>
  <label id="icon" for="company"><i class="fa fa-map-marker" style="font-size:17px"></i></label>
  <select name="company" required="">
    <option value="">Select a company</option>

    <?php
    $que = "SELECT * FROM user_account WHERE Level = 'Company'";
    $result = $con->query($que);

    while ($row = $result->fetch_object()) {
      $com_n = $row->Name;
      echo '<option value="'.$com_n.'">'.$com_n.'</option>';
    }

    ?>

  </select>
 <br><br>
  <div class="birthday" style="font-size: 14px; font-weight: bold; color: aqua;">
   Select date of birth<br>
   <input type="date" name="dob">
</div>
        

<br>
      <input type="submit" name="patient_r" class="button" value="Register">
   <p style="color: white;">By clicking Register, you agree on our <a href="#">terms and condition</a>.</p>
   <a href="login.php" style="color: white;">Already have an account?</a>
   <br><br>
  </form>
</div>
            </div>
        </div>
<?php include "footer.html" ?>
</body>
</html>