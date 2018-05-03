function menu_function(){
  var temp = document.getElementById("menu");
    if (temp.className === "topMenu"){
      temp.className += " responsive";
      document.getElementById("nav").style.height = "210px";
      document.getElementById("banner").style.marginTop = "210px";
    } else {
      temp.className = "topMenu";
      document.getElementById("nav").style.height = "72px";
      document.getElementById("banner").style.marginTop = "0px";
    }
}

