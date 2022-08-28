<?php

$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$password = filter_input(INPUT_POST, 'password');
$confirmpassword = filter_input(INPUT_POST, 'confirmpassword');

if (!empty($username) && !empty($email)){
    if (!empty($password) && ($password == $confirmpassword)){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "login";
        // Create connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);


        if (mysqli_connect_error()){
            die('Connect Error ('. mysqli_connect_errno() .') '
            . mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO register (username, email, address, password)
            values ('$username','$email','$address','$password')";
            if ($conn->query($sql)){
                echo "Registration Sucessfull";
            }
            else{
                echo "Error: ". $sql ."
                ". $conn->error;
            }
            $conn->close();
        }
    }
    else{
    echo "Password is empty OR Password is not same as confirm password";
    die();
    }
}
else{
    echo "Username/Email should not be empty";
    die();
}

?>