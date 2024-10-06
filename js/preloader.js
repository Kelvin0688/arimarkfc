
    // let preloader = select('#preloader');
    // if (preloader) {
    // window.addEventListener('load', () => {
    //     preloader.remove()
    // });
    // }

    // var loader = document.getElementById("#preloader");
    // window.addEventListener ("load", function() {
    //     loader.style.display = 'none';
    // });

    $(window).on("load", function () {
        $('#preloader').fadeOut('slow');
    });
    $(function () {
        $.nette.init();
        $('[data-toggle="tooltip"]').tooltip();
        $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
        $(".button-collapse").sideNav();
    });