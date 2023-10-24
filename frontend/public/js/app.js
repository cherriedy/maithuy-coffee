ScrollReveal().reveal('#banner h2', {delay: 600});
ScrollReveal().reveal('#banner p', {delay: 700});
ScrollReveal().reveal('#banner .button-space', {delay: 800});

ScrollReveal().reveal('#about .about-text h4', {delay: 500});
ScrollReveal().reveal('#about .about-text h1', {delay: 600});
ScrollReveal().reveal('#about .about-text p', {delay: 700});
ScrollReveal().reveal('#about .smaller-about-text h3', {delay: 800});
ScrollReveal().reveal('#about .smaller-about-text p', {delay: 900});
ScrollReveal().reveal('#about button', {delay: 1000});

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    grabCursor:true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});


