<?php
session_start();
$conn = mysqli_connect("localhost", "root", "Shivam77", "oesproject");

if (!$conn) {
    die("could not connect: " . mysqli_connect_error());
}

$name = $_POST['name'];
$dob = $_POST['dob'];
$mobile_no = $_POST['mobile_no'];
$email = $_POST['email'];
$password = $_POST['password'];

$check_sql = "SELECT * FROM users WHERE mobile_no = '$mobile_no' or email = '$email'";
$result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($result) > 0) {
    echo "User already registered with the same details.";
} else 
{
    $sql = "INSERT INTO users (name, dob, mobile_no, email, password) VALUES ('$name', '$dob', '$mobile_no', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['mobile_no'] = $mobile_no;
        header("Location: registration_st2.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
