<?php


  // Upload and Resize the photo
  $post_photo = basename($_FILES['file']['name']);
  $post_tmp = $_FILES['file']['tmp_name'];
  $exif = exif_read_data($post_tmp);
  $dir = "uploads/";
  $ext = strtolower(pathinfo($post_photo, PATHINFO_EXTENSION)); //getting image extension
  $path = $dir . rand() . date('y-m-d-a-h-i-s') . "." . $ext;

  if($ext == 'jpg' || $ext == 'jpeg'){
    $src = imagecreatefromjpeg($post_tmp);
  } else if($ext == 'png'){
    $src = imagecreatefrompng($post_tmp);
  } else if($ext == 'gif'){
    $src = imagecreatefromgif($post_tmp);
  }

 list($width, $height) = getimagesize($post_tmp); // fetching original image width and height

//rotate if it's taken vertically
if (!empty($exif['Orientation'])) {
  switch ($exif['Orientation']) {
      case 3:
        $src = imagerotate($src, 180, 0);
      break;
      case 6:
        $src = imagerotate($src, -90, 0);
        $tempheight = $height;
        $height = $width;
        $width = $tempheight;
      break;
      case 8:
        $src = imagerotate($src, 90, 0);
        $tempheight = $height;
        $height = $width;
        $width = $tempheight;
      break;
  } 
}

  $newwidth = 350;
  $newheight = $height / $width * $newwidth;  // calculating proportionate height
  $tmp_min = imagecreatetruecolor($newwidth, $newheight); // creating frame for compress image

  // make background color white
  $white = imagecolorallocate($tmp_min, 255, 255, 255);
  imagefill($tmp_min, 0, 0, $white);

  imagecopyresampled($tmp_min, $src, 0,0,0,0, $newwidth, $newheight, $width, $height);  //compressing image

  // store compressed image
  imagejpeg($tmp_min, $path, 80);

  // result of json type
  $data = json_encode($path);
  echo $data;
  
  // free the memory
  imagedestroy($src);
  imagedestroy($tmp_min);

?>