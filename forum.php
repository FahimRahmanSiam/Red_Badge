<?php
 include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<link rel="stylesheet" type="text/css" href="css/forum.css">
</head>
<body>
	<?php
		include "navbar.php";
	?>
	<div class="midbox">
		<div class="title">
			 ** If you have any query, feel free to ask your question below .. **
		</div>
		<div class="f_form">
		<?php
			if (isset($_REQUEST['submit'])){
				$fName=$_REQUEST['f_name'];
				$fPhone=$_REQUEST['f_phone'];
				$FQue   = nl2br(htmlentities($_REQUEST['f_que'], ENT_QUOTES));
				$fDate= date('Y-m-d');
				$fStatus= 'Published';


				$qu = "INSERT INTO f_faq(f_name, f_phone, f_que, f_date, f_status) VALUES ('$fName', '$fPhone', '$FQue', '$fDate', '$fStatus')";

				$re = $con->query($qu);

				if($re){
					echo "<script>alert('Your question was posted successfully !!'); window.location = 'forum.php';</script>";
				} else {
					echo mysqli_error($con);
				}

				
			}
		?>
			
		</div>
		<div class="f_form">
			<form method="post" action="">

				<input type="text" name="f_name" placeholder="Your name" required><br><br>
				<input type="phone" name="f_phone" placeholder="Your phone" required><br><br>
				<textarea name="f_que" placeholder="your qusetion!!" required></textarea><br><br>
				<input type="submit" value="Submit your question" name="submit">
			</form>
		</div>

	</div>
	<br>
	<div class="midbox2">
		<div class="title">
			 • • • • • • • • • • • • • Question & Answer • • • • • • • • • • • • •
		</div>
		<div class="f_form">
		<?php
			$que1="SELECT * FROM f_faq ORDER BY f_id DESC";

			$result1= $con->query($que1);

			if($result1->num_rows){

				?>
					
				<?php

				while($row = $result1->fetch_object()){

					$f_id=$row->f_id;
					$f_name=$row->f_name;
					$f_que=$row->f_que;
					$f_date=$row->f_date;
					$f_status=$row->f_status;
						?>
						<div><h4>Question from: <small><?php echo $f_name.' &nbsp;&nbsp;&nbsp;'.$f_date; ?></small></h4></div>

						<div><b>Question:</b> <?php echo $f_que; ?></div><br><br>
						

									<?php
										$que2="SELECT * FROM f_faq_ans WHERE fa_f_id = '$f_id' ORDER BY fa_id ASC";

										$result2= $con->query($que2);

										if(!empty($result2)){
											while($row = $result2->fetch_object()){
												$fa_name = $row->fa_name;
												$fa_date = $row->fa_date;
												$fa_ans = $row->fa_ans;

												?>

												<div style="padding-left: 80px;"><h4>Answer From: <small><?php echo $fa_name.' &nbsp;&nbsp;&nbsp;'.$fa_date; ?></small></h4></div>

												<div style="padding-left: 80px;"><strong>Answer:</strong> <?php echo $fa_ans; ?></div><br><br>

									

								<?php
											}
										} else {
											
											echo '<h5>No answer yet !!</h5>';
											
										}
									?>
								<div><a href="forum_ans.php?id=<?php echo $f_id; ?>">Answer this question</a><hr><br><br></div><br><br>


							
			<?php
				}
						

			} else {
				echo '<h5>No question yet !!</h5><br><br>';
			}

		?>
			
		</div>
		

	</div>
	<?php
		include "footer.html";
	?>
</body>
</html>