<?php
require_once('view/top.php');
require_once('lib/connect.php');
require_once('config/config.php');
$conn = db_init($config["host"], $config["dbuser"], $config["dbpw"], $config["dbname"]);

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

// extracting only strings to prevent injection attack

$filtered = array(
  'password' => mysqli_real_escape_string($conn, $_POST['password']),
  'email' => mysqli_real_escape_string($conn, $_POST['email']),
  'title' => mysqli_real_escape_string($conn, $_POST['title']),
  'description' => mysqli_real_escape_string($conn, $_POST['description']),
);

// Insert data into table

$sql = "
    INSERT INTO list
    (password, email, title, status, image, description, created)
    VALUES(
      '{$filtered['password']}',
      '{$filtered['email']}',
      '{$filtered['title']}',
      'Available',
      '{$path}',
      '{$filtered['description']}',
      NOW()
      )
      ";
$result = mysqli_query($conn, $sql);
if($result === false){
  echo "Sorry! there's a problem in the server<br>";
  echo "<a href='post.php'>Go back</a><br>";

} else {
  imagejpeg($tmp_min, $path, 80); // store compressed image
  header("Location: index.php");

}

 ?>
