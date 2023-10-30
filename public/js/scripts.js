// ScrollReveal().reveal('#banner h2', {delay: 600});
// ScrollReveal().reveal('#banner p', {delay: 700});
// ScrollReveal().reveal('#banner .button-space', {delay: 800});

// ScrollReveal().reveal('#about .about-text h4', {delay: 500});
// ScrollReveal().reveal('#about .about-text h1', {delay: 600});
// ScrollReveal().reveal('#about .about-text p', {delay: 700});
// ScrollReveal().reveal('#about .smaller-about-text h3', {delay: 800});
// ScrollReveal().reveal('#about .smaller-about-text p', {delay: 900});
// ScrollReveal().reveal('#about button', {delay: 1000});

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


// Jquery navigation changes color when scrolling
$(window).scroll(function () {
    if ($(window).scrollTop()) {
        $(".navigation-content").addClass("white");
    } else {
        $(".navigation-content").removeClass("white");
    }
});

// Scrollreveal
ScrollReveal().reveal('.navigation-wrapper header .banner-content .inner', {delay: 700});

// LOGIN - REGISTER FORM 
let signupContent = document.querySelector(".signup-form-wrapper"),
    stagebtn1b = document.querySelector(".stagebtn1b"),
    stagebtn2a = document.querySelector(".stagebtn2a"),
    stagebtn2b = document.querySelector(".stagebtn2b"),
    stagebtn3a = document.querySelector(".stagebtn3a"),
    signupContent1 = document.querySelector(".stage-no-1-content"),
    signupContent2 = document.querySelector(".stage-no-2-content"),
    signupContent3 = document.querySelector(".stage-no-3-content");

signupContent2.style.display = "none";
signupContent3.style.display = "none";

function stage1to2() {
    signupContent2.style.display = "block";
    signupContent1.style.display = "none";
    signupContent3.style.display = "none";
    document.querySelector(".stage-no-1").style.backgroundColor = "#56957e";
    document.querySelector(".stage-no-1").style.color = "#fff";
}

function stage2to1() {
    signupContent1.style.display = "block";
    signupContent2.style.display = "none";
    signupContent3.style.display = "none";
    document.querySelector(".stage-no-1").style.backgroundColor = "#fff";
    document.querySelector(".stage-no-1").style.color = "#56957e";
}

function stage2to3() {
    signupContent3.style.display = "block";
    signupContent1.style.display = "none";
    signupContent2.style.display = "none";
    document.querySelector(".stage-no-2").style.backgroundColor = "#56957e";
    document.querySelector(".stage-no-2").style.color = "#fff";
}

function stage3to2() {
    signupContent2.style.display = "block";
    signupContent1.style.display = "none";
    signupContent3.style.display = "none";
    document.querySelector(".stage-no-2").style.backgroundColor = "#fff";
    document.querySelector(".stage-no-2").style.color = "#56957e";
}

// let input = document.getElementById('username'),
//             form = document.getElementById('form'),
//             elem = document.createElement('div');

//             elem.id = 'notify',
//             elem.style.display = 'none';
//             form.appendChild(elem);