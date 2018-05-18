console.log("hello");


function pwd_validation(){
  var theForm = document.posting;
  console.log("hey");
  // var message = document.getElementById('pwdInvalid');
  if (theForm.password.value == theForm.password2.value && theForm.password2.value != ''){
  theForm.password.style.backgroundColor='#ddffdd';
  theForm.password2.style.backgroundColor='#ddffdd';
  console.log("hi");
  // message.innerHTML = "Passwords match."
  // message.style.color = "green";
  return true;
  } else if (theForm.password.value != theForm.password2.value && theForm.password2.value != ''){
    theForm.password.style.backgroundColor='#ffdddd';
    theForm.password2.style.backgroundColor='#ffdddd';
    console.log("bye");
    // message.innerHTML = "Passwords do not match."
    // message.style.color = "red";
    return false;
  } else {
    return false;
    console.log("wht up")
  }
}

/* profanity filter */
var swearWordsList = new Array("fuck","shit","eric", "boobies");
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
    return true;
  }
}

function check_input(){

  var test = validate_text();
  // input validation
  var theForm = document.posting;
  var location1 = document.getElementById("hellomom");
  var location2 = document.getElementById("hellodad");

  if (test == false) {
    return false;
  } else if(theForm.password.value == ""
  || theForm.email.value == ""
  || theForm.title.value == ""
  || theForm.path.value == ""
  || theForm.description.value == ""
  || pwd_validation() == false){
    alert("Please fill in all input values.");
    return false;
  } else if (!theForm.checkbox.checked){
      alert('You must agree to the terms first.');
      return false;
  } else if(location1.checked == false && location2.checked == false){ 
      alert("You must select a location.");
      return false;
  }else {

    // image type validation
    var ext = $('#imgpath').val().split('.').pop().toLowerCase(); //file extension

    if(jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {  // checking extension
      alert('Invalid image file');
      $('#imgpath').val('');  // set up uploaded file as null
      return false;
    } else {
      return true;
    }
  }
}
