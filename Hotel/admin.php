<?php

	// if(isset($_POST['room']))
	// {
	// 	$room = $_POST['room'];
	// 	$roomtype = $_POST['roomtype'];
	// 	$adult = $_POST['adult'];
	// 	$child = $_POST['child'];
	// 	$arrival =$_POST['arrival'];
	// 	$departure=$_POST['departure'];
	// }

	$room = "2";
	$roomtype = "AC";
	$adult = "2";
	$child = "1";
	$arrival = "2019-11-11";
	$departure="2019-11-11";

	// Database Connection Credentials
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dB = "harshit";



	// Creating the connection	
	$conn = new mysqli($host, $user, $pass, $dB);
	
	// }

	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	}
	else 
	{
			// Prepared statement query and association with connection
		$query = 'insert into admin (room, roomtype, adult, children ,arrival,departure) values (?,?,?,?,?,?)';
		// echo $query;

		$stmt = $conn->prepare($query);

		// Prepared Statement parameters
		$stmt->bind_param("ssssss", $room, $roomtype, $adult, $child, $arrival, $departure);

		$stmt->execute();


		header('location: thankyou.html');
		
		$stmt->close();
		$conn->close();

	}	


?>

