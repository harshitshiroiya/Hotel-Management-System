<?php

	if(isset($_POST['firstname']))
	{
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$cnct = $_POST['contactno'];
		$email = $_POST['email'];
		$uname = $_POST['username'];
		$password = $_POST['password'];
	}

	// Database Connection Credentials
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dB = "harshit";



	// Creating the connection	
	$conn = new mysqli($host, $user, $pass, $dB);
	
	// }

	// Prepared statement query and association with connection
	$query = 'insert into signup (firstname,lastname,gender,contactno,email,username,password) values (?,?,?,?,?,?,?)';
	// echo $query;

	$stmt = $conn->prepare($query);

	// Prepared Statement parameters
	$stmt->bind_param("sssssss", $fname, $lname, $gender, $cnct, $email, $uname, $password);

	$stmt->execute();


	header('location: Booking.html');
	
	$stmt->close();
	$conn->close();


?>