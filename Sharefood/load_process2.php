<?php
require_once('lib/connect.php');
require_once('config/config.php');
$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);
$id = $_POST['id'];
$sql = "SELECT * FROM list WHERE id < {$id} ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

  if ($result != null){
    $i = 0;
    while ($i < 3) {
      if($row = mysqli_fetch_array($result)) {
        //prevent cross scripting attack
        $escaped = array(
          'title' => htmlspecialchars($row['title']),
          'image' => htmlspecialchars($row['image']),
          'status' => htmlspecialchars($row['status']),
        );
        // substring y-m-d
        $created = substr($row['created'], 0, 10);
        // listing each post
        echo "<a href=\"detail.php?id={$row['id']}\"><div class='list_item'><p class='list_title'>{$escaped['title']}</p>";
        echo "<img src=\"{$escaped['image']}\" class='uploadedImg'>
        <p>{$escaped['status']}<br>{$created}</p>
        </div></a>";
      } 
      $i++;
      echo "<script>var newid = {$row['id']};</script>";
    }  
  }
 ?>