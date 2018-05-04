<?php
require_once('lib/connect.php');
require_once('config/config.php');
$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

if(count($_POST) == 0) {
  header("Location: index.php");
} 

// extracting only strings to prevent injection attack
$filtered = array(
  'password' => mysqli_real_escape_string($conn, $_POST['password']),
  'email' => mysqli_real_escape_string($conn, $_POST['email']),
  'title' => mysqli_real_escape_string($conn, $_POST['title']),
  'description' => mysqli_real_escape_string($conn, $_POST['description'])
);

// Edit data into table

$sql = "
    UPDATE list SET
      status = '{$_POST['status']}',
      password = '{$filtered['password']}',
      email = '{$filtered['email']}',
      title = '{$filtered['title']}',
      description = '{$filtered['description']}',
      location = '{$_POST['location']}'
    WHERE id = {$_POST['id']}
      ";

mysqli_query($conn, $sql);

header("Location: index.php");


 ?>
