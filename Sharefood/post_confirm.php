<?php

if(count($_POST) == 0) {
  header("Location: index.php");
  exit;
} else {
  require_once('view/top.php');

  $escaped = array(
    'title' => htmlspecialchars($_POST['title']),
    'email' => htmlspecialchars($_POST['email']),
    'description' => htmlspecialchars($_POST['description']),
);


  echo "<div class = 'list_item'>";
  echo "<p class='list_title'>Please confirm</p><br>";
  echo "<p><b>Email: </b> " . $escaped['email'] . "</p>";
  echo "<p><b>Title: </b> " . $escaped['title'] . "</p>";
  echo "<img src='{$_POST['path']}' alt=\"photo\"  class='detailImg'>";


  if($_POST['location'] == 'downtown') {
    echo "<p><b>Pick-up location:</b> ". "Downtown Campus" . "</p>";
  } else if ($_POST['location'] == 'burnaby'){
    echo "<p><b>Pick-up location:</b> ". "Burnaby Campus" . "</p>";
  } else {
    echo "<p><b>Bug 0014 occured. Please email </b> ". "sharefoodbcit@gmail.com" . " and report this bug. Thank you.</p>";
  }
  // echo "<p><b>Pick-up location</b> ". $_POST["location"] . "</p>";
  echo "<p><b>Description: </b> " . $escaped['description'] . "</p>";

}
?>

<form action="create_process.php" name ="posting" method="post" id="confirmForm">

  <input type="hidden" name="password" value="<?= $_POST['password'] ?>" ><br>
  <input type="hidden" name="email" value="<?= $_POST['email'] ?>"><br>
  <input type="hidden" name="title" value="<?= $_POST['title'] ?>">
  <input type="hidden" name="description" value="<?= $_POST["description"] ?>">
  <input type="hidden" name="image" value="<?= $_POST['path'] ?>">
  <input type="hidden" name="location" value="<?= $_POST['location'] ?>" >
</form>
  <button onclick="goBack()" class="confirm">edit</button>
  <button onclick="confirm()" class="confirm" id="confirmBtn">confirm</button>

<script>
// go back to the previous page
function goBack() {
    window.history.back();
}

function confirm() {
  $("#confirmForm").submit();
}

</script>

<?php
require_once('view/footer.php');
 ?>
