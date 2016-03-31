$(document).ready(function () {
    $(window).scroll(function () {
        posScrol = $(document).scrollTop();
        if (posScrol >= 100) {
            $('.to_top').fadeIn(600);
            $('.navbar-default').css({'background-color': '#00CCFF', transition: 'all linear 4s'});


        }

        else {
            $('.to_top').fadeOut(600);
            $('.navbar-default').css({'background-color': 'lightblue', transition: 'all linear 0s'});



        }

    });
});