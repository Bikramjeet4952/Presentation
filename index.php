<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $number = $_POST['number'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $message = $_POST['message'];
    }

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "presentation";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(!$conn){
        die("Connection Failed! ". mysqli_connect_error());
    }

    $sql = "INSERT INTO customers(cus_name, cus_gender, cus_number, cus_dob, cus_email, cus_address, cus_message) VALUES('$name', '$gender', '$number', '$dob', '$email', '$address',  '$message')";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Entries added!";
        mysqli_close($conn);
        
        header("refresh:3; url=index.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

?>