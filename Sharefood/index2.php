<?php
require_once('view/top.php');
require_once('lib/connect.php');
require_once('config/config.php');
$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);
 ?>

<div class="banner">
  <p id="textAni"></p>
  <form id="search-container" action="index2.php" method="GET" name="searching">
    <i class="fas fa-search"></i>
    <input id="searchbox" type="text" name="search" placeholder="Search..." >
    <button id="searchbtn" type="submit">Search</button>
  </form>
</div>

<?php
  //retriving list
  $count = 3;

  if(count($_GET) == 0) {
  $sql = "SELECT * FROM list ORDER BY id DESC LIMIT {$count}";
    $sql_last = "SELECT id FROM list LIMIT 1";
  } else {
    $q = $_GET['search'];
  $sql = "SELECT * FROM list WHERE title LIKE '%$q%' OR description LIKE '%$q%' ORDER BY id DESC LIMIT {$count}";
    $sql_last = "SELECT id FROM list WHERE title LIKE '%$q%' OR description LIKE '%$q%' LIMIT 1";
  }
  
  // returns the last item's id
  $result_last = mysqli_query($conn, $sql_last);
  $last_array = mysqli_fetch_array($result_last);
  $last = is_null($last_array[0]) ? 0 : $last_array[0];

  $result = mysqli_query($conn, $sql);
  
  $lastid = 0;
  if ($result != null){

    while($row = mysqli_fetch_array($result)) {
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
    $lastid = $row['id'];
    }


  }

?>
<br>
<div id="loaded"></div>
<button id="loadButton">More results &nbsp; <img src="img/arrow-down.png"></button>

<button id="plusButton"><a href="post.php"><img src="img/plus.png" alt="post"></a>
</button>

<script>
  var lastId = <?=$lastid?>;
  var result = <?=$last?>;

  (function(){
      if(lastId == result){
            $("#loadButton").css("display", "none");
          }
    })();

  var search = "<?php
      if(isset($_GET['search'])){
        echo $_GET['search'];
      } else {
      }
      ?>";

    $("#loadButton").click(function(event){
      $.ajax({
        url: "load_process2.php",
        type: "POST",
        data: {id: lastId, q: search},
        success: function(data){
          $("#loaded").append(data);
          lastId = newid;
          if(lastId == result){
            $("#loadButton").css("display", "none");
          }
        }
        
      });
    });

    

</script>

<script src="js/typewriter.js"></script>
<?php
require_once('view/footer.php');
 ?>
