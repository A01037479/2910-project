<?php
require_once('view/top.php');
 ?>

<div class = "list_item">
<form action="create_process.php?" name ="posting" onsubmit="return check_input()" method="post" enctype="multipart/form-data">
  <p><input type="password" name="password" placeholder="Password"><br><span class = "desc">* Required to edit/delete the post later</span></p>
  <p><input type="email" name="email" placeholder="Email address"><br><span class = "desc">* Used to receive a request from other users</span></p>
  <p><input type="text" name="title" placeholder="Title"></p>
  <p><img src="img/photo.png" alt="photo" id="photoupload"> <input type="file" name="image" accept="image/gif, image/jpeg, image/png, image/jpg" value="image"></p>
  <p><textarea name="description" rows="4" cols="20" placeholder="Description"></textarea></p>

  <div>
    <input type="checkbox" id="toggle"/>
    <label for="toggle">
        <span class='expand'>
            <span class="changeArrow arrow-up">-</span>
            <span class="changeArrow arrow-dn">+</span>
            Terms of Use
        </span>
    </label>
    <div class="fieldsetContainer">
        <fieldset>
           By uploading to this site, you, the user agree that the food item is not expired, nor has it been opened.
           This site was made under the pretense that a faithful and caring community (BCIT) exists.
           <br>
           Please contact <strong>dewkim7@gmail.com</strong> for any administrative issues.
           </fieldset>
    </div>

    <p style="margin-bottom: 0px;">I have read and agree to the Terms of Use.</p>
    <input type="checkbox" name="checkbox" value="check">
    <p><input type="submit" name="submit" value="Upload" class="button" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}"></p>

</form>




</div>
<br>

<?php
require_once('view/footer.php');
 ?>
