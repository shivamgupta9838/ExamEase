<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Question</title>

		<style>
			body {
				font-family: Arial, sans-serif;
				margin: 0;
				padding: 0;
				background-color: #dff0ff;
			}
			#timer {
					position: fixed;
					top: 10px;
					right: 10px;
					background-color: rgb(162, 214, 248);
					padding: 20px;
					border-radius: 5px;
					font-size: 16px;
					border:5px solid red;
			}
			table {
				width: 100%;
				border-collapse: collapse;
			}
			td {
				padding: 10px;
				text-align:left;
			}
			h3 {
				margin: 0;
			}
			button {
				display: block;
				width: 25%;
				padding: 10px;
				background-color: #3b5998;
				color: #fff;
				border: none;
				border-radius: 5px;
				cursor: pointer;
				margin:0 auto;
			}
			#a1 {
				background-color:rgb(162, 214, 248);
			}
		</style>

		<script>
			function updateTimerDisplay(remainingTime) {
					var timerElement = document.getElementById("timer");
					timerElement.textContent = "Time Remaining: " + formatTime(remainingTime);
			}

			function formatTime(seconds) {
					var hours = Math.floor(seconds / 3600);
					var minutes = Math.floor((seconds % 3600) / 60);
					var remainingSeconds = seconds % 60;
					return hours.toString().padStart(2, '0') + ":" + minutes.toString().padStart(2, '0') + ":" + remainingSeconds.toString().padStart(2, '0');
			}

			function submitFormAfterTimeout() {
					setTimeout(function() {
							document.getElementById("questionForm").submit();
					}, 30 * 60 * 1000);
			}

			function updateTimer() {
				var startTime = new Date().getTime();
				updateTimerDisplay(30 * 60);
				submitFormAfterTimeout();

				setInterval(function() {
					var currentTime = new Date().getTime();
					var elapsedTime = Math.floor((currentTime - startTime) / 1000);
					var remainingTime = 30 * 60 - elapsedTime;
					updateTimerDisplay(remainingTime);
				}, 1000);
			}
			window.onload = updateTimer;

		</script>
		<style>
		.container {
			max-width: 80%;
			margin: 10% auto;
			text-align: center;
		}
		</style>
	</head>
	<body>

	<div class="container">
		<form id="questionForm" action="submit_response.php" method="post">
			<?php
			session_start();
						
			if ( !isset($_SESSION['application_no']) ) {
					header("Location: login.html");
					exit(); 
			}
			else {
					echo "<b><h3>Application_no : ". $_SESSION['application_no']. "</h3></b>";
					echo"<br> <b> Question</b>";
			}
			$conn = mysqli_connect("localhost", "root", "Shivam77", "oesproject");
			if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
			}	
			$sql = "SELECT q_no, ques, op1, op2, op3, op4 FROM questions";
			$result = mysqli_query($conn, $sql);

			while ($row = mysqli_fetch_assoc($result)) {
				echo "<table  style='width: 100%;'>";
				echo "<tr>";
				echo "<td colspan='2'><h3>" . $row['ques'] . "</h3></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td id='a1'>A. <input type='radio' name='response[" . $row['q_no'] . "]' value='1'>" . $row['op1'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>B. <input type='radio' name='response[" . $row['q_no'] . "]' value='2'>" . $row['op2'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td id='a1'>C. <input type='radio' name='response[" . $row['q_no'] . "]' value='3'>" . $row['op3'] . "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>D. <input type='radio' name='response[" . $row['q_no'] . "]' value='4'>" . $row['op4'] . "</td>";
				echo "</tr>";
				echo "</table><br>";
			}

			mysqli_close($conn);
			?>
			<button type="submit" >Submit</button>
		</form>
	</div>
	<div id="timer"></div>

	</body>
</html>
