<?php
require_once('view/top.php');



// Upload and Resize the photo
$post_photo = basename($_FILES['image']['name']);
$post_tmp = $_FILES['image']['tmp_name'];
$dir = "uploads/";
$len = strlen($post_photo);
$path = $dir . date('y-m-d-a-h-i-s') . ($len > 20 ? substr($post_photo, $len-10) : $post_photo); //path to be uploaded
//if file name is over 20, make it short

$ext = strtolower(pathinfo($post_photo, PATHINFO_EXTENSION)); //getting image extension
if($ext == 'jpg' || $ext == 'jpeg'){
  $src = imagecreatefromjpeg($post_tmp);
} else if($ext == 'png'){
  $src = imagecreatefrompng($post_tmp);
} else if($ext == 'gif'){
  $src = imagecreatefromgif($post_tmp);
}

list($width, $height) = getimagesize($post_tmp); // fetching original image width and height
$newwidth = 350;
$newheight = $height / $width * $newwidth;  // calculating proportionate height
$tmp_min = imagecreatetruecolor($newwidth, $newheight); // creating frame for compress image

// make background color white
$white = imagecolorallocate($tmp_min, 255, 255, 255);
imagefill($tmp_min, 0, 0, $white);

imagecopyresampled($tmp_min, $src, 0,0,0,0, $newwidth, $newheight, $width, $height);  //compressing image

// store compressed image
imagejpeg($tmp_min, $path, 80);

echo "<div class = \"list_item\">";
echo "<p>Please confirm the following information entered is correct!</p>";
echo "<br><br><br>";
echo "<p>Your email: " . $_POST["email"] . "</p>";   
echo "<p>Item posted: " . $_POST["title"] . "</p>";
echo "<img src=\"$path\" alt=\"photo\" id=\"photoconfirm\">";
echo "<p>Campus location: ". $_POST["location"] . "</p>";
echo "<p>Description: " . $_POST["description"] . "</p>";



?>

<script>
function goBack() {
    window.history.back();
}
</script>


<form action="create_process.php?>" name ="posting" onsubmit="success()" method="post" enctype="multipart/form-data">

  <p><input type="hidden" name="password" value="<?= $_POST['password'] ?>" ><br><span class = "desc"></span></p>
  <p><input type="hidden" name="email" value="<?= $_POST['email'] ?>"><br><span class = "desc"></span></p>
  <p><input type="hidden" name="title" value="<?= $_POST['title'] ?>"></p>
  <p><input type="hidden" name="description" value="<?= $_POST["description"] ?>"></p>
  <p><input type="hidden" name="image" value="<?= $path ?>"> </p>
  <p><input type="hidden" name="location" value="<?= $_POST['location'] ?>" > </p>
  <a onclick="goBack()" style="color:blue;cursor:pointer" >edit</a>
  <p><input type="submit" name="submit" value="Confirm" id = "confirmpost" class="button"></p>
  
</form>

