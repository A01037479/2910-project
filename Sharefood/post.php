<?php
require_once('view/top.php');
 ?>

<div class = "detail_item">
  <p class="list_title">Share your food</p>
  <form action="post_confirm.php" name ="posting" onsubmit="return check_input()" method="post" enctype="multipart/form-data">
    <p><input type="text" name="title" placeholder="What would you like to share?"></p>
    <!-- photo upload -->
    <input type='file' accept="image/gif, image/jpeg, image/png, image/jpg" id="image">
    <input type='hidden' id="imgpath" name="path">
    <div id="uploadbox">
      <div id="tempdiv">
        Upload a photo<br>
        <img src="img/photo.png">
      </div>
      <img src="" id="img">
    </div>
    <progress></progress>

    <p><textarea name="description" rows="4" cols="20" placeholder="A bit about your food (e.g. quantity, best before date)"></textarea></p>
    <div id="location">
      Pick-up Location<br>
      <label><input type="radio" name="location" value="Burnaby Campus" checked>Burnaby Campus</label><br>
      <label><input type="radio" name="location" value="Downtown Campus">Downtown Campus</label><br>
    </div>

    <p id="pwdInvalid"></p>
    <p><input type="password" name="password" placeholder="Password" onkeyup="pwd_validation(); return false;">
    <br><input type="password" name="password2" placeholder="Confirming password" onkeyup="pwd_validation(); return false;"></p>
    <p><input type="email" name="email" placeholder="Email address"></p>

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

      <p><input type="submit" name="submit" value="Upload" class="button"></p>
    </div>

  </form>

</div>

<br>

<script src="js/script.js?v=1"></script>

<script src="js/fileupload.js"></script>

<?php
require_once('view/footer.php');
 ?>

 
