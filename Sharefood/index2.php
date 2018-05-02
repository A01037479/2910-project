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
<div class="item-content">
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
      $lastPost = $row["id"];
    }
  }
?>
</div>
<br>
<div id="loaded" lastID="<?php echo htmlspecialchars($lastPost); ?>">
<img src="img/loadsmall.gif" class="load-more" style="width:30px;display: none;">
</div>
<!--<button id="loadButton">load more</button>-->
<button id="plusButton"><a href="post.php"><img src="img/plus.png" alt="post"></a></button>

<script src="js/loadmore.js"></script>

<!--
<script>
  var lastId = <?=$row['id']?>;
  console.log(lastId);
  $("#loadButton").click(function(event){
    console.log("clicked");
    $.ajax({
      url: "load_process.php",
      type: "POST",
      data: {id: lastId},
      success: function(data){
        $("#loaded").append(data);
        lastId = newid;
        console.log(lastId);
      }
    });
  });
</script>
-->
<script src="js/typewriter.js"></script>
<?php
require_once('view/footer.php');
 ?>
