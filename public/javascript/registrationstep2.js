let btn_responsive = document.getElementById('check')
let open_menu = false
let btn_value = btn_responsive.value
let mode = false
let menu = document.querySelector('.menu')
console.log(btn_value)
btn_responsive.addEventListener('click', function () {
    console.log(btn_value)

    menu.classList.toggle('open-menu')
})

// for payment method
let select_method = document.getElementById('select_method')
let btn_paypal = document.getElementById('ebay')

let paypal_payment = document.getElementById('paypal_payment')
paypal_payment.style.display = 'none'
btn_paypal.addEventListener('click', function () {
    btn_paypal.style = 'box-Shadow :-2px -5px  20px  rgba(12, 109, 236, 1),2px 5px  20px  rgba(12, 109, 236, 1);'
    select_method.style.display = 'none'
    paypal_payment.style.display = 'block'
})

// for register step tow
let premier = document.getElementById('premier')
let basic = document.getElementById('basic')

let member_premier = document.getElementById('member_premier')
let member_basic = document.getElementById('member_basic')
let member_type = document.getElementById('member_type')

let chooseone = document.getElementById('chooseone')
let choosetow = document.getElementById('choosetow')
choosetow.onclick = function () {
    premier.checked = true
    basic.checked = false
    choosetow.style = 'box-Shadow :-2px -5px  20px  rgba(12, 109, 236, 1),2px 5px  20px  rgba(12, 109, 236, 1);'
    chooseone.style = 'box-Shadow :0px 0px  0px  rgba(12, 109, 236, 1),0px 0px  0px  rgba(12, 109, 236, 1);'

    member_type.value = premier.value
    console.log(member_type.value)
}

chooseone.onclick = function () {
    basic.checked = true
    premier.checked = false
    member_type.value = ''
    member_type.value = basic.value

    choosetow.style = 'box-Shadow :0px 0px  0px  rgba(12, 109, 236, 1),0px 0px  0px  rgba(12, 109, 236, 1);'
    chooseone.style = 'box-Shadow :-2px -5px  20px  rgba(12, 109, 236, 1),2px 5px  20px  rgba(12, 109, 236, 1);'
    console.log(member_type.value)
}
