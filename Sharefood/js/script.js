function check_input(){
  // input validation
  var theForm = document.posting;
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
