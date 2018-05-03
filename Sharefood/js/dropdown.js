function menu_function(){
  var temp = document.getElementById("menu");
    if (temp.className === "topMenu"){
      temp.className += " responsive";
    } else {
      temp.className = "topMenu";
    }
}

