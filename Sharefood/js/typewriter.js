/* Typewriter animation */
var i = 0;
var txt = 'SHARE FOOD, REDUCE WASTE';
var speed = 200;

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
