<?php
require_once('view/top.php');
 ?>

<div class = "detail_item">
  <p class="list_title">Share your food</p>
  <form action="create_process.php?" name ="posting" onsubmit="return check_input()" method="post" enctype="multipart/form-data">
    <span id="pwdInvalid"></span>
    <p><input type="password" name="password" placeholder="Password" onkeyup="pwd_validation(); return false;"><br><span class = "desc">* Required to edit/delete the post later</span></p>
    <p><input type="password" name="password2" placeholder="Re-enter password" onkeyup="pwd_validation(); return false;"><span class="desc">*Confirming password</span></p>
    <p><input type="email" name="email" placeholder="Email address"><br><span class = "desc">* Used to receive a request from other users</span></p>
    <p><input type="text" name="title" placeholder="Title"></p>
    <p><img src="img/photo.png" alt="photo" id="photoupload"> <input type="file" name="image" accept="image/gif, image/jpeg, image/png, image/jpg" value="image"></p>
    <p><textarea name="description" rows="4" cols="20" placeholder="Description"></textarea></p>

    <p><input type="radio" name="location" value="downtown">Downtown Campus</p>
    <p><input type="radio" name="location" value="burnaby">Burnaby Campus</p>


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
      <p><input type="checkbox" name="checkbox" value="check" id="check_term">I have read and agree to the Terms of Use.</p>

      <p><input type="submit" name="submit" value="Upload" class="button" onclick="check_input();return false}"></p>
    </div>

  </form>

</div>

<br>

<?php
require_once('view/footer.php');
 ?>
