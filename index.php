<?php
session_start();
error_reporting(0);
include('includes/config.php');


// user registration
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$sid = $_POST['sid'];
	$slot = $_POST['slot'];
	$query = mysqli_query($con, "insert into users(name,email,sid,slot) values('$name','$email','$sid','$slot')");
	if($query){
		echo "<script>alert('You have successfully registered!');</script>";
	}
	else{
		echo "<script>alert('Not registered yet. Something went wrong');</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>COMP207</title>
</head>
<body>
	<h1 style="color: red;">COMP207 - Register here for a practical slot</h1>
	<b style="font-size: 18px;">Register only if you know what you are doing.</b>
	<ul>
		<li>Please enter <b>all</b> information and select your desired day. Please enter a correct 'SID' number!</li>
		<li>Please check the number of available seats before submitting.</li>
		<li>Register only to one slot.</li>
		<li>Any problems? Write a message to <a href="#" style="color: red; text-decoration: none;">weberb@csc.liv.ac.uk</a></li>
	</ul>
	<br>
	<form method="post">
		<input type="text" name="name" class="input-box" placeholder="Enter Your Name" required>
		<input type="email" name="email" class="input-box" placeholder="Enter Your Email" required>
		<input type="text" name="sid" class="input-box" placeholder="Enter SID" required>
		<br>
		<br>
		<br>
		<label for="slots">Select the practical slot:</label>
		<select name="slot" required>
			<option value="">Select Slot</option>
			<?php
			$query1=mysqli_query($con,"select * from slots");
			while($row1=mysqli_fetch_array($query1)){
			?>
			<option value="<?php echo $row1['time'];?>"><?php echo $row1['time'];?>: <?php echo $row1['count'];?> seat remaining</option>
			<?php } ?>
		</select>
		<br><br><br>
		<input type="submit" name="submit" id="submit">
	</form>
</body>
</html>