<?php
 include "connect.php";
?>



<div class="midbox">
		<div class="title">
			 If you have any query, feel free to ask your question below ..
		</div>
		<div class="f_form">
		<?php
			if (isset($_REQUEST['submit'])){
				$fName=$_REQUEST['f_name'];
				$fPhone=$_REQUEST['f_phone'];
				$FQue=$_REQUEST['f_que'];
				$fDate= date("Y-m-d");
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