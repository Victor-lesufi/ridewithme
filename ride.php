<?php
require 'app/connnection.php';
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" 
	      href="css/style.css">
</head>
<body>
<div class="back">
		<button><a href="home.php">BACK</a></button>
	</div>
	
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            ride details 
                            <a href="info.php">add rides</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table>
                            <thead>
                                
                            </thead>
                            <tbody>
                                <?php  
                                  $query="SELECT * FROM test WHERE name='$_SESSION[username]'";
                                  $query_run=mysqli_query($con,$query);

                                  if(mysqli_num_rows($query_run) > 0){

                                    foreach($query_run as $student){
                                        //echo $student['name'];
                                        
                                        ?>
                                        <tr>
                                   
                                    <th> name</th>
                                    <th>date</th>
                                    <th>location</th>
                                    <th>time</th>
                                    <th>destination</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                                          <tr>
                                          
                                    <td><?=$student['name']?></td>
                                    <td><?=$student['lastname']?></td>
                                    <td><?=$student['location']?></td>
                                    <td><?=$student['time']?></td>
                                    <td><?=$student['destination']?></td>
                                    <td><?=$student['price']?></td>
                                    <td>
                                        <a href="student-edit.php?id=<?=$student['id'];?>">edit</a>
                                    
                                        <form action="code.php" method="POST">

                                     <button type="submit" name="delete_student" value="<?=$student['id'];?>">delete</button>

                                        </form>
                                    </td>
                                    
                                </tr>
                                        <?php
                                    }

                                  }else{
                                    echo"<h2>no records found</h2>";
                                  }
                                  ?>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>