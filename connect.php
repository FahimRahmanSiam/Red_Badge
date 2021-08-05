<?php
session_start();
$con = mysqli_connect('localhost','fahim','112233') or die('can not connect to server');
if($con)
{
	mysqli_select_db($con, 'redbatch') or die('can not select database');
}





function loggedin() {
	
	if (isset($_SESSION['Username_ict']) || isset($_COOKIE['Username_ict']) ) {
		
		
		
		$loggedin = TRUE;
		return $loggedin;
	
	}
} 

@$UserName_S= $_SESSION['Username_ict'];
@$UserName_C= $_COOKIE['Username_ict'];
$query = "SELECT * FROM `user_account` WHERE `Email` = '$UserName_S' OR `Email` = '$UserName_C' ";
if ($sql_query = mysqli_query ($con, $query)) {
	while ($rows = mysqli_fetch_assoc ($sql_query)) {
		$UserID = $rows['UserID'];
		$Name = $rows['Name'];
		$Email = $rows['Email'];
		$UserName = $rows['Email'];
		$Password = $rows['Password'];
		$Level = $rows['level'];
		$Ph=$rows['Phone'];
		$Com=$rows['company'];
		$AD=$rows['Address'];
	}
}
date_default_timezone_set("Asia/Dhaka");
?>

