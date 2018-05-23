<?php
require_once('view/top.php');
?>

<link rel="stylesheet" href="style/about_contact.css">

<div id="contactPage" class="detail_item">
<form action="contact_process.php" method="POST" name="contact" onsubmit="return checkContact()">
    <p class="list_title">Get in Touch</p>
    <p>Send us your questions and we will get back to you!</p>

    <p><input class="textinput" type="text" name="name" id="contact-name" placeholder="Name" required="required">
    <span class="highlight"></span>
    <span class="bar"></span>
    </p>
    <p><input id="contactEmail" class="textinput" type="email" name="email" placeholder="Email"
    required="required">
    <span class="highlight"></span>
    <span class="bar"></span></p>
    <p><input class="textinput" type="text" name="subject" placeholder="Subject">
    <span class="highlight"></span>
    <span class="bar"></span></p>
    <p><textarea placeholder="Your message and comments for Sharefood.today" name="message"
    rows="7" cols="20"></textarea></p>
    <p><input type="submit" value="Send" class="button" onclick="saveData('contactEmail')"></p>

</form>
</div>


<?php
require_once('view/footer.php');
?>
<script src="js/script.js?=v1"></script>
<script>
    var contactBtn = document.getElementById("contactBtn");
    contactBtn.classList.add("active");
</script>

<script>loadStoredDetails('contactEmail')</script>