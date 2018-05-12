function menu_function(){
  var temp = document.getElementById("menu");
    if (temp.className === "topMenu"){
      temp.className += " responsive";
      document.getElementById("nav").style.height = "250px";
      document.getElementById("article").style.marginTop = "250px";
    } else {
      temp.className = "topMenu";
      document.getElementById("nav").style.height = "72px";
      document.getElementById("article").style.marginTop = "100px";
    }
}

function close_menu(){
  var temp = document.getElementById("menu");
  temp.className = "topMenu";
  document.getElementById("nav").style.height = "72px";
  document.getElementById("article").style.marginTop = "100px";
}