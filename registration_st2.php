<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
<style>
  .container {
    max-width: 350px;
    margin: 10% auto;
    text-align: center;
    border: 3px solid rgb(255, 0, 128);
    border-radius: 15px;
    transition : 0.3s ease;
    font-family: Arial, sans-serif;
    color:black;
    background-color:rgba(247, 247, 247, 0.85);
  }

div:hover
{
box-shadow: 5px 10px #ffe7a4;
}
body {
  background-image: url("image/img2.jpg");
}

a {
  color: #3b5998;
  font-family: Arial, sans-serif;
  font-size:1.25vw;
  margin-top: 10px;
  margin-bottom: 10px;
}

span {
  color: #3b5998;
  font-family: Arial, sans-serif;
  font-size:1.25vw;
}
</style>
</head>
<body>
<div class="container">
<h3>Application Number</h3>
<?php
    session_start();
    if ( !isset($_SESSION['mobile_no']) ) {
        header("Location: registration.html");
        exit(); 
    }
    $conn = mysqli_connect("localhost", "root", "Shivam77", "oesproject");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT application_no FROM users ORDER BY application_no DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<span>Registered successfully <br> Your Application No is: </span>" .  "<span>".$row["application_no"]."</span>";
    } else {
        echo "Error";
    }

    mysqli_close($conn);
    session_destroy();
?>
<br>
<a href="index.html"><b>Home</b></a>
<b>&emsp;</b>
<a href="login.html"><b>Login</b></a>
</div>
</body>
</html>