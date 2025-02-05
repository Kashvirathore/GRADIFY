//this part is for the slides ssection.


let next = document.querySelector('.next')
let prev = document.querySelector('.prev')

next.addEventListener('click', function(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').appendChild(items[0])
})

prev.addEventListener('click', function(){
    let items = document.querySelectorAll('.item')
    document.querySelector('.slide').prepend(items[items.length - 1]) // here the length of items = 6
})




//smoothscrolling
document.addEventListener("DOMContentLoaded", function() {
    const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
    
    // Select the button element
    const contactButton = document.getElementById("contactButton");
    
    smoothScrollLinks.forEach(link => {
        link.addEventListener("click", function(e) {
            e.preventDefault();

            const targetId = this.getAttribute("href");
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                scrollToTarget(targetElement);
            }
        });
    });

    // Add click event listener to the button
    contactButton.addEventListener("click", function() {
        const contactDiv = document.getElementById("contactkrlo");
        if (contactDiv) {
            scrollToTarget(contactDiv);
        }
    });

    function scrollToTarget(targetElement) {
        const targetPosition = targetElement.offsetTop;
        const startPosition = window.pageYOffset;
        const distance = targetPosition - startPosition;
        const startTime = performance.now();
        const duration = 1000; // Adjust the duration here (in milliseconds)

        function scrollAnimation(currentTime) {
            const elapsedTime = currentTime - startTime;
            const scrollProgress = Math.min(elapsedTime / duration, 1);
            const scrollDistance = distance * easeInOutQuad(scrollProgress);
            window.scrollTo(0, startPosition + scrollDistance);

            if (elapsedTime < duration) {
                requestAnimationFrame(scrollAnimation);
            }
        }

        function easeInOutQuad(t) {
            return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
        }

        requestAnimationFrame(scrollAnimation);
    }
});

