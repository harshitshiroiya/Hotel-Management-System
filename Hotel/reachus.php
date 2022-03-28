<?php

	if(isset($_POST['name']))
	{
		$name = $_POST['name'];
		$contactno = $_POST['contactno'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
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
	$query = 'insert into contact (name,contactno,email,subject) values (?,?,?,?)';
	// echo $query;

	$stmt = $conn->prepare($query);

	// Prepared Statement parameters
	$stmt->bind_param("ssss", $name, $contactno, $email, $subject);

	$stmt->execute();


	header('location: ContactUs.html');
	
	$stmt->close();
	$conn->close();


?>


