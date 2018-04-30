<?php
require_once('view/top.php');
require_once('lib/connect.php');
require_once('config/config.php');
$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

$filtered_id = mysqli_real_escape_string($conn, $_GET['id']); // prevent sql input by user
$sql = "SELECT * FROM list WHERE id = {$filtered_id}";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

//prevent cross scripting attack
$escaped = array(
  'title' => htmlspecialchars($row['title']),
  'image' => htmlspecialchars($row['image']),
  'status' => htmlspecialchars($row['status']),
  'description' => htmlspecialchars($row['description'])
);

$created = substr($row['created'], 0, 10);

echo "<div class='detail_item'><p class='list_title'>{$escaped['title']}</p>";
echo "<img src=\"{$escaped['image']}\" class='detailImg'>
<p>{$escaped['status']}<br><p>{$created}</p>
<p><b>Description</b><br>{$escaped['description']}</p>
<br>";
?>
<form action="request.php?id=<?=$_GET['id']?>" method="post">
  <p><input type="submit" name="request" value="Request" class="button"></p>
</form>
</div>

<?php
require_once('view/footer.php');
?>
