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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


</head>

<style>
    .bk {
        background-color: lightseagreen;
        padding: 10px;
        line-height: 1px;
    }
</style>

<body>
    <div class="bk">
        <a href="ride.php" class="fs-1 fw-500 link-dark">&#8592;</a>
        <div class="container">

            <h4 class="text-center">
                Edit Your Rides

            </h4>
        </div>
    </div>

    <div class="card-body">
        <?php

        if (isset($_GET['id'])) {
            $ride_id = mysqli_real_escape_string($con, $_GET['id']);
            $query = "SELECT *  FROM test  WHERE id='$ride_id'";
            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {

                $ride = mysqli_fetch_array($query_run);
        ?>
                <form action="code.php" method="POST">
                    <input type="hidden" name="ride_id" value="<?= $ride['id']; ?>">
                    <div class="mb-3">
                        <label> Name:</label>
                        <input type="text" readonly name="name" value="<?= $ride['name'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Date:</label>
                        <input type="date" name="date" value="<?= $ride['date'] ?>" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Location:</label>
                        <input type="text" name="location" value="<?= $ride['location'] ?>" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Time:</label>
                        <input type="time" name="time" value="<?= $ride['time'] ?>" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>Destination:</label>
                        <input type="text" name="destination" value="<?= $ride['destination'] ?>" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label>type:</label>
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option value="<?= $ride['type'] ?>"><?= $ride['type'] ?></option>
                            <option value="transport">transport</option>
                            <option value="lift">lift</option>

                        </select>

                    </div>
                    <div class="mb-3">
                        <label>Price:</label>
                        <input type="number" name="price" value="<?= $ride['price'] ?>" class="form-control">

                    </div>
                    <div class="mb-3">

                        <button class="btn btn-primary" type="submit" name="update_ride">Update ride</button>
                    </div>
                </form>
        <?php

            } else {
                echo "<h4>no  such records</h4>";
            }
        }

        ?>

    </div>
</body>

</html>
