require('./bootstrap');

//require only home page
if(window.location.pathname == '/')
    require('./birthaday-picker-init');

$(document).ready(function(){

    /*
    home page tabs css change css class
     */
    if($('.is-invalid').data('check') == 'register')
    {
       $('#login').removeClass('active show');
       $('a[href$="#login"]').removeClass('active');
       $('#register').addClass('active show');
       $('a[href$="#register"]').addClass('active');
    }


    /*
    bootstrap navbar change class active
     */

    let url = window.location.href.substr( window.location.href.lastIndexOf( '/' ) + 1 );
    $('.navbar-nav li' ).each( function ()
    {
        if($( this ).attr( 'id' ) === url || $( this ).attr( 'id' ) === '')
        {
            $(this).addClass('active');
        }
    });

});

