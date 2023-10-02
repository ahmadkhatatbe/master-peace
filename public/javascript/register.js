// for register step-one

let btn_responsive = document.getElementById('check')
let open_menu = false
let btn_value = btn_responsive.value
let mode = false

// menu
let menu = document.querySelector('.menu')
console.log(btn_value)
btn_responsive.addEventListener('click', function () {
    console.log(btn_value)

    menu.classList.toggle('open-menu')
})

// Your JavaScript code here, including the onclick event handler.

let individual = document.getElementById('individual')
let business = document.getElementById('business')
let membertow = document.getElementById('membertow')
let memberone = document.getElementById('memberone')

let chooseone = document.getElementById('chooseone')
let choosetow = document.getElementById('choosetow')

chooseone.onclick = () => {
    individual.checked = true
    business.checked = false
    member_type.value = ''
    member_type.value = basic.value

    choosetow.style = 'box-Shadow :0px 0px  0px  rgba(12, 109, 236, 1),0px 0px  0px  rgba(12, 109, 236, 1);'
    chooseone.style = 'box-Shadow :-2px -5px  20px  rgba(12, 109, 236, 1),2px 5px  20px  rgba(12, 109, 236, 1);'
    console.log(member_type.value)
}

choosetow.onclick = function () {
    premier.checked = true
    basic.checked = false
    choosetow.style = 'box-Shadow :-2px -5px  20px  rgba(12, 109, 236, 1),2px 5px  20px  rgba(12, 109, 236, 1);'
    chooseone.style = 'box-Shadow :0px 0px  0px  rgba(12, 109, 236, 1),0px 0px  0px  rgba(12, 109, 236, 1);'

    member_type.value = premier.value
    console.log(member_type.value)
}
