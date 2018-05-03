/* Dropdown Menu */
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */

function menu_function(){
  var temp = document.getElementById("menu");
    if (temp.className === "topMenu"){
      temp.className += " responsive";
    } else {
      temp.className = "topMenu";
    }
}


/*
function popMenu() {
    document.getElementById("myDropdown").classList.toggle("show");
}


$(function(){
  $(document).click(function(event){
      if(!$(event.target).is('#myBtn')
      && !$(event.target).is('#myDropdown a')) {
          $('#myDropdown').hide();
      }
    }
  }
}
*/
