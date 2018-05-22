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

</style>

<link rel="stylesheet" href="./style/share-input.css">
<link rel="stylesheet" href="./style/file-upload.css">
<link rel="stylesheet" href="./style/btn.css">


 <div class="detail_item">
   <form class="form1" action="post_confirm.php" name="posting" onsubmit="return check_input()" method="post" enctype="multipart/form-data">
     <div class="group">
       <input class="input1" type="text" name="title" placeholder="What would you like to share?">
       <span class="highlight"></span>
       <span class="bar"></span>
       <!-- <label class="label1">title</label> -->
     </div>

     <input type='file' accept="image/gif, image/jpeg, image/png, image/jpg" id="image">
       <input type='hidden' id="imgpath" name="path">
       <div id="uploadbox">
         <div id="tempdiv">
           Upload a photo<br>
           <img src="img/photo.png">
         </div>
         <img src="" id="img"><br>
         <progress></progress>
       </div>
        
       <textarea style="padding: 40px 10px; width: 260px; max-width: 90%; box-sizing: border-box;" name="description" class='autoExpand txtarea' rows="4" cols="25" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
Tell us a bit more about your food (e.g. quantity, best before date)
       </textarea>
  
        <input type="checkbox" name="location" value="burnaby" id="hellomom" checked/><label for="hellomom">&nbsp;Burnaby</label>
        <input type="checkbox" name="location" value="downtown" id="hellodad"/><label for="hellodad">&nbsp;Downtown</label>
       <br><br>

       <script type="text/javascript">
       $('input[type="checkbox"]').on('change', function() {
         $('input[type="checkbox"]').not(this).prop('checked', false);
       });
       </script>

       <div class="group">
         <input id="temp1" class="input1" type="password" name="password" onkeyup="pwd_validation(); return false;" placeholder="password">
         <span class="highlight"></span>
         <span class="bar"></span>
         <!-- <label class="label1">password</label> -->
       </div>
     <div class="group">
       <input id="temp2" class="input1" type="password" name="password2" onkeyup="pwd_validation(); return false;" placeholder="password again">
       <span class="highlight"></span>
       <span class="bar"></span>
       <!-- <label class="label1">password again</label> -->
     </div>

     <div class="group">
       
       <input id="email" class="input1" type="email" name="email" placeholder="email">
       <span class="highlight"></span>
       <span class="bar"></span>
       <!-- <label class="label1">email</label> -->
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

      <button class="button">Submit</button>


   </form>
 </div>


<script src="js/storeProcess.js"></script>
<script src="js/ripple.js"></script>
<script src="js/fileupload.js"></script>
<script src="js/script.js?=v1"></script>
<script src="js/expnd-ta.js"></script>
<script>loadStoredDetails('email')</script>



<?php
require_once('view/footer.php');
 ?>
