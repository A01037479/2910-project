<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
    <title>Share Food</title>
    <link rel="icon" href="img/logoImg.png">
    <link rel="stylesheet" href="style/style.css?v=1">
    <!--  reference link to font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/dropdown.js?v=1"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/storeProcess.js"></script>
    
    <!-- <link rel="stylesheet" href="style/btn-min.css"> -->

  </head>
  <body>
    <header>
    <div id="topContainer">
      <a href="index.php"><img src="img/logoFull.png" id="logo"></a>
      <nav id="nav">
      <a href="javascript:void(0);" onclick="menu_function()" id="icon" style="font-size:25px">&#9776;</a>
        <div class = "topMenu" id="menu">
          <a class = "navBtn" id = "infoBtn" href="info.php">FOOD FACTS</a>
          <a class = "navBtn" id = "contactBtn" href="contact.php">CONTACT</a>
          <a class = "navBtn" id = "aboutBtn" href="about.php">ABOUT</a>
  
        </div>
        <a id="nav-share-btn" href="post.php"><i class="fa fa-handshake-o" style="color:white"></i> SHARE</a>
      </nav>
    </div>
    </header>
    <article id="article" onclick = "close_menu()">