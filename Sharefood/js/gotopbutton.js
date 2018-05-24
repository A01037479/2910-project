// When the user scrolls down 200px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 200) {
        document.getElementById("gotop").style.display = "block";
    } else {
        document.getElementById("gotop").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    $('html, body').animate({
      scrollTop:0
    }, 'slow');
}
