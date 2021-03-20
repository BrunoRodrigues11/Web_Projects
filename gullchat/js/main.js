// MENU 
$('.collapse').on('shown.bs.collapse', function () {
    $(this).parent().find(".menuClose").removeClass("menuClose").addClass("menuOpen");
}).on('hidden.bs.collapse', function () {
    $(this).parent().find(".menuOpen").removeClass("menuOpen").addClass("menuClose");
});

// Botão Flutuante Scroll Up
$(document).ready(function () {
    var btnUp = $(".jbtnup");
    var btnUpLink = $(".jbtnuplink");
    // mostra o botão voltar ao topo
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            btnUp.fadeIn(0);
        } else {
            btnUp.fadeOut(0);
        }
    });
    // Click para voltar ao topo
    btnUp.click(function () {
        $("html, body").animate({ scrollTop: 0 }, 800);
        return false;
    });
});

// ROLAGEM SUAVE
$('.nav a[href^="#"]').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;

    $('html,body').animate({
        scrollTop: targetOffset - 10
    }, 900);
});
