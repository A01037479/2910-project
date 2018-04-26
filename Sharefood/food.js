

$(document).ready(function () {
  $(".freebie").on("click", function () {
    var pic = $(this).attr("src");
    $("#viewing").attr("src=" + pic);
    $(".pop-out").fadeToggle("slow");
  });
  $(".close").on("click", function () {
    $(".close").fadeToggle("slow");
  });
});



