<?php
require_once('view/top.php');
?>

<link rel="stylesheet" href="style/about_contact.css">

<div class="detail_item">
<form action="contact_process.php" method="POST">
    <p class="list_title">Get in Touch</p>
    <p>Send us your questions and we will get back to you!</p>

    <p><input type="text" name="name" id="contact-name" placeholder="Name" required="required"></p>
    <p><input type="email" name="email" placeholder="Email"
    required="required"></p>
    <p><input type="text" name="subject" placeholder="Subject"></p>
    <p><textarea placeholder="Message" name="message"
    rows="7" cols="20"></textarea></p>
    <p><input type="submit" value="Send" class="button"></p>

</form>
</div>


<?php
require_once('view/footer.php');
?>
