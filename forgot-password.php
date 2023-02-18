<?php
$conn = mysqli_connect('localhost','root','','chat_app_db');

if(isset($_POST['submit'])){
$email= mysqli_real_escape_string($conn,$_POST['email']);
$query = "SELECT * FROM users WHERE email='$email' ";
$run = mysqli_query($conn,$query);
if(mysqli_num_rows($run)>0){
    $row = mysqli_fetch_array($run);
    $db_email=$row['email'];
   
    // $db_id=$row['id'];

    $token =uniqid(md5(time()));
    $query = "INSERT INTO password_reset(id,email,token) VALUES(NULL,'$email','$token')";

if(mysqli_query($conn,$query)){
    $to=$db_email;
    $subject="password reset link";
    $message="click <a href='https://ridewithme.com/reset.php?token=$token'>here</a> to reset your password";
    // mail($to,$subject,$message);

    // $msg="password reset link sent to email";
    $msg="  click <a href='reset.php?token=$token'>here</a> to reset your password";
}

}else{
    $msg="user not found";
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset</title>
</head>
<body>
    <h1>forgot password</h1>

    <form action="" method="POST">

<label for="">email</label>
<input type="email" name="email" required>

<button name="submit">submit</button>
<?php  if(isset($msg)){echo $msg;}?>
    </form>
</body>
</html>