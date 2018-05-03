/* Typewriter animation */
$txt1 = "SHARE FOOD";
$txt2 = "REDUCE WASTE";

function textAnimation1() {
  $("#textAni1").html($txt1);
  $("#textAni2").html($txt2);
  $("#textAni1").css({"opacity":"0", "left":"20%"});
  $("#textAni2").css({"opacity":"0", "left":"20%"});
  $("#textAni1").animate({opacity:'1',left:'-20%'},2000);
  $("#textAni2").animate({opacity:'1',left:'-16%'},4000);
  setTimeout(textAnimation2,5000);
}

function textAnimation2() {
  $("#textAni1").animate({opacity:'0'},1000);
  $("#textAni2").animate({opacity:'0'},1000);
  setTimeout(textAnimation1,1000);
}


$(document).ready(textAnimation1());
