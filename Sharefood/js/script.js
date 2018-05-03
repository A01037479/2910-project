function pwd_validation(){
  var theForm = document.posting;
  var pass1 = theForm.pass
  if (theForm.password.value == theForm.password2.value && theForm.password2.value != ''){
  theForm.password.style.backgroundColor='#ddffdd';
  theForm.password2.style.backgroundColor='#ddffdd';
  var message = document.getElementById('pwdInvalid');
  message.innerHTML = "Passwords match."
  message.style.color = "green";
  return true;
  } else if (theForm.password.value != theForm.password2.value && theForm.password2.value != ''){
    theForm.password.style.backgroundColor='#ffdddd';
    theForm.password2.style.backgroundColor='#ffdddd';
    var message = document.getElementById('pwdInvalid');
    message.innerHTML = "Passwords do not match."
    message.style.color = "red";
    return false;
  } else {
    return false;
  }
}

/* profanity filter */
var swearWordsList = new Array("fuck","shit","eric");
var swearAlertList = new Array;

var swearCount = 0;

function validate_text() {
  swearCount = 0;
  var compareText = document.posting.title.value;
  for(var i = 0; i < swearWordsList.length; i++) {
    for(var j = 0; j < (compareText.length); j++) {
      if(swearWordsList[i] == compareText.substring(j, (j + swearWordsList[i].length)).toLowerCase()) {
        swearAlertList[swearCount] = compareText.substring(j, j + swearWordsList[i].length);
        swearCount++;
      }
    }
  }
  var alertText = "";
  for(var k = 1; k <= swearCount; k++) {
    alertText += "\n" + "(" + k + ")  " + swearAlertList[k-1];
  }
  if(swearCount > 0) {

    alert("Do not use bad words! \nThe following illegal words were found:\n_______________________________\n" + alertText + "\n_______________________________");
    return false;

  } else {
    alert("Words were acceptable.")
    return true;
  }
}

function check_input(){
  // input validation
  var theForm = document.posting;

  if(theForm.password.value == ""
  || theForm.email.value == ""
  || theForm.title.value == ""
  || theForm.image.value == ""
  || theForm.description.value == ""
  || pwd_validation() == false){
    alert("Please fill in all input values");
    return false;
  } else if (!theForm.checkbox.checked){
      alert('You must agree to the terms first.');
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
