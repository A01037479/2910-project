<?php

if(empty($_POST['title'])) {
  header("Location: index.php");
  exit;
} else {

  require_once('lib/connect.php');
  require_once('config/config.php');
  $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

  // extracting only strings to prevent injection attack

  $filtered = array(
    'password' => mysqli_real_escape_string($conn, $_POST['password']),
    'email' => mysqli_real_escape_string($conn, $_POST['email']),
    'title' => mysqli_real_escape_string($conn, $_POST['title']),
    'description' => mysqli_real_escape_string($conn, $_POST['description']),
  );


  $sql = "
      INSERT INTO list
      (password, email, title, status, image, description, created, location)
      VALUES(
        '{$filtered['password']}',
        '{$filtered['email']}',
        '{$filtered['title']}',
        'Available',
        '{$_POST['image']}',
        '{$filtered['description']}',
        NOW(),
        '{$_POST['location']}'
        )
        ";


      $result = mysqli_query($conn, $sql);
      if($result === false){
        echo "Sorry! there's a problem in the server<br>";
        echo "<a href='post.php'>Go back</a><br>";

      } else {
        header("Location: index.php");

      }

  } 

 ?>
