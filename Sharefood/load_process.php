<?php

if(count($_POST) == 0) {
  header("Location: index.php");
  exit;
} else {

  require_once('lib/connect.php');
  require_once('config/config.php');
  $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

  $id = $_POST['id'];
  $q = mysqli_real_escape_string($conn, $_POST['q']); // prevent sql input by user
  $count = 3;

  echo "<script>var newid = {$_POST['id']};</script>"; //by default

  if($q == "") {
      $sql = "SELECT * FROM list WHERE id < {$id} ORDER BY id DESC LIMIT {$count}";
    } else {
      $sql = "SELECT * FROM list WHERE (title LIKE '%$q%' OR description LIKE '%$q%' OR location LIKE '%$q%') AND id < {$id} ORDER BY id DESC LIMIT {$count}";
    }

  $result = mysqli_query($conn, $sql);
    if ($result != null){

      while ($row = mysqli_fetch_array($result)) {

          //prevent cross scripting attack
          $escaped = array(
              'title' => htmlspecialchars($row['title']),
              'image' => htmlspecialchars($row['image']),
              'status' => htmlspecialchars($row['status']),
          );

          // substring y-m-d
          $created = substr($row['created'], 0, 10);

          // listing each post
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
          if($d2 <= 0){
            echo"Posted: &nbsp;Today</p></div></a>";
          } else if($d2 == 1){
            echo"Posted: &nbsp;Yesterday</p></div></a>";
          } else if($d2<=7){
            echo"Posted: &nbsp;$d2 days ago</p></div></a>";
          } else {
            echo "Posted: &nbsp; $created</p></div></a>";
          }
        
          echo "<script>newid = {$row['id']};</script>";
        }
      }
    } 
  
 ?>