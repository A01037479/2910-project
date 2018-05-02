
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

function pwd_validation(){
  var theForm = document.posting;
  var message = document.getElementById('pwdInvalid');
  message.style.fontSize = "12px";

  var pass1 = theForm.pass
    if (theForm.password.value == theForm.password2.value && theForm.password2.value != ''){
    theForm.password.style.backgroundColor='#ddffdd';
    theForm.password2.style.backgroundColor='#ddffdd';
    message.innerHTML = "Passwords match."
    message.style.color = "green";
    return true;
  } else if (theForm.password.value != theForm.password2.value && theForm.password2.value != ''){
    theForm.password.style.backgroundColor='#ffdddd';
    theForm.password2.style.backgroundColor='#ffdddd';
    message.innerHTML = "Passwords do not match."
    message.style.color = "red";
    return false;
  } else {
    return false;
  }
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
  || theForm.description.value == ""
  || pwd_validation() == false){
    alert("Please fill in all input values");
    return false;
  } else if (!theForm.checkbox.checked){
      alert('You must agree to the terms first.');
      return false;
  }else {
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
