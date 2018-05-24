<?php
require_once('view/top.php');
require_once('lib/connect.php');
require_once('config/config.php');
$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);
 ?>

<div class="banner" id="banner">
  <p id="textAni1">SHARE FOOD</p>
  <p id="textAni2">REDUCE WASTE</p>
  <div id="subheader">
    <span>A Food sharing platform for BCIT students</span>
  </div>
  <div id="searchcontainer">
  <form action="index.php" method="GET" name="searching">
    <input id="searchbox" type="text" name="search" placeholder="Search for free food..." >
    <button id="searchbtn" type="submit">&nbsp;</button>
  </form>
  </div>
</div>

<div id="list_container">

<?php

  //retriving list
  $count = 3;

  if(count($_GET) == 0) {
  $sql = "SELECT * FROM list ORDER BY id DESC LIMIT {$count}";
    $sql_last = "SELECT id FROM list LIMIT 1";
  } else {
    $q = mysqli_real_escape_string($conn, $_GET['search']); // prevent sql input by user
    $sql = "SELECT * FROM list WHERE title LIKE '%$q%' OR description LIKE '%$q%' OR location LIKE '%$q%' ORDER BY id DESC LIMIT {$count}";
    $sql_last = "SELECT id FROM list WHERE title LIKE '%$q%' OR description LIKE '%$q%' OR location LIKE '%$q%' LIMIT 1";
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
   
    if ($escaped['status']=="Available"){
      $icon = "<i class='fa fa-check-circle' style='font-size:24px;color:green'></i>";
    }else{
      $icon = "<i class='fa fa-times-circle' style='font-size:24px;color:grey'></i>";
    }

    date_default_timezone_set("America/Los_Angeles");
    $d1=strtotime($created);
    $d2=ceil((time()-$d1)/60/60/24)-1;
    echo "<a href=\"detail.php?id={$row['id']}\"><div class='list_item'><p class='list_title'>{$escaped['title']}</p>";
    echo "<img src=\"{$escaped['image']}\" class='uploadedImg'>
    <p>Status:&nbsp; {$escaped['status']} $icon<br>";
    
    if($d2 == 0){
      echo"Posted: &nbsp;Today</p></div></a>";
    } else if($d2 == 1){
      echo"Posted: &nbsp;$d2 day ago</p></div></a>";
    } else if($d2<7){
      echo"Posted: &nbsp;$d2 days ago</p></div></a>";
    } else {
      echo "Posted: &nbsp; $created</p></div></a>";
    }

    $lastid = $row['id'];
    }
  }

?>

<!-- game section -->
<div id="gamesection"  class="list_item">
  <p><b>There's no result found. </b><br>Do you want to play a game instead?</p>
  <br><div id="breakout">
    <a href="game_breakout.php"><p class="list_title">Break out</p>
    <img src="img/breakout.png" class="gameimg"></a><br></div>
    <div id="appleGame">
    <a href="game_apple.php"><p class="list_title">Eat Apple Fast</p>
    <img src="img/appleScreenshot.png" class="gameimg"></a></div>
  <br>
</div>

</div> <!-- end of the div list_container -->

<br>
<button id="loadButton">More results &nbsp; <img src="img/arrow-down.png"></button>
<button onclick="topFunction()" id="gotop" title="Go to top">Top</button>

<script src="js/gotopbutton.js"></script>
<script>

  $("#plusButton").click(function(event){
    location.href = "post.php";
  });

  /* loading more feature */
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
        url: "load_process.php",
        type: "POST",
        data: {id: lastId, q: search},
        success: function(data){
          $("#list_container").append(data);
          lastId = newid;
          if(lastId == result){
            $("#loadButton").css("display", "none");
          }
        }

      });
    });

    /** game section */
    (function(){
      if(lastId !== 0){
            $("#gamesection").css("display", "none");
          }
    })();
</script>

<script src="js/typewriter.js?v=1"></script>
<?php
require_once('view/footer.php');
 ?>
