// JavaScript Document
// Salvart como: 04_menu_flex.js

// ROLAGEM SUAVE
$('.nav a[href^="#"]').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;

    $('html,body').animate({
        scrollTop: targetOffset - 10
    }, 900);
});

// MENU FLEX
$('.nav').addClass("fechada");
$(".nav").before("<a class=\"nav-toogle\"><img src='bars-solid.svg' height='20px'>&nbsp;<span>MENU</span></a>");

$(".nav-toogle").click(function () {
    var altura = $(".nav ul").height();
    if ($(".nav").hasClass("fechada")) {
        $(".nav").animate({ height: altura },
            { queue: false, duration: 500 }).removeClass("fechada");
    } else {
        $(".nav").animate({ height: "150px" },
            { queue: false, duration: 500 }).addClass("fechada");
    }
});

$(window).resize(function () {
    var tamanhoViewport = $(window).width();
    if (tamanhoViewport > 463) {
        $("nav").css("height", "auto").addClass("fechada");
    } else {
        $("nav").css("height", "0px").addClass("fechada");
    }
});




