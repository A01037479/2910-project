/* Typewriter animation */
var i = 0;
<<<<<<< HEAD
var txt = 'SHARE FOOD, REDUCE WORK';
var speed = 50;
=======
var txt = 'SHARE FOOD, REDUCE WASTE';
var speed = 200;
>>>>>>> ec58aefb378c818414a9af03ab5f0db36e459bc6

function typeWriter() {

  if (i < txt.length) {
    document.getElementById("textAni").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  } else if (i == txt.length) {
    i++;
    setTimeout(typeWriter, 3000);

  } else if (i > txt.length) {
    document.getElementById("textAni").innerHTML = "";
    i = 0;
    setTimeout(typeWriter, speed);
  }
}

$(document).ready(typeWriter());
