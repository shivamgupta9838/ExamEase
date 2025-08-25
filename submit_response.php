<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['application_no'])) {
        header("Location: login.html");
        exit();
    }
    
    $conn = mysqli_connect("localhost", "root", "Shivam77", "oesproject");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $application_no = $_SESSION['application_no'];

    $responses = $_POST['response'];
    $q_nos = $_POST['q_no'];

    foreach ($responses as $q_no => $response) {
        $q_no = mysqli_real_escape_string($conn, $q_no);
        $response = mysqli_real_escape_string($conn, $response);

        $sql = "INSERT INTO responses (application_no, q_no, response) VALUES ('$application_no', '$q_no', '$response')";
        
        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    $sql_update = "UPDATE users SET exam_pending = 'No' WHERE application_no = '$application_no'";
    if (!mysqli_query($conn, $sql_update)) {
        echo "Exam submission unsuccessful : " . mysqli_error($conn);
    }

    mysqli_close($conn);
    session_destroy();
    header("Location: exam_submitted.html");
    exit();
} else {
    session_destroy();
    header("Location: login.html");
    exit();
}
?>
