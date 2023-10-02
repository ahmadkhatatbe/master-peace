
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
    


window.addEventListener("scroll", reveal);
function reveal() {
  let reveals = document.querySelectorAll(".reveal");

  for (let i = 0; i < reveals.length; i++) {
    let windowheight = window.innerHeight;
    let revealtop = reveals[i].getBoundingClientRect().top;
    let revealpoint = 150;

    if (revealtop < windowheight - revealpoint) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
    console.log(windowheight);
  }

  let rereveals = document.querySelectorAll(".rereveal");
  for (let i = 0; i < rereveals.length; i++) {
    let rewindowheight = window.innerHeight;
    let rerevealtop = rereveals[i].getBoundingClientRect().top;
    let rerevealpoint = 150;

    if (rerevealtop < rewindowheight - rerevealpoint) {
      rereveals[i].classList.add("reactive");
    } else {
      rereveals[i].classList.remove("reactive");
    }

    console.log(rewindowheight);
  }
}



window.addEventListener("onload", labelsection);
function labelsection() {
  let move = document.querySelectorAll(".move");

  for (let i = 0; i < move.length; i++) {
    let windowheight = window.innerHeight;
    let revealtop = move[i].getBoundingClientRect().top;
    let revealpoint = 150;

    if (revealtop < windowheight - revealpoint) {
      move[i].classList.add("activemove");
    } else {
      move[i].classList.remove("activemove");
    }
    console.log(windowheight);
  }
}