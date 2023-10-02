let btn_responsive=document.getElementById("check")
let open_menu=false;
let btn_value=btn_responsive.value
let mode=false;
let responsive_ul = document.querySelector("#responsive-ul");
 console.log(btn_responsive.value);
btn_responsive.addEventListener("click",function() {
     console.log(btn_responsive.value);

responsive_ul.classList.toggle("open-menu");


 
})
    
    

