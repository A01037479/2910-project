<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <title>Share Food</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style/style.css?v=1">
    <!--  reference link to font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/dropdown.js?v=1"></script>
    <!-- <link rel="stylesheet" href="style/btn-min.css"> -->

  </head>
  <body>
    <header>
    <div id="topContainer">
      <a href="index.php"><img src="img/logo.png" id="logo"></a>
      <nav id="nav">
      <a href="javascript:void(0);" onclick="menu_function()" id="icon" style="font-size:25px">&#9776;</a>
        <div class = "topMenu" id="menu">
          <a href="contact.php">CONTACT</a>
          <a href="about.php">ABOUT</a>
          <a href="info.php">FOOD FACTS</a>
          <a href="post.php">SHARE</a>
        </div>
      </nav>
    </div>
    </header>
    <article id="article" onclick = "close_menu()">
