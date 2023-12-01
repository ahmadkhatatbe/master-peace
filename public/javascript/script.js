// JavaScript code for image switching and scrolling
const showcaseImage = document.getElementById('showcase-image')
const thumbnails = document.querySelectorAll('.img-item a')

thumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener('click', (e) => {
        e.preventDefault()
        const selectedImageSrc = e.target.getAttribute('src')
        showcaseImage.src = selectedImageSrc // Replace the src of the showcase image
        console.log(e.target.getAttribute('src'))
        // Scroll to the showcase image
    })
})


//  // Set enddata to 15 seconds from the current time
//     let enddata = new Date().getTime() + 17000;

//     let second = document.getElementById('second');
//         let seconds2 = document.getElementById('seconds')

//     let x = setInterval(function () {
//       let now = new Date().getTime();
//       let distance = enddata - now;

//       if (distance > 0) {
//         let seconds = Math.floor((distance % (1000 * 60)) / 1000);
//         second.style.strokeDashoffset = 440 - (440 * seconds) / 15;
//         seconds2.innerHTML = seconds+"seconds"
//       } else {
//         clearInterval(x);
//         console.log('Countdown complete!');
//       }
//     }, 1000);




    ///////////////////////////////////
    
        ////////counter for increase the bid amount//////
        document.addEventListener("DOMContentLoaded", function() {
            // Get the increment and decrement buttons
            var incrementButton = document.getElementById('increase')
            var decrementButton = document.getElementById('decrease')
            var amountOfmybid = document.getElementById('amountOfmybid')
            var pricevehicle = document.getElementById('pricevehicle')
            

            var Amount = document.getElementById('Amount')
            var bigtotal = 0

            pricevehicle.innerHTML = 'CurrentPrice :' + bigtotal
            console.log(amountOfmybid.value)

            // Get the totalAmount element and convert its value to a number

            var totalAmountInput = document.getElementById('totalAmount')
            if (!totalAmountInput) {
                console.error("Element with ID 'totalAmount' not found.")
                return
            }

            var totalAmount = parseFloat(totalAmountInput.value)
            if (isNaN(totalAmount)) {
                console.error('Invalid initial totalAmount value.')
                return
            }

            totalAmount = 0
            if (!incrementButton || !decrementButton) {
                console.error('One or both of the buttons are missing.')
                return
            }

            incrementButton.addEventListener('click', function () {
                var currentValue = parseFloat(totalAmountInput.value)

                // Check if the input value is a valid number
                if (!isNaN(currentValue)) {
                    // Increment the current value by 100
                    var totalAmount = currentValue + 100

                    // Convert the totalAmount to a string
                    var stringnumber = totalAmount.toString()

                    // Update the value of totalAmountInput with the new string
                    totalAmountInput.value = stringnumber
                    bigtotal = parseInt(amountOfmybid.value) + parseInt(stringnumber)
                    // Update the HTML content of pricevehicle
                    pricevehicle.innerHTML = 'CurrentPrice ' + bigtotal

                    // Log the value of amountOfmybid
                    console.log(amountOfmybid.value)
                    console.log(stringnumber)
                } else {
                    console.error('Invalid current value.')
                }
            })

            decrementButton.addEventListener('click', function () {
                var currentValue = parseFloat(totalAmountInput.value)

                // Check if the input value is a valid number
                if (!isNaN(currentValue)) {
                    // Increment the current value by 100
                    var totalAmount = currentValue - 100
                    console.log(totalAmount)
                    if (totalAmount >= -1) {
                        // Convert the totalAmount to a string
                        var stringnumber = totalAmount.toString()

                        // Update the value of totalAmountInput with the new string
                        totalAmountInput.value = stringnumber
                        bigtotal = parseInt(amountOfmybid.value) + parseInt(stringnumber)
                        // Update the HTML content of pricevehicle
                        pricevehicle.innerHTML = 'CurrentPrice ' + bigtotal

                        // Log the value of amountOfmybid
                        console.log(amountOfmybid.value)
                        console.log(stringnumber)
                    }
                } else {
                    console.error('Invalid current value.')
                }
            })
        });
