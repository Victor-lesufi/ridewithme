<?php
session_start();
require 'app/connnection.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>
    <div class="container">
        <h4>ride edit
            <a href="index.php">Back</a>
        </h4>
    </div>
    <div class="card-body">
        <?php

        if (isset($_GET['id'])) {
            $student_id = mysqli_real_escape_string($con,$_GET['id']);
            $query = "SELECT *  FROM test  WHERE id='$student_id'";
            $query_run= mysqli_query($con,$query);

            if(mysqli_num_rows($query_run) > 0){

                $student = mysqli_fetch_array($query_run);
              ?>
              <form action="code.php" method="POST">
              <input type="hidden" name="student_id" value= "<?=$student['id'];?>">
            <div class="mb-3">
                <label> name</label>
                <input type="text" readonly name="name" value= "<?=$student['name']?>"class="form-control">
            </div>
            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="lastname" value= "<?=$student['lastname']?>"class="form-control">
                
            </div>
            <div class="mb-3">
                <label>location</label>
                <input type="text" name="location" value= "<?=$student['location']?>"class="form-control">
                
            </div>
            <div class="mb-3">
                <label>time</label>
                <input type="time" name="time" value= "<?=$student['time']?>"class="form-control">
                
            </div>
                <label>destination</label>
                <input type="text" name="destination" value= "<?=$student['destination']?>"class="form-control">
                
            </div>
                <label>price</label>
                <input type="text" name="price" value= "<?=$student['price']?>"class="form-control">
                
            </div>
            <button type="submit" name="update_student">update ride</button>
        </form>
              <?php

            }else{
                echo "<h4>no  such records</h4>";
            }
        }

        ?>
       
    </div>
</body>

</html>