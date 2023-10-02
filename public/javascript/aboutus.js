




window.addEventListener("scroll",reveal);

let btn_responsive = document.getElementById("check");
let open_menu = false;
let btn_value = btn_responsive.value;
let mode = false;
let responsive_ul = document.querySelector("#responsive-ul");
console.log(btn_responsive.value);
btn_responsive.addEventListener("click", function () {
  console.log(btn_responsive.value);

  responsive_ul.classList.toggle("open-menu");
});
    
 
function reveal() {

let reveals=document.querySelectorAll(".reveal");

for (let i = 0; i < reveals.length; i++) {
    
    let windowheight=window.innerHeight;
    let revealtop = reveals[i].getBoundingClientRect().top;
    let revealpoint = 150;

    if(revealtop < windowheight - revealpoint){
        reveals[i].classList.add("active")
    }
    else{
            reveals[i].classList.remove("active");

    }
   
console.log(windowheight);
}
    
}