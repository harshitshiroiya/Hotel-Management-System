<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "harshit";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection Failed: ".$conn->connect_error);
    }

    //if(isset($_POST['username']))
    //{
        $uname_form = $_POST['username'];
        $pass_form = $_POST['password'];
    //}
    
    $query = "SELECT username,password FROM signup where username=? and password=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $uname_form, $pass_form);

    $stmt->execute();

    $result = $stmt->get_result();
    // $row = $result->fetch_array(MYSQLI_ASSOC);
    // if(isset($row)){
    //     echo "user found";
    // }
    // else{
    //     echo "user not found";
    // }
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $username =  $row["username"];
        $pass = $row["password"];
    }
    
    // echo "unameform is $uname_form uname is $uname passform is $pass_form pass is $pass";
    if($uname_form==$username && $pass_form==$pass)
    {
        
        session_start();
        $_SESSION['user'] = $username;
        if(isset($remember))
        {
            setcookie('username', $uname_form, time()+60*60*30);
            setcookie('password', $pass_form, time()+60*60*30);
        }
        header("location: login.html");
    }
    else{
        session_start();
        $_SESSION['error'] = "set";
        header("location: ");
    }
    
    $stmt->close();

    $conn->close();

?>