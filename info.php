<?php
session_start();

include 'app/db.conn.php';

include 'app/helpers/user.php';
include 'app/helpers/conversations.php';
include 'app/helpers/timeAgo.php';
include 'app/helpers/last_chat.php';
include 'connect.php';
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}



?>
<!DOCTYPE html>
<html>

<head>
	<title>insert</title>
	<link rel="stylesheet" href="css/style.css">
	<style>
		body {
			/* display: flex; */
			align-items: center;
			justify-content: center;
			min-height: 100vh;
			font-family: arial, sans-serif;
		}

		input,
		textarea {
			display: block;
			width: 300px;
			font-size: 18px;
			margin: 7px 0px;
		}

		label {
			display: block;
			padding: 2px 0px;
		}

		.mol {
			display: block;
			background-color: lightcoral;
			border-radius: 10px;
			padding: 10px;
			text-align: center;

		}

		/* .back{
			margin: 15px;
			background-color: lightblue;
			align-items: center;
			border-radius: 10px;
		} */
		.ni {
			align-items: center;
			border-radius: 10px;
		}
	</style>
</head>

<body>
	<div class="back">
		<button class="ni"><a href="home.php">BACK</a></button>
	</div>

	<div class="mol">
		<h4>Do not include the R when you enter your price</h4>
	</div>

	<form method="post" action="send.php">
		<label>Name:</label>
		<input type="text" readonly name="name" placeholder="Enter name" required value="<?= $_SESSION['username']; ?>">

		<label>date:</label>
		<input type="date" name="lastname" placeholder="Enter Lastname" required>

		<label>Location:</label>
		<input type="text" name="location" placeholder="Enter location" required>

		<label>time:</label>
		<input type="time" name="time" placeholder="Enter time">

		<label>destination:</label>
		<input type="text" name="destination" placeholder="Enter destination" required>


		<label>Price:</label>
		<input type="text" name="price" placeholder="Enter price without the R" required>
		<input type="submit" name="btn">
	</form>
</body>

</html>