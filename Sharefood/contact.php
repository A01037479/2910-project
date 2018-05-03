<?php
require_once('view/top.php');
?>

<div class="contact-container" style="width:75%;padding-left:15vw;margin:0 auto;text-align:left">
<form action="" method="">
    <h2 style="padding-top:2vw;">Get in Touch</h2>
    <p>Send us your questions and we will get back to you</p>
    <br/>
    <span>Name *</span>
    <div style="border:none;">
        <input type="text" name="fname" pattern="[a-zA-Z]{2-25}" placeholder="First Name" required="required" 
        style="width:200px;">
        <input type="text" name="lname" pattern="[a-zA-Z]{2-25}" placeholder="Last Name" required="required" 
        style="width:200px;">
    </div>
    <span>Phone Number</span>
    <div style="border:none;">
        <input type="text" name="areacode" pattern="[0-9]{3}" placeholder="(###)" style="width:50px;">
        <input type="text" name="prefix" pattern="[0-9]{3}" placeholder="###" style="width:50px;">
        <input type="text" name="line" pattern="[0-9]{4}" placeholder="####" style="width:50px;">
    </div>
    <span>Email *</span>
    <div style="border:none;">
        <input type="email" name="contact-email" placeholder="iron_man@gmail.com" style="width:200px;">
    </div>
    <span>Message</span> 
    <div style="border:none;">
        <textarea placeholder="Enter Message" name="client-message" style="width:75%;height:150px;"></textarea> 
    </div>
    <div>
        <input type="submit" value="Send" style="width:50px;" onclick="alert('Credit card info sent!');">
    </div>

</form>
</div>


<?php
require_once('view/footer.php');
?>