<?php
require_once('view/top.php');

if(count($_POST) == 0) {
  header("Location: index.php");
  exit;
} else {

  // Upload and Resize the photo
  $post_photo = basename($_FILES['image']['name']);
  $post_tmp = $_FILES['image']['tmp_name'];
  $dir = "uploads/";
  $ext = strtolower(pathinfo($post_photo, PATHINFO_EXTENSION)); //getting image extension
  $path = $dir . rand() . date('y-m-d-a-h-i-s') . "." . $ext;

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


  echo "<div class = 'list_item'>";
  echo "<p class='list_title'>Please confirm</p><br>";
  echo "<p><b>Email</b> " . $_POST["email"] . "</p>";
  echo "<p><b>Title</b> " . $_POST["title"] . "</p>";
  echo "<img src=\"$path\" alt=\"photo\"  class='detailImg'>";
  echo "<p><b>Pick-up location</b> ". $_POST["location"] . "</p>";
  echo "<p><b>Description</b> " . $_POST["description"] . "</p>";

}
?>

<form action="create_process.php" name ="posting" method="post" id="confirmForm">

  <input type="hidden" name="password" value="<?= $_POST['password'] ?>" ><br>
  <input type="hidden" name="email" value="<?= $_POST['email'] ?>"><br>
  <input type="hidden" name="title" value="<?= $_POST['title'] ?>">
  <input type="hidden" name="description" value="<?= $_POST["description"] ?>">
  <input type="hidden" name="image" value="<?= $path ?>">
  <input type="hidden" name="location" value="<?= $_POST['location'] ?>" >
</form>
  <button onclick="goBack()" class="confirm">edit</button>
  <button onclick="confirm()" class="confirm" id="confirmBtn">confirm</button>

<script>
// go back to the previous page
function goBack() {
    window.history.back();
}

function confirm() {
  $("#confirmForm").submit();
}

</script>

<?php
require_once('view/footer.php');
 ?>
