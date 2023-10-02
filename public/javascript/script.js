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
