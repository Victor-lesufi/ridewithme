
<?php

include 'app/connect.php';


// if (!isset($_SESSION['username'])) {
//     header("Location: index.php");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEARCH</title>

    <style>

         table,tr,th,td{
            border: 1px solid crimson;

        }
    
    </style>
  
</head>
<body>

<h3> search your rides here </h3>
    <form method="post">
        <input type="text" name="search" placeholder="search">
    <button name="submit">search</button>
    </form>
    <div class="container">
        <table>
        <?php
if(isset($_POST['submit'])){

    $search = $_POST['search'];
    $sql = "SELECT * FROM test WHERE  name LIKE '%$search%' OR lastname LIKE '%$search%' OR location LIKE '%$search%' 
    OR time LIKE '%$search%' OR destination LIKE '%$search%'OR price LIKE '%$search%'";
   
    $result = mysqli_query($con,$sql);
    if($result){
       if(mysqli_num_rows($result) > 0){

     echo '<thead>
                 <tr>
                
                 <th>name</th>
                <th>date</th>
                <th>From</th>
                <th>time</th>
                <th>To</th>
                <th>price</th>
                
                 </tr>
              </thead>';
      while( $row = mysqli_fetch_assoc($result)){

       echo '<tbody>
       <tr>

       
       <td><a href ="chat.php?user='.$row['name'].'">'.$row['name'].'</a></td>
       <td>'.$row['lastname'].'</td>
       <td>'.$row['location'].'</td>
       <td>'.$row['time'].'</td>
       <td>'.$row['destination'].'</td>
       <td>R'.$row['price'].'</td>
       
       </tr>
       </tbody>';
      }

       }else{
        echo"<h2>Your search query is not found</h2>";
       }
    }
}





         ?>
            
        </table>
    </div>
</body>
</html>