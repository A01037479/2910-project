<?php

// it only works when user comes to this page with normal process
if(!isset($_POST['id'])) {
  header("Location: index.php");
  exit;
} else {

  require_once('view/top.php');
  require_once('lib/connect.php');
  require_once('config/config.php');
  $conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

  $sql = "SELECT * FROM list WHERE id = {$_POST['id']}";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);

  //prevent cross scripting attack
  $escaped = array(
    'title' => htmlspecialchars($row['title']),
    'email' => htmlspecialchars($row['email']),
    'image' => htmlspecialchars($row['image']),
    'status' => htmlspecialchars($row['status']),
    'description' => htmlspecialchars($row['description']),
  );

  // used for radio button check status
  if(strcasecmp($row['location'], "Burnaby Campus") == 0 ) {
    $checked_Burnaby = "checked";
    $checked_Downtown = "";
  } else {
    $checked_Burnaby = "";
    $checked_Downtown = "checked";
  }

}

?>

<div class = "detail_item">
  <p class="list_title"><?=$escaped['title']?></p>
  <form action="edit_process.php" name ="posting" onsubmit="return check_input()" method="post">
    <!-- status option -->
    <p>
      <label><input type="radio" name="status" value="Available" checked>Available</label><br>
      <label><input type="radio" name="status" value="Taken">Taken</label>
    </p>
    <img src="<?=$escaped['image']?>" class='detailImg'><br>
    <input type="hidden" name="id" value="<?=$_POST['id']?>">
    <p id="pwdInvalid"></p>
    <p><input type="password" name="password" placeholder="Password" onkeyup="pwd_validation(); return false;"><br><span class = "desc">* Required to edit/delete the post later</span></p>
    <p><input type="password" name="password2" placeholder="Re-enter password" onkeyup="pwd_validation(); return false;"><br><span class="desc">* Confirming password</span></p>
    <p><input type="email" name="email" value="<?=$escaped['email']?>"><br><span class = "desc">* Used to receive a request from other users<br>* It will not be disclosed to other users</span></p>
    <p><input type="text" name="title" value="<?=$escaped['title']?>"></p>
    <p><textarea name="description" rows="4" cols="20"><?=$escaped['description']?></textarea><br><span class = "desc">* e.g. Quantity, best before date, pick-up times</span></p>
    <div id="location">
      Pick-up Location<br>
      <label><input type="radio" name="location" value="Burnaby Campus" <?=$checked_Burnaby?>>Burnaby Campus</label><br>
      <label><input type="radio" name="location" value="Downtown Campus" <?=$checked_Downtown?>>Downtown Campus</label><br>
    </div>

    <div class="toggleDiv">
      <input type="checkbox" id="toggle"/>
      <label for="toggle">
          <span>
              Terms of Use&nbsp;
              <span class="changeArrow arrow-up"><img src="img/arrow-up.png" alt="up"></span>
              <span class="changeArrow arrow-dn"><img src="img/arrow-down.png" alt="down"></span>
          </span>
      </label>
      <div class="fieldsetContainer">
         <p>By uploading to this site, you, the user agree that the food item is not expired, nor has it been opened.
         This site was made under the pretense that a faithful and caring community (BCIT) exists.</p>
      </div>
      <p><label><input type="checkbox" name="checkbox" value="check" id="check_term">I have read and agree to the Terms of Use.</label></p>

      <p><input type="submit" name="submit" value="Upload" class="button" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms of use.');return false}"></p>
    </div>

  </form>

</div>



<br>

 <script src="js/script.js?v=1"></script>

<?php
require_once('view/footer.php');
 ?>


