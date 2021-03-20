// ROLAGEM SUAVE
$('.nav a[href^="#"]').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('href'),
        targetOffset = $(id).offset().top;

    $('html,body').animate({
        scrollTop: targetOffset - 10
    }, 1000);
});

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

// Efeito de Máquina de Escrever 
function typeWriter(elemento) {
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    textoArray.forEach((letra, i) => {
        setTimeout(() => elemento.innerHTML += letra, 75 * i);
    });
}
const titulo = document.querySelector('h1');
typeWriter(titulo);

// Modal de contato
function iniciaModal(modalID) {
    const modal = document.getElementById(modalID);
    if (modal) {
        modal.classList.add('mostrar');
        modal.addEventListener('click', function (e) {
            if (e.target.id == modalID || e.target.className == 'fechar') {
                modal.classList.remove('mostrar');
            }
        });
    }
}

const btnContato = document.querySelector('.contact');
btnContato.addEventListener('click', function () {
    iniciaModal('modal-contato');
});

// Icone FAV 
