<?php

if(count($_GET) == 0) {
  header("Location: index.php");
  exit;
} else {

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
    'description' => htmlspecialchars($row['description']),
    'location'=> htmlspecialchars($row['location'])
  );

}

?>

<div class='detail_item'>
  <!-- toggle div to check password -->
  <div class="align-right">
    <input type="checkbox" id="toggle-check"/>
    <label for="toggle-check">
      <span class="fakelink">edit</span>
    </label>
    <div class="checkContainer">
     <span id="editText">Enter your password&nbsp;</span>
     <form action="edit.php" id="editForm" method="POST" onkeypress="return event.keyCode != 13;">
       <input type="hidden" name="id" value="<?=$_GET['id']?>">
       <input type="password" name="password" id="password" class="textinput"><br>
     </form>
       <button id="delete_button" class="confirmbtn">delete</button>
       <button id="edit_button" class="confirmbtn">edit</button>
       <br>
       <p id="check_result"></p>
    </div>
  </div>

<?php

$created = substr($row['created'], 0, 10);

echo "<p class='list_title center'>{$escaped['title']}</p>";
echo "<div id='detail_left'><img src=\"{$escaped['image']}\" class='detailImg detailImg_fixSize'></div>
<div class='requestInfo'><span id = 'detailStatus' class = 'details'><b>Status:</b> {$escaped['status']}<br><br></span><span id = 'detailDate' class = 'details'><b>Posted: </b>{$created}<br><br></span>
<span id = 'detailLocation' class = 'details'><b>Pick-up Location: </b>{$escaped['location']}<br><br></span>
<span id = 'detailDesc' class = 'details'><b>Description</b><br>{$escaped['description']}</span><br><br>
<br>";
?>
<form id="detailBtn" action="request.php?id=<?=$filtered_id?>" method="post">
  <span><button type="submit" id="requestBtn" name="request" class="button"><i class="fa fa-send-o" style="font-size:15px"></i> Request</button></span>
</form></div>
</div>


<?php
//disable button if claimed
if ($escaped['status'] != "Available") {
  echo "<script>document.getElementById('requestBtn').disabled = true;</script>";
  echo "<script>document.getElementById('requestBtn').style.cursor = 'default';</script>";
  echo "<script>document.getElementById('requestBtn').style.backgroundColor = 'grey';</script>";
}
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

  $(".checkContainer button").click(function(event){
    var source = event.target.id;
    var inputVal = $("#password").val();
    $.ajax({
      url: "check_process.php?id=<?=$_GET['id']?>",
      type: "POST",
      data: {input: inputVal, job: source},
      success: function(data){
        if (data == "deleted") {
          // alert ("Successfully deleted");
          swal({
            title: "Deleted!",
            text: "Successfully deleted",
            icon: "success",
            button: "ok",
          });
          window.location.replace("index.php");
        } else if(data == "edit"){
          $("#editForm").submit();
        }
          else {
        $("#check_result").html(data);
        }
      }
    });
  });

</script>

<?php
require_once('view/footer.php');
?>
