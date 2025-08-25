<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $application_no = $_POST['application_no'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "Shivam77", "oesproject");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE application_no = '$application_no'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if ($password == $user['password']) {
            if ($user['exam_pending'] == 'No') {
                echo "<h2>Exam already submitted.</h2>";
                session_destroy();
                exit();
            }

            $_SESSION['application_no'] = $user['application_no'];
            header("Location: instruction.html");
            exit();
        } else {
            echo "Invalid password.";
	 echo "<a href='login.html' style='none'>Click here for Relogin</a>";
        }
    } else {
        echo "User not found.";
    }

    mysqli_close($conn);
} else {
    header("Location: login.html");
    exit();
}
?>
