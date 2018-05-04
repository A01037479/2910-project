<?php
require_once('view/top.php');
?>

<link rel="stylesheet" href="style/about_contact.css">

<div class="contact-container">
<form action="" method="">
    <h2>Get in Touch</h2>
    <p>Send us your questions and we will get back to you!</p>
    <br/>
    <span>Name *</span>
    <div class="contact-info">
        <input type="text" name="fname" id="contact-fname" pattern="[A-Za-z]{2,25}" 
        placeholder="First Name" required="required">
        <input type="text" name="lname" id="contact-lname" pattern="[A-Za-z]{2,25}" 
        placeholder="Last Name" required="required">
    </div>
    <br/>
    <span>Phone Number</span>
    <div class="contact-info">
        <input type="tel" name="areacode" class="contact-number" id="contact-areacode" pattern="[0-9]{3}" 
        maxlength="3" placeholder="(###)"> -
        <input type="tel" name="prefix" class="contact-number" id="contact-prefix" pattern="[0-9]{3}" 
        maxlength="3" placeholder="###"> -
        <input type="tel" name="line" class="contact-number" id="contact-line" pattern="[0-9]{4}" 
        maxlength="4" placeholder="####">
    </div>
    <br/>
    <span>Email *</span>
    <div class="contact-info">
        <input type="email" name="contact-email" id="contact-email" placeholder="iron_man@gmail.com" 
        required="required">
    </div>
    <br/>
    <span>Message</span> 
    <div class="contact-info">
        <textarea placeholder="Enter Message" name="client-message" id="contact-message" 
        rows="4" cols="20"></textarea> 
    </div>
    <br/>
    <div>
        <input type="submit" value="Send" id="contact-send-btn" >
    </div>

</form>
</div>

<script>
    $(".contact-number").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next(".contact-number").focus();
    }
    });
</script>

<?php
require_once('view/footer.php');
?>