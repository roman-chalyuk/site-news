/**
 * Created by roman on 26.04.17.
 */

$(function() {
    $( '.navbar' ).append( '<span class="nav-bg"></span>' );


    $('.dropdown-toggle').click(function () {

        if (!$(this).parent().hasClass('open')) {

            $('html').addClass('menu-open');

        } else {

            $('html').removeClass('menu-open');

        }

    });


    $(document).on('click touchstart', function (a) {
        if ($(a.target).parents().index($('.navbar-nav')) == -1) {
            $('html').removeClass('menu-open');
        }
    });
});
