var BAD_WORDS_ARRAY = ["fuck", "shit", "poop", "fucking", "pee", "boobies", "ass", "gucci", "boobs", "boobz"];

function inArray(needle,haystack)
{
    var count=haystack.length;
    for(var i=0;i<count;i++)
    {
        if(haystack[i]===needle){
          return true;
        }
    }
    return false;
}



function check_input(){
  // input validation
  var theForm = document.posting;

  if (inArray(theForm.title.value,BAD_WORDS_ARRAY) || inArray(theForm.description.value,BAD_WORDS_ARRAY)) {
    alert("DON'T SWEAR!!!");
    return false;
  }




  if(theForm.password.value == ""
  || theForm.email.value == ""
  || theForm.title.value == ""
  || theForm.image.value == ""
  || theForm.description.value == ""){
    alert("Please fill in all input values");
    return false;
  } else {
    // image type validation
    var ext = $('#image').val().split('.').pop().toLowerCase(); //file extension
    if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {  // checking extension
      alert('Invalid image file');
      $('#image').val('');  // set up uploaded file as null
      return false;
    } else {
      return true;
    }
  }
}

/* Dropdown Menu */
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function popMenu() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
