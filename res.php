<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Result</title>
  <link rel="stylesheet" href="style.css">
</head>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
  background-image: url("image/img3.png");
  background-size: cover;
}
a {
  color: #3b5998;
  font-family: Arial, sans-serif;
  font-size:1.5vw;
  margin-top: 10px;
  margin-bottom: 10px;
  display: block;
}
b {
  color: #3b5998;
  font-family: Arial, sans-serif;
  font-size:1.5vw;
}
.container {
  max-width: 350px;
  margin: 20% auto;
  text-align: center;
  background-color: rgb(162, 214, 248, 0.85);
  border:5px solid rgb(255, 0, 128);
  border-radius: 15px;
}

h2 {
  color: #3b5998;
  font-size: 24px;
  margin-bottom: 20px;
}


div:hover
{
box-shadow: 5px 10px #ffe7a4;
}

</style>
<body>
  <div class="container">
<h2>Result</h2>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $application_no = $_POST['application_no'];
    $password = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "Shivam77", "oesproject");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE application_no = '$application_no' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['application_no'];

        $sql_responses = "SELECT * FROM responses WHERE application_no = '$user_id'";
        $result_responses = mysqli_query($conn, $sql_responses);

        $total_marks = 0;

        while ($response = mysqli_fetch_assoc($result_responses)) {
            $q_no = $response['q_no'];
            $response_given = $response['response'];

            $sql_question = "SELECT ans FROM questions WHERE q_no = '$q_no'";
            $result_question = mysqli_query($conn, $sql_question);
            $question = mysqli_fetch_assoc($result_question);
            $correct_answer = $question['ans'];

            if ($response_given == $correct_answer) {
                $total_marks++;
            }
        }

        echo "<b>Total Marks: $total_marks out of 50</b>";
echo "<br> <a href='index.html'>Click here for HomePage</a>";


    } else {
        echo "Invalid credentials. <br>";
        echo "<a href='result.html'>Click here for Refresh</a>";
    }

    mysqli_close($conn);

} else {
    header("Location: result.html");
    exit();
}
?>

      </div>
</body>
</html>
