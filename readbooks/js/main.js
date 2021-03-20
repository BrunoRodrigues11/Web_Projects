// MENU 
$('.collapse').on('shown.bs.collapse', function () {
    $(this).parent().find(".menuClose").removeClass("menuClose").addClass("menuOpen");
}).on('hidden.bs.collapse', function () {
    $(this).parent().find(".menuOpen").removeClass("menuOpen").addClass("menuClose");
});