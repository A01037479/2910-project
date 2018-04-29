<?php
require_once('view/top.php');
 ?>

<div class="list_item">
  <p class="list_title">Share your food</p>
  <form action="create_process.php?" name ="posting" onsubmit="return check_input()" method="post" enctype="multipart/form-data">
    <p><input type="password" name="password" placeholder="Password"><br><span class = "desc">* Required to edit/delete the post later</span></p>
    <p><input type="email" name="email" placeholder="Email address"><br><span class = "desc">* Used to receive a request from other users</span></p>
    <p><input type="text" name="title" placeholder="Title"></p>
    <p><img src="img/photo.png" alt="photo" id="photoupload"> <input type="file" name="image" accept="image/gif, image/jpeg, image/png, image/jpg" value="image"></p>
    <p><textarea name="description" rows="4" cols="20" placeholder="Description"></textarea></p>
    <div>
      <input type="checkbox" class="read-more-state" id="post-1" />

      <p id="p123" class="read-more-wrap" style="font-family:Trebuchet MS"> Terms of Use
        <span class="read-more-target" > <br>
             By uploading to this site, you, the user agree
             that the food item is not expired, nor has it been opened. This site was made
             under the pretense that a faithful and caring community (BCIT) exists.
             Please contact lee@seul.ca for any administrative issues.
        </span>
      </p>


      <label for="post-1" class="read-more-trigger"></label>
    </div>
    <p><input type="submit" name="submit" value="Upload" class="button"></p>
  </form>

</div>
<br>

<?php
require_once('view/footer.php');
 ?>
