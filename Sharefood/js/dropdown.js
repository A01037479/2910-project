/* Dropdown Menu */
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function popMenu() {
    document.getElementById("myDropdown").classList.toggle("show");
}


$(function(){
  $(document).click(function(event){
      if(!$(event.target).is('#myBtn')
      && !$(event.target).is('#myDropdown a')) {
          $('#myDropdown').hide();
      }
      if($(event.target).is('#myBtn')) {
          $('#myDropdown').toggle();
      }
  });
});