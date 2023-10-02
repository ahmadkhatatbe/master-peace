
let btn_responsive = document.getElementById("check");
let open_menu = false;
let btn_value = btn_responsive.value;
let mode = false;
let responsive_ul = document.querySelector("#responsive-ul");
var coll = document.getElementsByClassName("collapsible");
var i;
let  filter=document.getElementById("filter");
let btn_filter = document.getElementById("btn_filter");
    filter.style.display = "none";


// show fliter
console.log(btn_filter.value);
btn_filter.onclick =function(){
 

  if(filter.style.display==="none"){
    filter.style.display="block";

  }else{
    filter.style.display="none";
  }
}
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function () {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}


// header responsive
console.log(btn_responsive.value);
btn_responsive.addEventListener("click", function () {
  console.log(btn_responsive.value);

  responsive_ul.classList.toggle("open-menu");
});
