<?php

if(count($_GET) == 0) {
  header("Location: index.php");
} else {
  require_once('view/top.php');
  require_once('lib/connect.php');
  require_once('config/config.php');
  $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']); // prevent sql input by user
  $sql = "SELECT * FROM list WHERE id = {$filtered_id}";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);

  echo "<div class='detail_item'><p class='list_title'>{$row['title']}</p>";
  echo "<img src=\"{$row['image']}\" class='detailImg'><br>";

}

?>

<form name="requestPost" action="email_process.php?id=<?=$_GET['id']?>" method="post">
  <p><input id="emailRequest" type="email" name="email" placeholder="Your email address"></p>
  <p><textarea name="message" rows="5" cols="20" placeholder="Message"></textarea></p>
  <p><input type="submit" name="send" value="Send" class="button" onclick="saveData('emailRequest')"></p>
</form>
</div>

<script>loadStoredDetails('emailRequest');</script>