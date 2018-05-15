<?php
require_once('view/top.php');
?>

<style media="screen">
body {
  opacity: 1;
}

/* sigh */
.image-upload-wrap {
  text-align: left !important;
}

p {
  text-align: left !important;
}

</style>

<link rel="stylesheet" href="./style/share-input.css">
<link rel="stylesheet" href="./style/file-upload.css">
<link rel="stylesheet" href="./style/btn.css">


 <div class="container-1">
   <form class="form1" action="post_confirm.php" name="posting" onsubmit="return check_input()" method="post" enctype="multipart/form-data">
     <div class="group">
       <input class="input1" type="text" name="title" placeholder="What would you like to share?">
       <span class="highlight"></span>
       <span class="bar"></span>
       <label class="label1">title</label>
     </div>
     <!-- <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> -->

     <!-- <div class="file-upload">
         <div class="image-upload-wrap">
           <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="path" value="image"/>
           <input type='hidden' id="imgpath" name="path">
           <div class="drag-text">
             <h3>upload your picture</h3>
           </div>
         </div>
         <div class="file-upload-content">
           <img class="file-upload-image" src="#" alt="your image" />
           <div class="image-title-wrap">
             <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
           </div>
         </div>
       </div> -->

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

       <hr>

       <textarea style="padding: 40px; width: 260px;"name="description" class='autoExpand txtarea' rows="4" cols="25" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
Tell us a bit more about your food (e.g. quantity, best before date)
       </textarea>

       <hr><br>

             <input type="checkbox" name="location" value="burnaby"/>&nbsp;burnaby <input type="checkbox" name="location" value="vancouver"/> vancouver

       <br><br><hr><br>

       <script type="text/javascript">
       $('input[type="checkbox"]').on('change', function() {
         $('input[type="checkbox"]').not(this).prop('checked', false);
       });
       </script>

       <div class="group">
         <input id="temp1" class="input1" type="password" name="password" onkeyup="pwd_validation(); return false;" placeholder="plz daddy">
         <span class="highlight"></span>
         <span class="bar"></span>
         <label class="label1">password</label>
       </div>
     <div class="group">
       <input id="temp2" class="input1" type="password" name="password2" onkeyup="pwd_validation(); return false;" placeholder="plz mommy">
       <span class="highlight"></span>
       <span class="bar"></span>
       <label class="label1">password again</label>
     </div>

     <div class="group">
       <input class="input1" type="email" name="email" placeholder="don't forget this!">
       <span class="highlight"></span>
       <span class="bar"></span>
       <label class="label1">email</label>
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
       <p><label><input type="checkbox" name="checkbox" value="check" id="check_term" >I have read and agree to the Terms of Use.</label></p>

       <div class="col">
         <button class="btn btn-cool">
           Submit
         </button>
       </div>


   </form>
 </div>

<!-- <div class = "detail_item">
  <p class="list_title">Share your food</p>
  <form action="post_confirm.php" name = "posting" onsubmit="return check_input()" method="post" enctype="multipart/form-data">
    <p><input type="text" name="title" placeholder="What would you like to share?"></p> -->
    <!-- photo upload -->
    <!-- <input type='file' accept="image/gif, image/jpeg, image/png, image/jpg" id="image">
    <input type='hidden' id="imgpath" name="path">
    <div id="uploadbox">
      <div id="tempdiv">
        Upload a photo<br>
        <img src="img/photo.png">
      </div>
      <img src="" id="img">
    </div>
    <progress></progress>

    <p><textarea name="description" rows="4" cols="20" placeholder="Tell us a bit about your food (e.g. quantity, best before date)"></textarea></p>
    <div id="location">
      Pick-up Location<br>
      <label><input type="radio" name="location" value="Burnaby Campus" checked>Burnaby Campus</label><br>
      <label><input type="radio" name="location" value="Downtown Campus">Downtown Campus</label><br>
    </div>

    <p id="pwdInvalid"></p>
    <p><input type="password" name="password" placeholder="Password" onkeyup="pwd_validation(); return false;">
    <br><input type="password" name="password2" placeholder="Confirming password" onkeyup="pwd_validation(); return false;"></p>
    <p><input type="email" name="email" placeholder="Email address"></p> -->
<!--
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
    </div> -->

  <!-- </form> -->

<!-- </div> -->


<script src="js/ripple.js"></script>
<script src="js/fileupload.js"></script>
<!-- <script src="js/file-upload-btn.js"></script> -->
<script src="js/script.js?=v1"></script>
<script src="js/expnd-ta.js"></script>




<?php
require_once('view/footer.php');
 ?>
