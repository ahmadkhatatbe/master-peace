let btn_responsive = document.getElementById("check");
let open_menu = false;
let btn_value = btn_responsive.value;
let mode = false;
let menu = document.querySelector(".menu");
console.log(btn_value);
btn_responsive.addEventListener("click", function () {
  console.log(btn_value);

  menu.classList.toggle("open-menu");
});

