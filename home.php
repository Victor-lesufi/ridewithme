<?php
session_start();

if (isset($_SESSION['username'])) {
	# database connection file
	include 'app/db.conn.php';

	include 'app/helpers/user.php';
	include 'app/helpers/conversations.php';
	include 'app/helpers/timeAgo.php';
	include 'app/helpers/last_chat.php';
	include 'connect.php';

	# Getting User data data
	$user = getUser($_SESSION['username'], $conn);

	# Getting User conversations
	$conversations = getConversation($user['user_id'], $conn);

?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Chat App - Home</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
		

		<link rel="icon" href="img/logo.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	 <?php
	//include 'nav.php'?>

	<style>

body{
    justify-content: center;
    align-items: center;
    min-height: 50vh;
    
	/* padding: 10px; */
 }
.first{
	background-color: lightgreen;
	width: 100%;
	padding: 50px;
	margin-top: 20px;
	border-radius: 5px;
}
.second{
	display: block;
	align-items: center;
	/* background-color: red; */
	/* margin: 3px; */
}
.second img{
	border-radius: 50%;
	object-fit: cover;
	width: 65px;

}
.second img a{
	margin-top: 5px;
	background-color: black;
}
.input input{
	background-color: white;
	padding: 4px;
	border-radius: 9px;

}
#chatList{
	background-color: white;
	overflow: auto;
	border-radius: 7px;
	flex-wrap: wrap;
	overflow-x: hidden;

}
#chatList li a {
	display: flex;
	justify-content: space-between;
	padding: 5px;
	align-items: center;
	border-bottom: 0.5px solid lightgray;
	

}
#chatList li a img{
	width: 45px;
	border-radius: 50%;
}
#chatList li a h3{
	font-size: large;
	margin: 2px;
}
.nav{
	background-color: blue;
	width: 100%;
	line-height: 18px;
	/* justify-content: flex-end; */
	display: flex;
	padding: 5px;
	position: fixed;
	top: 0px;
}
.nav .list a{
	
	justify-content: flex-end;
}
.list{
	justify-content: flex-end;
	background-color: red;
	display: flex;
}
.nav .logo a{
	background-color: white;
	justify-content: space-between;
}
*{
	overflow-x: hidden;
}
	</style>

	<body>
        <div class="nav">
			<div class="logo"><h3>RideWithMe</h3><a href="logout.php">logout</a>
			<a href="">home</a>
			<a href="">home</a></div>
			<div class="list">
			
		</div>
		</div>




			<div class="   first ">
				<div class="second">
					<img src="uploads/<?= $user['p_p'] ?>" class="w-25 rounded-circle">
					<h3 class="fs-xs m-2"><?= $user['name'] ?></h3>
					<a href="logout.php">Logout</a>
					<a href="search.php">seaech</a>
					<a href="info.php">request</a>
					<a href="ride.php">actions</a>
					<a href="game.php">game</a>
				</div>


			

			<div class=" input">
				<input type="text" placeholder="Search..." id="searchText" class="form-control">
				<button class="btn btn-primary" id="serachBtn">
					<i class="fa fa-search">S</i>
				</button>
			</div>
			</div>
			<div>
				<ul id="chatList" class=" list-group mvh-50 ">
					<?php if (!empty($conversations)) { ?>
						<?php

						foreach ($conversations as $conversation) { ?>
							<li class="list-group-item">
								<a href="chat.php?user=<?= $conversation['username'] ?>" >
	    				          
									<div class="head"> 
	    					           <div class="vic"> 
										<img src="uploads/<?= $conversation['p_p'] ?>" >
										<h3 class="fs-xs m-2">
											<?= $conversation['name'] ?><br>
											<small>
												<?php
												echo lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
												?>
												</h3>
												</div>
											</small>
									
									</div>
									<?php if (last_seen($conversation['last_seen']) == "Active") { ?>
										<div title="online">
											<div class="online"></div>
										</div>
									<?php } ?>
								</a>
							</li>
						<?php } ?>
					<?php } else { ?>
						<div class="alert alert-info 
    				            text-center">
							<i class="fa fa-comments d-block fs-big"></i>
							No messages yet, Start the conversation
						</div>
					<?php } ?>
				</ul>
			</div>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script>
			$(document).ready(function() {

				// Search
				$("#searchText").on("input", function() {
					var searchText = $(this).val();
					if (searchText == "") return;
					$.post('app/ajax/search.php', {
							key: searchText
						},
						function(data, status) {
							$("#chatList").html(data);
						});
				});

				// Search using the button
				$("#serachBtn").on("click", function() {
					var searchText = $("#searchText").val();
					if (searchText == "") return;
					$.post('app/ajax/search.php', {
							key: searchText
						},
						function(data, status) {
							$("#chatList").html(data);
						});
				});


				/** 
				auto update last seen 
				for logged in user
				**/
				let lastSeenUpdate = function() {
					$.get("app/ajax/update_last_seen.php");
				}
				lastSeenUpdate();
				/** 
				auto update last seen 
				every 10 sec
				**/
				setInterval(lastSeenUpdate, 10000);

			});
		</script>
		</div>
		
	</body>

	</html>
<?php
} else {
	header("Location: index.php");
	exit;
}
