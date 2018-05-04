<?php

if(count($_GET) == 0) {
  header("Location: index.php");
  exit;
} else {

  require_once('lib/connect.php');
  require_once('config/config.php');
  $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); // prevent sql input by user
  $sql = "SELECT * FROM list WHERE id = {$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  $source = $_POST['job'];

  if ($_POST['input'] !== $row['password']){
    echo "Wrong password";
  } else {
    switch($source) {
      case "delete_button":
        $sql_del = "DELETE FROM list WHERE id = {$filtered_id}";
        mysqli_query($conn, $sql_del);
        echo "deleted";
        break;
      case "edit_button":
        echo "edit";
        break;
    }
  }

}


?>
