<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="/style/elevator.css">
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    :root {
      --bg: #214154;
      --c1: #227066;
      --c4: #214154;

      --bs: 0px 0px 0px 1px #FFDD5C;

      --duration: 10s;
      }

      html, body, .items {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      font-size: 3em;
      }

      body {
      background-color: var(--c4);
      overflow: hidden;
      }

      h1 {
        color: pink;
      }

      .items:before{
      content:"";
      position:absolute;
      height: 100%;
      width: 100%;
      background-color: var(--bg);
      background-image: radial-gradient(circle at 50%,var(--c1) 0% ,var(--c4) 50%);
      animation: bg 5s infinite;
      overflow: hidden;
      transition-timing-function: ease-in-out;
      }

      .item {
      position: absolute;
      margin: auto;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      box-shadow: var(--bs);

      animation: front var(--duration) infinite;
      transition-timing-function: linear;
      }

      .item:nth-child(1) {
      animation-delay: -1s;
      }
      .item:nth-child(2) {
      animation-delay: -2s;
      }
      .item:nth-child(3) {
      animation-delay: -3s;
      }
      .item:nth-child(4) {
      animation-delay: -4s;
      }
      .item:nth-child(5) {
      animation-delay: -5s;
      }
      .item:nth-child(6) {
      animation-delay: -6s;
      }
      .item:nth-child(7) {
      animation-delay: -7s;
      }
      .item:nth-child(8) {
      animation-delay: -8s;
      }
      .item:nth-child(9) {
      animation-delay: -9s;
      }
      .item:nth-child(10) {
      animation-delay: -10s;
      }

      @keyframes front {
      0% {height: 0px; width: 0px; transform: rotate(90deg);}
      100% {height: 500px; width: 500px; opacity:0;}
      }

      @keyframes bg {
      0%, 100% {transform:scale(2); opacity: 0.8;}
      50% {transform:scale(2.5); opacity: 0.5;}
      }


      body *,
      html * {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
      }

      body {
        overflow: hidden;
      }

      .full {
        position: absolute;
        width: 33.934342%;
        height: auto;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        display: block;
      }

      .zoom {
        animation: scale 3s linear infinite;
      }

      @keyframes scale {
        50% {
          -webkit-transform:scale(0.00001);
          -moz-transform:scale(0.00001);
          -ms-transform:scale(0.00001);
          -o-transform:scale(0.00001);
          transform:scale(0.00001);
        }
      }
    </style>
  </head>
  <body>


    <h1 style="text-align: center;">Darren</h1>
    <div class = "items"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">

      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
      <div class = "item"><img src="img/darren.jpg" alt="Smiley face" height="200" width="200">
</div>
    </div>

<img src="https://i.imgur.com/kLBeJ3h.jpg" class="full zoom" alt="" />





<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<div class="elevator">
                    <svg class="sweet-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve" height="100px" width="100px">
                        <path d="M70,47.5H30c-1.4,0-2.5,1.1-2.5,2.5v40c0,1.4,1.1,2.5,2.5,2.5h40c1.4,0,2.5-1.1,2.5-2.5V50C72.5,48.6,71.4,47.5,70,47.5z   M47.5,87.5h-5v-25h5V87.5z M57.5,87.5h-5v-25h5V87.5z M67.5,87.5h-5V60c0-1.4-1.1-2.5-2.5-2.5H40c-1.4,0-2.5,1.1-2.5,2.5v27.5h-5  v-35h35V87.5z"></path>
                        <path d="M50,42.5c1.4,0,2.5-1.1,2.5-2.5V16l5.7,5.7c0.5,0.5,1.1,0.7,1.8,0.7s1.3-0.2,1.8-0.7c1-1,1-2.6,0-3.5l-10-10  c-1-1-2.6-1-3.5,0l-10,10c-1,1-1,2.6,0,3.5c1,1,2.6,1,3.5,0l5.7-5.7v24C47.5,41.4,48.6,42.5,50,42.5z"></path>
                    </svg>
                    Back to Top
                </div>


<script type="text/javascript">

// Original source from here:
// https://github.com/tholman/elevator.js
/*!
* Elevator.js
*
* MIT licensed
* Copyright (C) 2015 Tim Holman, http://tholman.com
*/

/*********************************************
* Elevator.js
*********************************************/

var Elevator = (function() {

  'use strict';

  // Elements
  var body = null;

  // Scroll vars
  var animation = null;
  var duration = null; // ms
  var customDuration = false;
  var startTime = null;
  var startPosition = null;
  var elevating = false;

  var mainAudio;
  var endAudio;

  /**
   * Utils
   */

  // Soft object augmentation
  function extend( target, source ) {
      for ( var key in source ) {
          if ( !( key in target ) ) {
              target[ key ] = source[ key ];
          }
      }
      return target;
  };

 // from http://robertpenner.com/easing/
  function easeInOutQuad( t, b, c, d ) {
      t /= d/2;
      if (t < 1) return c/2*t*t + b;
      t--;
      return -c/2 * (t*(t-2) - 1) + b;
  };

  function extendParameters(options, defaults){
      for(var option in defaults){
          var t = options[option] === undefined && typeof option !== "function";
          if(t){
              options[option] = defaults[option];
          }
      }
      return options;
  }

  /**
   * Main
   */
  function animateLoop( time ) {
      if (!startTime) {
          startTime = time;
      }

      var timeSoFar = time - startTime;
      var easedPosition = easeInOutQuad(timeSoFar, startPosition, -startPosition, duration);

      window.scrollTo(0, easedPosition);

      if( timeSoFar < duration ) {
          animation = requestAnimationFrame(animateLoop);
      } else {
          animationFinished();
      }
 };


  function elevate() {

      if( elevating ) {
          return;
      }

      elevating = true;
      startPosition = (document.documentElement.scrollTop || body.scrollTop);

      // No custom duration set, so we travel at pixels per millisecond. (0.75px per ms)
      if( !customDuration ) {
          duration = (startPosition * 1.5);
      }

      requestAnimationFrame( animateLoop );

      // Start music!
      if( mainAudio ) {
          mainAudio.play();
      }
  }

  function resetPositions() {
      startTime = null;
      startPosition = null;
      elevating = false;
  }

  function animationFinished() {

      resetPositions();

      // Stop music!
      if( mainAudio ) {
          mainAudio.pause();
          mainAudio.currentTime = 0;
      }

      if( endAudio ) {
          endAudio.play();
      }
  }

  function onWindowBlur() {

      // If animating, go straight to the top. And play no more music.
      if( elevating ) {

          cancelAnimationFrame( animation );
          resetPositions();

          if( mainAudio ) {
              mainAudio.pause();
              mainAudio.currentTime = 0;
          }

          window.scrollTo(0, 0);
      }
  }

  function bindElevateToElement( element ) {
      element.addEventListener('click', elevate, false);
  }

  function main( options ) {

      // Bind to element click event, if need be.
      body = document.body;

      var defaults = {
          duration: undefined,
          mainAudio: false,
          endAudio: false,
          preloadAudio: true,
          loopAudio: true,
      };

      options = extendParameters(options, defaults);

      if( options.element ) {
          bindElevateToElement( options.element );
      }

      if( options.duration ) {
          customDuration = true;
          duration = options.duration;
      }

      window.addEventListener('blur', onWindowBlur, false);

      // If the browser doesn't support audio, stop here!
      if ( !window.Audio ) {
          return;
      }

      if( options.mainAudio ) {
          mainAudio = new Audio( options.mainAudio );
          mainAudio.setAttribute( 'preload', options.preloadAudio );
          mainAudio.setAttribute( 'loop', options.loopAudio );
      }

      if( options.endAudio ) {
          endAudio = new Audio( options.endAudio );
          endAudio.setAttribute( 'preload', 'true' );
      }
  }

  return extend(main, {
      elevate: elevate
  });
})();


// trigger it

var elementButton = document.querySelector('.elevator');
var elevator = new Elevator({
element: elementButton,
// mainAudio from here:
// https://github.com/tholman/elevator.js
// Audio in the Demo (sourced from BenSound) is licenced under Creative Commons.
mainAudio: 'https://weichiachang.github.io/Easter-egg/images/music/elevator.mp3',
// endAudio from here:
// https://www.findsounds.com/ISAPI/search.dll?keywords=ding+dinging
endAudio:  'https://inventwithpython.com/pickup.wav'
});
</script>


  </body>
</html>
  </body>
</html>
