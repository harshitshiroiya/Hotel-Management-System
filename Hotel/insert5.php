<?php
	if(isset($_POST['firstname']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$contactno = $_POST['contactno'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
	}
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dB = "harshit";

	$conn = new mysqli($host,$user,$pass,$dB);
	if($conn->connect_error)
		{
			die("Connection Failed".$conn->connect_error);
		}
	else
		{
			$insert = "insert into signup values(?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($insert);
			$stmt->bind_param("sssssss",$firstname,$lastname,$gender,$contactno,$email,$username,$password);
			$stmt->execute();
			header("location: Booking.html")
			$stmt->close();
			$conn->close();

		}
?>