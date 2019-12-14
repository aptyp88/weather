require('./bootstrap');

if(window.location.pathname == '/')
    require('./birthaday-picker-init');

$(document).ready(function(){
   if($('.is-invalid').data('check') == 'register')
   {
       $('#login').removeClass('active show');
       $('a[href$="#login"]').removeClass('active');
       $('#register').addClass('active show');
       $('a[href$="#register"]').addClass('active');
   }
});