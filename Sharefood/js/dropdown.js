function menu_function(){
  var temp = document.getElementById("menu");
    if (temp.className === "topMenu"){
      temp.className += " responsive";
      document.getElementById("nav").style.height = "210px";
      document.getElementById("article").style.marginTop = "210px";
    } else {
      temp.className = "topMenu";
      document.getElementById("nav").style.height = "100px";
      document.getElementById("article").style.marginTop = "100px";
    }
}

function close_menu(){
  var temp = document.getElementById("menu");
  temp.className = "topMenu";
  document.getElementById("nav").style.height = "100px";
  document.getElementById("article").style.marginTop = "100px";
}