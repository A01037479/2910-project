<?php
require_once('view/top.php');
?>

<div class="detail_item">
  <form id="form1" class="form center" action="post_confirm.php" name="posting" onsubmit="return check_input()" method="post" enctype="multipart/form-data">
    <div id = "post_left">
    <p>
      <input class="textinput" type="text" name="title" placeholder="What would you like to share?">
      <span class="highlight"></span>
      <span class="bar"></span>
    </p>
    <p>
      <textarea name="description" class="autoExpand" rows="3" placeholder="Tell us a bit more about your food (e.g. quantity, best before date)"></textarea>
    </p>
    <input type='file' accept="image/gif, image/jpeg, image/png, image/jpg" id="image">
    <input type='hidden' id="imgpath" name="path">
    <div id="uploadbox">
      <div id="tempdiv"><i class="fa fa-upload" style="font-size:18px;color:green"></i>
        Upload a photo<br>
        <img src="img/photo.png">
      </div>
      <img src="" id="img"><br>
      <progress></progress>
    </div>


    <div class="pickup">
      <p>Pick-up campus</p>
      <p>&nbsp;<input type="checkbox" name="location" value="Burnaby campus" id="hellomom" checked/><label for="hellomom">&nbsp;Burnaby</label>&nbsp;
      <input type="checkbox" name="location" value="Downtown campus" id="hellodad"/><label for="hellodad">&nbsp;Downtown</label>
      </p>
    </div>
  </div>
  <div id="post_right">
    <script type="text/javascript">
    $('input[type="checkbox"]').on('change', function() {
      $('input[type="checkbox"]').not(this).prop('checked', false);
    });
    </script>

    <p>
      <input id="email" class="textinput" type="email" name="email" placeholder="Email">
      <span class="highlight"></span>
      <span class="bar"></span>
    </p>

    <p>
      <input id="temp1" class="textinput" type="password" name="password" onkeyup="pwd_validation(); return false;" placeholder="Password">
      <span class="highlight"></span>
      <span class="bar"></span>
    </p>
    <p class="confirmPsw">
      <input id="temp2" class="textinput" type="password" name="password2" onkeyup="pwd_validation(); return false;" placeholder="Confirm password">
      <span class="highlight"></span>
      <span class="bar"></span>
    </p>
    <span class="pswcheck">*password must be between 4 to 20 characters and can contain letters, numbers or symbols.</span>
  <div class="toggleDiv">
    <input type="checkbox" id="toggle"/>
    <label for="toggle">
        <span>Terms of Use&nbsp;
            <span class="changeArrow arrow-up"><img src="img/arrow-up.png" alt="up"></span>
            <span class="changeArrow arrow-dn"><img class="arrowDown" src="img/arrow-down.png" alt="down"></span>
        </span>
    </label>
    <div class="fieldsetContainer">
      <p class="ToU">By uploading to this site, you, the user agree that the food item is not expired, nor has it been opened.
      This site was made under the pretense that a faithful and caring community (BCIT) exists.</p>
    </div>
  </div>
  <br>
  <button id = "submitPost" class="button"><i class="fa fa-send-o" style="font-size:15px"></i> Submit</button>
  </div>

  </form>



<script src="js/fileupload.js"></script>
<script src="js/script.js?=v1"></script>
<script src="js/expnd-ta.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>loadStoredDetails('email')</script>


<?php
require_once('view/footer.php');
 ?>
