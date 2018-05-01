<?php
require_once('view/top.php');
require_once('lib/connect.php');
require_once('config/config.php');
$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);
 ?>

<div class="banner">
  <p id="textAni"></p>
  <form id="search-container" action="index.php" method="GET" name="searching">
    <i class="fas fa-search"></i>
    <input id="searchbox" type="text" name="search" placeholder="Search..." >
    <button id="searchbtn" type="submit" name="submit">Search</button>
  </form>
</div>

<?php
  //retriving list

  if(count($_GET) == 0) {
    $sql = "SELECT * FROM list ORDER BY id DESC";
  } else {
    $q = $_GET['search'];
    $sql = "SELECT * FROM list WHERE title LIKE '%$q%' OR description LIKE '%$q%' ORDER BY id DESC";
  }
    
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
      echo "<img src=\"{$escaped['image']}\" class='uploadedImg'>
      <p>{$escaped['status']}<br>{$created}</p>
      </div></a>";
    };

  }
?>
<button id="plusButton"><a href="post.php"><img src="img/plus.png" alt="post"></a>
</button>

<script src="js/typewriter.js"></script>
<?php
require_once('view/footer.php');
 ?>
