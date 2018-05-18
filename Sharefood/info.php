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
    <!-- <link rel="stylesheet" href="style/chart.css">
    <link rel="stylesheet" href="style/elevator.css"> -->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <!-- <script src="js/nicescroll.js"></script>
    <script src="js/elevator.js"></script> -->

    <style media="screen">


        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        /* html { */
          /*lol*/
          /* background-image: url("img/darren.jpg");
          background-size: 100% auto;
          background-position: top center;
          background-attachment: fixed;
        } */

        /* body {
          height: 100%;
          background-image: linear-gradient(hsl(10,90,66), transparent 100%);
          background-size: 100% 100%;
          mix-blend-mode: difference;
        } */

        h2, p {
          font-family: sans-serif;
        }

        /* style for the map */
        #map {
            width: 100%;
            height: 300px;
        }

        .container {
            padding-bottom:2vh;
        }

        #donate_msg {
            font-size: 14pt;
            font-weight: bold;
            color: green;
        }

        hr {
            size: 5px;
        }

    </style>
  </head>
  <body>

    <!-- <script type="text/javascript">
    $("body").niceScroll({
    cursorcolor:"aquamarine",
    cursorwidth:"25px",
    scrollspeed: 40
    });
    </script> -->


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

    <br/>
    <br/>
    <hr size=>
    <br/>
    <p id="donate_msg">Find food banks around campus and your home to donate excess food!</p>
    <br/>
    <div id="map"></div>
  </div>



   
   <script>
    var map;
    var infowindow; // places API search query infowindows
    var prev_infowindow = false;

    function initMap() {
        var centerPoint = {lat: 49.2675789, lng: -122.9751096};

        var bcit = {
            url: "img/bcit.png", // url
            scaledSize: new google.maps.Size(30, 30) // scaled size
        };
     
        var markers = [
            {
            coords:{lat:49.25092799999999,lng:-123.0034159},
            iconImage: bcit,
            content:'<h4>BCIT Burnaby Campus</h4><p>3700 Willingdon Ave, Burnaby, BC V5G3H2, Canada</p>'
            },
            {
            coords:{lat:49.283451,lng:-123.115255},
            iconImage: bcit,
            content:'<h4>BCIT Downtown Campus</h4><p>555 Seymour St, Vancouver, BC V6B3H6, Canada</p>'
            }
        ];

        map = new google.maps.Map(document.getElementById('map'), {
            center: centerPoint,
            zoom: 10
        });

        var request = {
            location: centerPoint,
            radius: '500',
            openNow: true,
            query: '"food bank"'
        };


       infowindow = new google.maps.InfoWindow();
       var service = new google.maps.places.PlacesService(map);
       service.textSearch(request, callback);


       for(var i = 0;i < markers.length;i++){
            // Add marker
            addMarker(markers[i]);
       }

        // Add Marker Function
        function addMarker(props){
            var marker = new google.maps.Marker({
                position:props.coords,
                map:map
                // icon:props.iconImage
            });

            // Check for customicon
            if(props.iconImage){
            // Set icon image
            marker.setIcon(props.iconImage);
            }

            // Check content
            if(props.content){
                //custom infowindows for BCIT markers
                var custom_infoWindow = new google.maps.InfoWindow({
                    content:props.content
                });
                
                marker.addListener('click', function(){
                    if (prev_infowindow) {
                        prev_infowindow.close();
                        infowindow.close();
                    }
                    prev_infowindow = custom_infoWindow;
                    custom_infoWindow.open(map, marker);
                });

                map.addListener('click', function(){
                    custom_infoWindow.close();
                });
            }
        }
    }

    function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
            for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
            }
        }
    }

    function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.setContent('<b>' + place.name + '</b><br/>' + place.formatted_address);
            infowindow.open(map, this);
        });

        google.maps.event.addListener(map, 'click', function() {
            infowindow.close();
        });
    }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTXNmgrTKjtbZz3d6CN0008e6FcJbZ8MU&callback=initMap&libraries=places">
    </script>


</body>
<?php
require_once('view/footer.php');
?>
