<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Food</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style/style.css">
    <!--  reference link to font awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/script.js"></script>
  </head>
  <body>
    <header>
      <a href="index.php"><img src="img/logo.png" id="logo"></a>
      <nav>
        <div class="textmenu">
          <span class="menu"><a href="post.php">SHARE</a></span>
          <span class="menu"><a href="">FOOD FACTS</a></span>
          <span class="menu"><a href="">HOW TO</a></span>
          <span class="menu"><a href="">ABOUT</a></span>
        </div>

        <div class="dropdown">
          <button onclick="popMenu()" class="dropbtn"></button>
          <div class="dropdown-content" id="myDropdown">
            <a href="post.php">SHARE</a>
            <a href="">FOOD FACTS</a>
            <a href="">HOW TO</a>
            <a href="">ABOUT</a>
          </div>
        </div>

      </nav>

    </header>
    <article>
