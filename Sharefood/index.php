<?php
require_once('view/top.php');
require_once('lib/connect.php');
require_once('config/config.php');
$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);
 ?>

 <a href="post.php"><div class="button">POST</div></a>

<?php

  $sql = "SELECT * FROM list ORDER BY id DESC";
  $result = mysqli_query($conn, $sql);
  if ($result != null){

    while($row = mysqli_fetch_array($result)){

      //prevent cross scripting attack
      $escaped = array(
        'title' => htmlspecialchars($row['title']),
        'image' => htmlspecialchars($row['image']),
        'status' => htmlspecialchars($row['status']),
      );

      // substring y-m-d
      $created = substr($row['created'], 0, 10);

      // listing each poast
      echo "<a href=\"detail.php?id={$row['id']}\"><div class='list_item'><p class='list_title'>{$escaped['title']}</p>";
      echo "<img src=\"{$escaped['image']}\">
      <p>{$escaped['status']}<br>{$created}</p>
      </div></a><br>";
    };

  }

require_once('view/footer.php');

 ?>
