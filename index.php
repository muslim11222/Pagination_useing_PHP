<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Pagination Using PHP</title>
</head>
<body>
     
     <?php 

          $hostname = 'localhost';
          $username = 'root';
          $password = '';
          $db_name = 'own_database';

          $conn = mysqli_connect($hostname, $username, $password, $db_name);
          if(!$conn) {
               echo 'database connection is not established';
          }

          $get_page = $_GET['page'];
          if($get_page== '' || $get_page=='1') {
               $target_page = 1;
          } else {
               $target_page = ($get_page*3)-3;
          }

          $sql = "SELECT * FROM own_user limit $target_page,6";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)) {
               echo $row['firstname']."<br>";
               echo $row['lastname']."<br>";
               echo $row['email']."<br>";
               echo "<br>";
          }

          $sql1 = "SELECT * FROM own_user";
          $result1 = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($result1);

          $i = $count/3;
          $page = ceil($i);
          for($target= 1; $target <= $page; $target++) {
               ?>
                    <a href="index.php?page=<?php echo $target; ?>"><?php echo $target; ?></a>

               <?php
          }

     ?>


</body>
</html>