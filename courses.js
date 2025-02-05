//change nav styles  on scroll

window.addEventListener('scroll',() =>{
    document.querySelector('nav').classList.toggle
    ('window-scroll',window.scrollY >  0)
})


const themeToggler = document.querySelector(".theme-toggler");

themeToggler.addEventListener('click' , () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})

