let btn_responsive = document.getElementById('check')
let open_menu = false
let btn_value = btn_responsive.value
let mode = false
let responsive_ul = document.querySelector('#responsive-ul')
console.log(btn_responsive.value)
btn_responsive.addEventListener('click', function () {
    console.log(btn_responsive.value)

    responsive_ul.classList.toggle('open-menu')
});

// Your JavaScript code here, including the onclick event handler.

let individual = document.getElementById('individual')
let business = document.getElementById('business')
let membertow = document.getElementById('membertow')
let memberone = document.getElementById('memberone')
let member_type = document.getElementById('member_type')
let business_name = document.getElementById('business_name')

let chooseone = document.getElementById('chooseone')
let choosetow = document.getElementById('choosetow')
console.log(individual)
console.log(business)
business_name.innerHTML = ""

memberone.onclick = function () {
    individual.checked = false
    business.checked = true
    member_type.value = ''
    member_type.value = business.value
business_name.innerHTML = `<label for='business name'>Business Name</label>
                    <br>
                    <input class="email" type='text' name='businessName' placeholder='business name' >`
    memberone.style = 'box-Shadow :-2px -5px  20px  rgba(12, 109, 236, 1),2px 5px  20px  rgba(12, 109, 236, 1);'
    membertow.style = 'box-Shadow :0px 0px  0px  rgba(12, 109, 236, 1),0px 0px  0px  rgba(12, 109, 236, 1);'
    console.log(member_type.value)
}

membertow.onclick = function () {
    business.checked = false
    individual.checked = true
    membertow.style = 'box-Shadow :-2px -5px  20px  rgba(12, 109, 236, 1),2px 5px  20px  rgba(12, 109, 236, 1);'
    memberone.style = 'box-Shadow :0px 0px  0px  rgba(12, 109, 236, 1),0px 0px  0px  rgba(12, 109, 236, 1);'
business_name.innerHTML = ""

    member_type.value = individual.value
    console.log(member_type.value)
}
