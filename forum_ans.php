<?php
include "connect.php";
?>

<link rel="stylesheet" type="text/css" href="css/forum.css">


<div class="midbox">
		<div class="title">
			Feel free to answer anything you know
		</div>
		<div class="f_form2">
		<?php
			if (isset($_REQUEST['submit'])){
				$id=$_REQUEST['id'];
				$fName=$_REQUEST['f_name'];
				$fPhone=$_REQUEST['f_phone'];
				$FQue   = nl2br(htmlentities($_REQUEST['f_que'], ENT_QUOTES));
				$fDate= date('Y-m-d');
				$fStatus= 'Published';


				$qu = "INSERT INTO `f_faq_ans`
				(`fa_f_id`, `fa_name`, `fa_phone`, `fa_ans`, `fa_date`, `fa_status`) VALUES 
				('$id', '$fName', '$fPhone', '$FQue', '$fDate', '$fStatus')";

				$re = $con->query($qu);

				if($re){
					echo "<script>alert('Your ans. was posted successfully !!'); window.location = 'forum.php';</script>";
				} else {
					echo mysqli_error($con);
				}

				
			}
		?>
			
		</div>

		<div class="f_form">

			<?php
				if ($_REQUEST['id']) {
					$id=$_REQUEST['id'];

					$QUE = "SELECT * FROM f_faq WHERE f_id = '$id'";
					$result=$con->query($QUE);
					while ($rows=$result->fetch_object()) {
						$que=$rows->f_que;
						echo 'Que.= '.$que;
					}
				}
			?>
			<form method="post" action="">

				<input type="text" name="f_name" placeholder="Your name" required><br><br>
				<input type="phone" name="f_phone" placeholder="Your phone" required><br><br>
				<textarea name="f_que" placeholder="your answer...!!" required></textarea><br><br>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="submit" value="Submit your answer" name="submit">
			</form>
		</div>

	</div>