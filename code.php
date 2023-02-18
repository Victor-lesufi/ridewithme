<?php
session_start();
require 'app/connnection.php';

if(isset($_POST['delete_student'])){
    $student_id = mysqli_real_escape_string($con,$_POST['delete_student']);
    $query = "DELETE FROM test WHERE id='$student_id'";

    $query_run = mysqli_query($con,$query);

    if($query_run){
        echo "student deleted";
        header("Location:ride.php");
        exit(0);
    }else{
        echo "student not deleted";
        header("Location:index.php");
        exit(0);
    }
}

if(isset($_POST['update_student'])){
    $student_id =  mysqli_real_escape_string($con,$_POST['student_id']);
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $lastname= mysqli_real_escape_string($con,$_POST['lastname']);
    $location= mysqli_real_escape_string($con,$_POST['location']);
    $time= mysqli_real_escape_string($con,$_POST['time']);
    $destination= mysqli_real_escape_string($con,$_POST['destination']);
    $price= mysqli_real_escape_string($con,$_POST['price']);

    $query = "UPDATE test SET name='$name', lastname='$lastname', location='$location', time= '$time' , destination= '$destination', price= '$price' WHERE id='$student_id'";
  $query_run = mysqli_query($con,$query);

  if($query_run){
    echo "student update";
    header("Location:ride.php");
    exit(0);
  }else{
    echo "student not  updated";
    header("Location:index.php");
    exit(0);
  }
}

if(isset($_POST['save_student'])){
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $lastname= mysqli_real_escape_string($con,$_POST['lastname']);
    $location= mysqli_real_escape_string($con,$_POST['location']);
    $time= mysqli_real_escape_string($con,$_POST['time']);
    $destination= mysqli_real_escape_string($con,$_POST['destination']);
    $price= mysqli_real_escape_string($con,$_POST['price']);

    $query="INSERT INTO test (name,lastname,location,time,destination,price) VALUES ('$name','$lastname','$location','$time','$destination','$price')";
    $query_run=mysqli_query($con,$query);
    if($query_run){
        $_SESSION["message"]= "student created";
        header("Location:student-create.php");
        exit(0);
    }else{
        $_SESSION["message"]= "student not  created";
        header("Location:student-create.php");
        exit(0);
    }
}


?>