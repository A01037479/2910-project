function saveData(indenity){
    var emailStore = document.getElementById(arguments[0]);

    if(emailStore.value !=  null){
        var stored = localStorage.setItem('email', emailStore.value);
        //alert("The email is: " + emailStore.value);
    } else {
        console.log("Local Storage is not supported.");
    }
}

function loadStoredDetails(identity){
    var emailStore = document.getElementById(arguments[0]);

    var retrieveEmail = localStorage.getItem('email');

    if (retrieveEmail != null || retrieveEmail != undefined){
        emailStore.value = retrieveEmail;

    } else {
        console.log("Local Storage is not supported.");
    }

}

