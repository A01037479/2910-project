<?php
function db_init($host, $dbuser, $dbpw, $dbname){

  $conn = mysqli_connect($host, $dbuser, $dbpw, $dbname);
  return $conn;
}

 ?>
