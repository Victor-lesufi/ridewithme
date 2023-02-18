<?php
$conn = mysqli_connect('localhost','root','','chat_app_db');
if(isset($_GET['token'])){
    $token = mysqli_real_escape_string($conn,$_GET['token']);
    $query="SELECT * FROM password_reset WHERE token='$token'";
    $run = mysqli_query($conn,$query);
    if(mysqli_num_rows($run)>0){
       $row = mysqli_fetch_array($run);
       $token = $row['token'];
        $email = $row['email'];
    }else{
        header("location:index.php");
    }
}





if(isset($_POST['submit'])){
$password= mysqli_real_escape_string($conn,$_POST['password']);
$confirmpassword= mysqli_real_escape_string($conn,$_POST['confirmpassword']);
$options = ['cost' =>11];
$hashed = password_hash($password,PASSWORD_BCRYPT,$options);
if($password!=$confirmpassword){
    $msg ="password dont match";
}elseif(strlen($password) <6){
    $msg ="password must be 6 charcters long";
}else{
    $query = "UPDATE users set password='$hashed' WHERE email = '$email'";
    mysqli_query($conn,$query);
    $query = "DELETE FROM password_reset WHERE email = '$email'";
    mysqli_query($conn,$query);
    $msg ="password changed";
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
    <h1>Reset Password</h1>
<form action="" method="POST">

<label for="">email</label>
<input type="text" readonly name="" value="<?php echo $email; ?>">
<label for="">password</label>
<input type="password" name="password">
<label for="">confirm password</label>
<input type="password" name="confirmpassword">

<button name="submit">reset password</button>
<?php  if(isset($msg)){echo $msg;}?>
    </form>
</body>
</html>