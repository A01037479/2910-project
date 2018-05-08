<?php
require_once('view/top.php');
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- <link rel="stylesheet" href="style/a4.css"> -->
    <link rel="stylesheet" href="style/stats.css">
    <link rel="stylesheet" href="style/information.css">
    <link rel="stylesheet" href="style/chart.css">
    <link rel="stylesheet" href="style/elevator.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="js/nicescroll.js"></script>
    <script src="js/elevator.js"></script>

    <style media="screen">


        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        html {
          /*lol*/
          background-image: url("img/darren.jpg");
          background-size: 100% auto;
          background-position: top center;
          background-attachment: fixed;
        }

        /* body {
          height: 100%;
          background-image: linear-gradient(hsl(10,90,66), transparent 100%);
          background-size: 100% 100%;
          mix-blend-mode: difference;
        } */

        h2, p {
          font-family: sans-serif;
        }





    </style>
  </head>
  <body>

    <script type="text/javascript">
    $("body").niceScroll({
    cursorcolor:"aquamarine",
    cursorwidth:"25px",
    scrollspeed: 40
    });
    </script>


    <div class="container" style="background-color: #fff">
    <ol class="step-list">
        <li class="step-list__item">
            <div class="step-list__item__inner">
                <div class="content">
                    <div class="body">
                        <h2>100% of food should be eaten.</h2>
                        <p>Why did you throw away your edible food?</p>
                    </div>

                    <div class="icon">
                        <img src="img/svg/groceries.svg" alt="groceries"/>
                    </div>
                </div>
            </div>
        </li>
        <li class="step-list__item">
            <div class="step-list__item__inner">
                <div class="content">
                    <div class="body">
                        <h2>$31 Billion wasted</h2>
                        <p>In Canada, $31 billion worth of food ends up in landfills or composters each year.</p>
                    </div>

                    <div class="icon">
                        <img src="img/svg/food.svg" alt="food"/>
                    </div>
                </div>
            </div>
        </li>
        <li class="step-list__item">
            <div class="step-list__item__inner">
                <div class="content">
                    <div class="body">
                        <h2>47 per cent of food waste</h2>
                        <p>happens in the home, according to the Value Chain Management International study.</p>
                    </div>

                    <div class="icon">
                        <img src="img/svg/grocery.svg" alt="more food" />
                    </div>
                </div>
            </div>
        </li>
        <li class="step-list__item">
            <div class="step-list__item__inner">
                <div class="content">
                    <div class="body">
                        <h2>A North American consumer</h2>
                        <p>wastes 15 times more food than a typical African consumer.</p>
                    </div>

                    <div class="icon">
                        <img src="img/svg/eye.svg" alt="store" />
                    </div>
                </div>
            </div>
        </li>
        <li class="step-list__item">
            <div class="step-list__item__inner">
                <div class="content">
                    <div class="body">
                        <h2>If you want to make a difference..</h2>
                        <p>Start here, and share your food on our platform!</p>
                    </div>

                    <div class="icon">
                        <img src="img/svg/happy.svg" alt="happy face" />
                    </div>
                </div>
            </div>
        </li>
    </ol>
  </div>

<?php
require_once('view/footer.php');
?>
